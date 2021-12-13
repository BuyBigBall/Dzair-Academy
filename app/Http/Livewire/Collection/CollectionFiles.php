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
    public function __construct()
    {
        if(Auth::user()==null)                              redirect(route('login'));
        parent::__construct();
    }
    public function mount(Request $request, $id=null, $sharekey=null)
    {
        $this->current_route = Route::currentRouteName();
        if($this->current_route=='collection-files')
        {
            if(!!empty( ( $coll = Collection::find($id) ) ))    $id = null;
            if($coll->user_id!=Auth::id())                      $id = null;
        }

        if($this->current_route=='collection-shares')
        {
            //$sharekey=$id;
            //dd($sharekey);
            if( !!empty($sharekey))         $id = null;
            else if( !!empty( ( $coll = Collection::where('publish_key', $sharekey)->first() ) ))    $id = null;
            else                            $id=$coll->id;

            if($id!=null )//&& $coll->user_id!=Auth::id())
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
            return redirect(route('collection'));
        }
        $this->collection = $coll;

    }
    public function updatedPerPage($value)
    {
        $this->perPage = $value;
        Cookie::queue("perPage", $value, env('COOKIE_EXPIRE_SECONDS'));
    }

    public function render()
    {
        $searchWord = [];
        if( ! empty($this->word))                  
        {
            $searchWord[] =  ['collection_name' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['collections.description' , 'like' , '%'.$this->word.'%']; 
        } 

        $query = \App\Models\CollectionItem::leftjoin('collections', 'collections.id', '=', 'collection_items.collection_id')
                ->where('collections.user_id', Auth::id())
                ->where('collections.id', $this->collection->id)
                ->where( function($query1) use ($searchWord) {
                        if(count($searchWord)>0)
                            foreach($searchWord as $cond)
                                $query1->orWhere([$cond]);
                    })
                ->orderBy('collection_items.created_at', 'ASC');

        $this->search_result = $query->get( ); 
        $i=0;
        // foreach($this->search_result as $row)
        // {
        //    dd($row->mat->lang);
        //   if($i++==1)  dd($row);
        //     print($row->id.' , ');
        //     print($row->mat->id . '<br>');
            
        //     //dd($row->mat->training) ;
        //     //dd($row->mat->faculty);
        //     //dd($row->mat->specialization);
        //     //dd($row->mat->course);
        // }
        // die;
        return view('livewire.collection.files', 
            [
                'search_result'=>$this->search_result
            ]
        );
    }
}
