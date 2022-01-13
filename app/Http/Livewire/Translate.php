<?php

namespace App\Http\Livewire;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Module;
use App\Models\Course;
use Livewire\Component;
use Illuminate\Session\SessionManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Translate extends Component
{
    use WithPagination;

    public  $perPage = 5;
    public  $curPage = 1;
    private $search_result;
    public  $search_input;
    public  $word;    
    public  $current_route = 'translate';   //for pagination jump

    protected $listeners = [
        'refreshList'   => 'refreshList'        ,
        'deleteAppWord' => 'deleteAppWord'
    ];

    public function __construct()
    {
        parent::__construct();
    }
    
    public function refreshList($param)
    {
    }
    public function updatedCurPage($value)
    {
        $this->curPage = $value;
        //dd($this->curPage);
    }
    public function updatedWord($value)
    {
        Cookie::queue("searchWord", $value, env('COOKIE_EXPIRE_SECONDS'));
        $this->search_input = $value;
        $this->curPage = 1;
        $this->resetPage();
    }

    public function updatedPerPage($value)
    {
        $this->perPage = $value; $this->curPage=1;
        Cookie::queue("perPage", $value, env('COOKIE_EXPIRE_SECONDS'));
        //$this->mount( ($request=Request::capture()) );
        //$this->emit('renderPerPage');
    }
    public function deleteAppWord($del_strkey)
    {
        //dd($del_strkey);
        \App\Models\Translate::where('key', $del_strkey)->delete();
    }
    public function mount(Request $request)
    {
        
        if(!empty($request->page) )
        {
            if(Cookie::has("searchWord"))
                $this->search_input = $this->word = Cookie::get("searchWord");
        }
        else
        {
            Cookie::queue(Cookie::forget('searchWord'));
        }

        if(Cookie::has("perPage"))
        {
            $this->perPage = Cookie::get("perPage");
        }
        //$this->search_input = $request->input();
    }
    public function nextPage($page)
    {
        
    }
    public function render()
    {
        
        $searchCond = [];
        $searchOr = [];
        if( !empty($this->search_input))
        {
            $this->search_input = trim($this->search_input);
            $query = \App\Models\Translate::selectRaw('DISTINCT translates.key as searchkey')
                    ->whereRaw("UPPER(value) LIKE '%".strtoupper($this->search_input)."%'");
            $keys = $query->get();
            foreach($keys as $item)
            {
                $searchOr[] = ['key'=> $item->searchkey];
            }
            if(count($searchOr)==0) $searchOr[] = ['key'=>date('YndHis', time())];
        }

        $query = \App\Models\Translate::selectRaw(
            DB::raw("min(id) as idx, translates.key as strkey, GROUP_CONCAT(IF(lang='en', translates.value, '') SEPARATOR  '') as en , GROUP_CONCAT(IF(lang='fr', translates.value, '') SEPARATOR  '') as fr , GROUP_CONCAT(IF(lang='ar', translates.value, '') SEPARATOR  '') as ar"))
            ->where(function ($query2) use ($searchOr){
                    foreach($searchOr as $orItem)
                    {
                        $query2 = $query2->orWhere($orItem);
                    }
               })->groupBy('key')->orderBy('created_at','asc');
        //dd($query->toSql());
        $this->search_result = $query->paginate($this->perPage, ['*']);
        
        $this->curPage = $this->search_result->currentPage();
        //dd($this->search_result);
        return view('livewire.translate.index', ['pagination'=>$this->search_result] );
    }
}
