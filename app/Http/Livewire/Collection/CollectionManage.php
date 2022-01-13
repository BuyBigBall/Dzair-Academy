<?php

namespace App\Http\Livewire\Collection;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CollectionManage extends Component
{
    public  $perPage = 10;
    public  $curPage = 1;

    public  $current_route = 'collection';   //for pagination jump
    public  $word;          //wire:model


    public  $coll_name;
    public  $coll_desp;

    private $search_result;
    
    protected $listeners = [
            'share_url'     => 'share_collection' ,
            'refresh_list'  => 'refresh_collection_list' ,
            'deleteCollection'  => 'deleteCollection' ,
                ];

    public function __construct()
    {
        if(Auth::user()==null) redirect(route('login'));
        parent::__construct();
        $this->current_route = Route::currentRouteName();
    }

    public function updatedCurPage($value)
    {
        $this->curPage = $value;
        //dd($this->curPage);
    }
    public function updatedPerPage($value)
    {
        $this->perPage = $value; $this->curPage=1;
        Cookie::queue("perPage", $value, env('COOKIE_EXPIRE_SECONDS'));
    }
    
    public function share_collection($collection_id, $share_key)
    {
        $coll = Collection::find($collection_id);
        $coll->update(['is_publish'=>1, 'publish_key'=>$share_key]);
    }
    public function refresh_collection_list()
    {
        
    }
    public function deleteCollection($collection_id)
    {
        Collection::find($collection_id)->delete();
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

        $query = \App\Models\Collection::where('user_id', Auth::id())
                ->where( function($query1) use ($searchWord) {
                        if(count($searchWord)>0)
                            foreach($searchWord as $cond)
                                $query1->orWhere([$cond]);
                            
                    })
                ->orderBy('created_at', 'ASC');
             //dd($query.toSql());
             //dd($query->getQuery()->toSql());
        $this->search_result = $query->paginate( $this->perPage );
        return view('livewire.collection.index', ['pagination'=>$this->search_result]);
    }
}
