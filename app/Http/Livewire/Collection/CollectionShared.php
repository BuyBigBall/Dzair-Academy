<?php

namespace App\Http\Livewire\Collection;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\CollectionShare;

class CollectionShared extends Component
{
    public  $perPage = 10;
    public  $curPage = 1;

    public  $current_route = 'collection-shared-forme';   //for pagination jump
    public  $word;         

    private $search_result;
    
    protected $listeners = [
        'discardSharedCollection' => 'discardSharedCollection' ,
    ];

    public function __construct()
    {
        if(Auth::user()==null) redirect(route('login'));
        parent::__construct();
        $this->current_route = Route::currentRouteName();
    }
    
    public function discardSharedCollection($del_id)
    {
        if( ($coll_tem=CollectionShare::find($del_id))!=null )
        {
            $coll_tem->delete();
        }
        else
        {
            dd($del_id);
        }
    }

    public function updatedCurPage($value)
    {
        $this->curPage = $value;
        //dd($this->curPage);
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

        $query = \App\Models\CollectionShare::where('to_user', Auth::id())
                ->where( function($query1) use ($searchWord) {
                        if(count($searchWord)>0)
                            foreach($searchWord as $cond)
                                $query1->orWhere([$cond]);
                            
                    })
                ->orderBy('created_at', 'ASC');
             //dd($query.toSql());
             //dd($query->getQuery()->toSql());
        $this->search_result = $query->paginate( $this->perPage );
        //dd($this->search_result[0]->coll->mat);
        return view('livewire.collection.shared', ['pagination'=>$this->search_result]);
    }
}
