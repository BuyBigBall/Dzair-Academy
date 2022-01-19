<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use Livewire\Component;
// use Illuminate\Cache\RateLimiting\Limit;
// use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Models\Report;

class ReportView extends Component
{
    use WithPagination;

    //protected $listeners = ['open' => 'loadGalaxy'];
    public  $perPage = 10;
    public  $curPage = 1;
    private $search_result;
    public  $current_route = 'dashboard';   //for pagination jump

    private $report;

    
    protected $listeners = [
        'delete_report' => 'delete_report'       ,
        'agree_report'  => 'agree_report'        ,
    ];

    public function __construct()
    {
        parent::__construct();
        $this->current_route = Route::currentRouteName();
        if( !!empty(Auth::user()) || Auth::user()->role!='admin' )
        {
            return Redirect(route('login'));
        }
    }

    public function agree_report($report_id)
    {

        if(Auth::user()->role=='admin' && !empty($report_id) )
        {
            //dd($report_id);
            $dbtable = Report::find($report_id)->update(['verified_at' => date('Y-n-d H:i:s', time())]);
        }
        // dd($this);
    }

    public function delete_report($del_id)
    {
        
        if(Auth::user()->role=='admin' && !empty($del_id) )
        {
            $dbtable = Report::find($del_id)->delete();
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
        $this->perPage = $value; $this->curPage=1;
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
        //dd($searchWord);
        if( ! empty($this->word))                  
        {
            $this->word = trim($this->word);
            // $searchWord[] =  ['trainings.en' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['trainings.fr' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['trainings.ar' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['faculties.en' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['faculties.fr' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['faculties.ar' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['specializations.en' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['specializations.fr' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['specializations.ar' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['modules.en' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['modules.fr' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['modules.ar' , 'like' , '%'.$this->word.'%']; 

            $searchWord[] =  ['reports.link' , 'like' , '%'.$this->word.'%']; 

            $searchWord[] =  ['creator.name' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['creator.email' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['creator.phone' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['creator.location' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['creator.about' , 'like' , '%'.$this->word.'%']; 

            $searchWord[] =  ['repoter.name' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['repoter.email' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['repoter.phone' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['repoter.location' , 'like' , '%'.$this->word.'%']; 
            // $searchWord[] =  ['repoter.about' , 'like' , '%'.$this->word.'%']; 
        } 

        $cols =  "   reports.id as id" 
                ." , reports.link       as link"."" 
                ." , (courses.title)     as title"."" 
                ." , (reports.content)   as report"."" 
                ." , (creator.name)      as username"."" 
                ." , (creator.email)     as useremail"."" 
                ." , (reporter.name)     as repotername"."" 
                ." , (reporter.email)    as repoteremail"."" ;
                            
        $cols .= " , (trainings." . lang() . ") as training";
        $cols .= " , (faculties." . lang() . ") as faculty";
        $cols .= " , (specializations." . lang() . ") as specialization";
        $cols .= " , (modules." . lang(). ") as module";
        $cols .= " , (modules.level) as level";
        $cols .= " , (reports.created_at) as reported_at";
        $cols .= " , (reports.verified_at) as verified_at";


        $query = Report::selectRaw(
            DB::raw($cols))
                ->leftJoin('courses'    , 'courses.id', '=', 'reports.course_id')
                ->leftJoin('users as reporter'     , 'reporter.id',   '=', 'reports.user_id')
                ->leftJoin('users as creator'      , 'creator.id',    '=', 'courses.created_by')
                ->leftJoin('modules'    , 'modules.id', '=', 'courses.module_id')
                ->leftJoin('specializations' , 'specializations.id', '=', 'modules.specialization_id')
                ->leftJoin('faculties'  , 'faculties.id', '=', 'specializations.faculty_id')
                ->leftJoin('trainings'  , 'trainings.id', '=', 'faculties.training_id')
             ->where( function($query1) use ($searchWord) {
                if(count($searchWord)>0)
                    foreach($searchWord as $cond)
                        $query1->orWhere([$cond]);
                    
               })
             ->orderBy('reports.id' , 'DESC');
            // dd($query->toSql());
             $this->search_result = $query->paginate( $this->perPage );

        return view('livewire.admin.reportviews', ['pagination'=>$this->search_result]);
    }
}
