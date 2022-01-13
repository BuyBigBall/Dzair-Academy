<?php

namespace App\Http\Livewire\Collection;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Collection;
use App\Models\CollectionItem;
use App\Models\CollectionShare;
use Illuminate\Support\Facades\Auth;

class CollectionFiles extends Component
{
    public  $collection;
    public  $word;          //wire:model

    private $search_result;
    private $current_route;
    
    protected $listeners = [
        'deleteCollectionFile' => 'deleteCollectionFile'        ,
    ];


    public function __construct()
    {
        if(Auth::user()==null)                              redirect(route('login'));
        parent::__construct();
    }

    public function deleteCollectionFile($del_id)
    {
        if( ($coll_tem=CollectionItem::find($del_id))!=null )
        {
            $coll_tem->delete();
        }
        else
        {
            dd($del_id);
        }
        
    }
    public function mount(Request $request, $id=null, $sharekey=null)
    {
        $this->current_route = Route::currentRouteName();
        if($this->current_route=='collection-files')
        {
            if(!!empty( ( $coll = Collection::find($id) ) ))    $id = null;
            if($coll->user_id!=Auth::id())        
            {
                $coll_share = CollectionShare::where('collection_id', $id)->where('to_user', Auth::id())->first();
                if( !!empty($coll_share) )                $id = null;
            }              
        }

        if($this->current_route=='collection-shares')
        {
            //$sharekey=$id;http://127.0.0.1:8000/collection-shares/21y10nvBPi6mDa.Lh.i5YNLmGem5S3Sm20Qk3kErxzvlZ1HDcIexwnbVi
            //dd($sharekey);
            if( !!empty($sharekey))         $id = null;
            else if( !!empty( ( $coll = Collection::where('publish_key', $sharekey)->first() ) ))    $id = null;
            else                            $id=$coll->id;

            if($id!=null && $coll->user_id!=Auth::id())
            {
                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                CollectionShare::updateOrCreate(
                    ['collection_id' => $id],
                    ['to_user'=>Auth::id(), 'share_url'=>Auth::id(), 'share_url'=>$actual_link]
                );
            }
        }

        if( !!empty($id) )
        {
            return Redirect(route('collection'));
        }
        $this->collection = $coll;

    }
    public function updatedPerPage($value)
    {
        $this->perPage = $value; $this->curPage=1;
        Cookie::queue("perPage", $value, env('COOKIE_EXPIRE_SECONDS'));
    }

    public function render()
    {
        $searchWord = [];
        if( ! empty($this->word))                  
        {
            $this->word = trim($this->word);
            $searchWord[] =  ['collection_name' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['collections.description' , 'like' , '%'.$this->word.'%']; 
        } 

        $query = \App\Models\CollectionItem::selectRaw(DB::raw("collection_items.id, collection_items.collection_id, collection_items.course_id, collection_items.created_at"))
                ->leftjoin('collections', 'collections.id', '=', 'collection_items.collection_id')
        //        ->where('collections.user_id', Auth::id())
                ->where('collections.id', $this->collection->id)
                ->where( function($query1) use ($searchWord) {
                        if(count($searchWord)>0)
                            foreach($searchWord as $cond)
                                $query1->orWhere([$cond]);
                    })
                ->orderBy('collection_items.created_at', 'ASC');

        $this->search_result = $query->get( ); 
        
        $i=0;
        
        return view('livewire.collection.files', 
            [
                'search_result'=>$this->search_result
            ]
        );
    }
}
