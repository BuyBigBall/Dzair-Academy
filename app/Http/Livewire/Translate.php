<?php

namespace App\Http\Livewire;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Course;
use App\Models\Material;
use Livewire\Component;
use Illuminate\Session\SessionManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Translate extends Component
{
    use WithPagination;

    public  $perPage = 10;
    public  $curPage = 1;
    private $search_result;
    public  $search_input;
    public  $current_route = 'translate';   //for pagination jump

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(Request $request)
    {
    }

    public function updatedPerPage($value)
    {
        $this->perPage = $value;
        Cookie::queue("perPage", $value, env('COOKIE_EXPIRE_SECONDS'));
        $this->mount( ($request=Request::capture()) );
        $this->emit('renderPerPage');
    }

    public function mount(Request $request)
    {
        //if($flag==null)
        if(Cookie::has("perPage"))
        {
            $this->perPage = Cookie::get("perPage");
        }
        $this->search_input = $request->input();
    }
    public function nextPage($page)
    {
    }
    public function render()
    {
        $searchCond = [];
        $query = \App\Models\Translate::selectRaw(
            DB::raw("min(id) as idx, translates.key as strkey, GROUP_CONCAT(IF(lang='en', translates.value, '') SEPARATOR  '') as en , GROUP_CONCAT(IF(lang='fr', translates.value, '') SEPARATOR  '') as fr , GROUP_CONCAT(IF(lang='ar', translates.value, '') SEPARATOR  '') as ar"))
            ->where($searchCond)->groupBy('key')->orderBy('created_at','asc');
        // print($query->toSql()); die;// dd($query->get());
        // $this->perPage = 5;        // $this->curPage = 1;
       
        $this->search_result = $query->get();
        return view('livewire.translate.index', ['pagination'=>$this->search_result] );
    }
}
