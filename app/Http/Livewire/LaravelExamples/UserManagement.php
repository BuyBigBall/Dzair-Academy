<?php

namespace App\Http\Livewire\LaravelExamples;
use Livewire\WithPagination;
use Livewire\Component;
// use Illuminate\Cache\RateLimiting\Limit;
// use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class UserManagement extends Component
{
    use WithPagination;

    //protected $listeners = ['open' => 'loadGalaxy'];
    public  $perPage = 10;
    public  $curPage = 1;
    private $search_result;
    public  $current_route = 'user-management';   //for pagination jump

    private $training;       
    private $faculty;        
    private $specialization; 
    private $course;         
    private $level;          
    public  $word;          //wire:model
    protected $listeners = [
        'deleteUser' => 'deleteUser'        ,
    ];

    public function __construct()
    {
        parent::__construct();
        $this->current_route = Route::currentRouteName();
    }

    public function deleteUser($del_id){
        
        # dd(Auth::user());
        if(Auth::user()->role=='admin' && !empty($del_id) )
        {
            $dbtable = User::find($del_id)->delete();
        }
    }

    public function update($field, $newValue)
    {
    }
    public function index(Request $request)
    {
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

    public function mount(Request $request)
    {
        // $this->training_options = Training::select('*')->orderBy('symbol')->get()->toArray();
        // $this->level_options = \Config::get('constants.levels');;

        if(Cookie::has("perPage"))  // it is need for the pagination perPage
        {
            $this->perPage = Cookie::get("perPage");
        }
    }

    public function render()
    {
        $searchWord = [];
        //dd($searchWord);
        if( ! empty($this->word))                  
        {
            $searchWord[] =  ['trainings.en' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['trainings.fr' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['trainings.ar' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['faculties.en' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['faculties.fr' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['faculties.ar' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['specializations.en' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['specializations.fr' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['specializations.ar' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['modules.en' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['modules.fr' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['modules.ar' , 'like' , '%'.$this->word.'%']; 

            $searchWord[] =  ['users.name' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['users.email' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['users.phone' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['users.location' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['users.about' , 'like' , '%'.$this->word.'%']; 
        } 

        $cols =  "   users.id as idx" 
                ." , MIN(users.role) as userrole"."" 
                ." , MIN(users.name) as username"."" 
                ." , MIN(users.email) as useremail"."" 
                ." , MIN(users.Phone) as Phone"."" 
                ." , MIN(users.location) as location".""
                ." , MIN(users.photo) as photo".""
                ." , MIN(users.email_verified_at) as email_verified_at"."";
                            
        $cols .= " , MIN(trainings." . lang() . ") as training";
        $cols .= " , MIN(faculties." . lang() . ") as faculty";
        $cols .= " , MIN(specializations." . lang() . ") as spacialization";
        $cols .= " , MIN(modules." . lang(). ") as course";


        $query = \App\Models\User::selectRaw(
            DB::raw($cols))
                ->leftJoin('modules' , 'modules.id', '=', 'users.course_id')
                ->leftJoin('specializations' , 'specializations.id', '=', 'modules.specialization_id')
                ->leftJoin('faculties' , 'faculties.id', '=', 'specializations.faculty_id')
                ->leftJoin('trainings' , 'trainings.id', '=', 'faculties.training_id')
             ->where( function($query1) use ($searchWord) {
                if(count($searchWord)>0)
                    foreach($searchWord as $cond)
                        $query1->orWhere([$cond]);
                    
               })
             ->groupBy('users.id')->orderBy('users.role')->orderBy('users.id', 'ASC');
             //dd($query->getQuery()->toSql());
             //dd($query.toSql());
             $this->search_result = $query->paginate( $this->perPage );

        return view('livewire.laravel-examples.user-management', ['pagination'=>$this->search_result]);
    }
}
