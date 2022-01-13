<?php

namespace App\Http\Livewire\Admin;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Models\University;

class UniversityManage extends Component
{
    use WithPagination;

    public  $perPage = 10;
    public  $curPage = 1;
    private $search_result;
    public  $current_route = 'university-manage';   //for pagination jump

    public  $word; 

    protected $listeners = [
        'deleteUniversity'  => 'deleteUniversity'        ,
        'refresh_list'      => 'refresh_list'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->current_route = Route::currentRouteName();
    }

    public function refresh_list()
    {
        $this->curPage = 1;$this->resetPage();
    }

    public function deleteUniversity($del_id){
        
        # dd(Auth::user());
        if(Auth::user()->role=='admin' && !empty($del_id) )
        {
            $dbtable = University::find($del_id)->delete();
            $this->resetPage();
        }
    }

    public function update($field, $newValue)
    {
    }
    public function updatedCurPage($value)
    {
        $this->curPage = $value;
    }
    public function updatedPerPage($value)
    {
        $this->perPage = $value; $this->curPage=1; $this->resetPage();
        Cookie::queue("perPage", $value, env('COOKIE_EXPIRE_SECONDS'));
    }

    public function mount(Request $request)
    {
        if(Cookie::has("perPage"))  // it is need for the pagination perPage
        {
            $this->perPage = Cookie::get("perPage");
        }
    }

    public function render()
    {
        $searchWord = [];
        if( ! empty($this->word))                  
        {
            $this->word = trim($this->word);
            $searchWord[] =  ['mainname' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['fr'       , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['ar'       , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['en'       , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['town'     , 'like' , '%'.$this->word.'%']; 
        } 

        $cols =  "   users.id as id" 
                ." , users.role as userrole"."" 
                ." , users.name as username"."" 
                ." , users.email as useremail"."" 
                ." , users.Phone as Phone"."" 
                ." , users.location as location".""
                ." , users.photo as photo".""
                ." , users.email_verified_at as email_verified_at"."";
                            
        $cols .= " , trainings.". lang() . ") as training";
        $cols .= " , faculties.". lang() . ") as faculty";
        $cols .= " , specializations.". lang() . ") as specialization";
        $cols .= " , modules.". lang(). ") as course";


        $query = University::where( function($query1) use ($searchWord) {
                if(count($searchWord)>0)
                    foreach($searchWord as $cond)
                        $query1->orWhere([$cond]);
                    
               })
             ->orderBy('id', 'ASC');
//             dd($query->getQuery()->toSql());
             $this->search_result = $query->paginate( $this->perPage );
        //dd($this->curPage);
        return view('livewire.admin.university-manage', ['pagination'=>$this->search_result]);
    }
}
