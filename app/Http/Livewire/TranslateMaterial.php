<?php

namespace App\Http\Livewire;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Module;
use App\Models\Course;
use App\Models\CourseLanguage;
use Livewire\Component;
use Illuminate\Session\SessionManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

use LivewireUI\Modal\ModalComponent;

class TranslateMaterial extends Component
{
    use WithPagination;

    //protected $listeners = ['open' => 'loadGalaxy'];

    public  $edit_id;

    public  $perPage = 10;
    public  $curPage = 1;
    private $search_result;
    // public  $search_input;
    public  $current_route = 'translate-course';   //for pagination jump

    public $training_options    = [] ;
    public $faculty_options     = [];
    public $module_options     = [];
    public $specialization_options = [];
    public $level_options       = [];

    public $training;       //wire:model
    public $faculty;        //wire:model
    public $specialization; //wire:model
    public $module;       //wire:model
    public $level;          //wire:model
    public $word;          //wire:model

    public function __construct()
    {
        parent::__construct();
    }
    
    public function updatedTraining($value)
    {
        $this->faculty_options = Faculty::where('training_id', $value)->where('status', 1)->orderBy('id')->get()->toArray();
    }
    public function updatedFaculty($value)
    {
        $this->specialization_options = Specialization::where('faculty_id', $value)->where('status', 1)->orderBy('id')->get()->toArray();
    }
    public function updatedSpecialization($value)
    {
        if(!empty($this->level))
            $this->module_options = Module::where('specialization_id', $value)->where('level', $this->level)->where('status', 1)->orderBy('id')->get()->toArray();
        else
            $this->module_options = Module::where('specialization_id', $value)->where('status', 1)->orderBy('id')->get()->toArray();
    }
    public function updatedLevel($value)
    {
        if(!empty($this->specialization))
            $this->module_options = Module::where('level', $value)->where('specialization_id', $this->specialization)->where('status', 1)->orderBy('id')->get()->toArray();
        else
            $this->module_options = Module::where('level', $value)->where('status', 1)->orderBy('id')->get()->toArray();
    }
    public function update($field, $newValue)
    {
        // $this->faculty_options = $newValue;
        // if($field=='training')
        // {
        //     $this->faculty_options = Faculty::where('training_id', $value)->orderBy('id')->get()->toArray();    
        // }
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
        //$this->mount( ($request=Request::capture()) );
        //$this->emit('renderPerPage');
    }

    public function mount(Request $request)
    {
        $this->training_options = Training::select('*')->orderBy('symbol')->get()->toArray();
        $this->level_options = \Config::get('constants.levels');

        if(!empty($request->id) && !empty($course = Course::find($request->id)) )
        {
            $this->edit_id = $request->id;
            $this->training = $course->training_id;
            if(!empty( ($value=$this->training) ))
            {
                $this->faculty_options = Faculty::where('training_id', $value)->where('status', 1)->orderBy('id')->get()->toArray();
            }
            $this->faculty = $course->faculty_id;
            if(!empty( ($value=$this->faculty) ))
            {
                $this->specialization_options = Specialization::where('faculty_id', $value)->where('status', 1)->orderBy('id')->get()->toArray();
            }
            $this->specialization = $course->specialization_id;
            if(!empty( ($value=$this->specialization) ))
            {
                $this->module_options = Module::where('specialization_id', $value)->orderBy('id')->get()->toArray();
            }
            $this->module  = $course->module_id;
            $this->level   = $course->level;
            // if(!empty($this->edit_id))
            // $this->emit('ShowMaterialModal', $request->id);
            // dd($this);
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

    public function search(Request $request)
    {
        //$this->emit('renderPerPage');
        //$request=Request::capture()
        //$this->search_input = $request->input();
        //dd($this->search_input);
        return $this->render();
    }
    public function render()
    {
        $searchCond = [];        $searchWord = [];        $searchOr = []; $searchOr1 = [];

        if( ! empty($this->training))               $searchCond[] = ['courses.training_id' ,        $this->training];
        if( ! empty($this->faculty))                $searchCond[] = ['courses.faculty_id' ,         $this->faculty];
        if( ! empty($this->specialization))         $searchCond[] = ['courses.specialization_id' ,  $this->specialization];
        if( ! empty($this->level))                  $searchCond[] = ['courses.level' ,              $this->level];
        if( ! empty($this->module))                 $searchCond[] = ['courses.module_id' ,          $this->module];

        if( ! empty($this->word))                  
        {
            $searchWord[] =  ['course_languages.title' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['course_languages.description' , 'like' , '%'.$this->word.'%'];
            $searchWord[] =  ['courses.title' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['courses.description' , 'like' , '%'.$this->word.'%'];
        } 

        $cols =  "   courses.id as idx" 
                ." , MIN(courses.title) as strkey"."" 
                ." , GROUP_CONCAT(IF(language='en', course_languages.title, '') SEPARATOR  '') as en "
                ." , GROUP_CONCAT(IF(language='fr', course_languages.title, '') SEPARATOR  '') as fr "
                ." , GROUP_CONCAT(IF(language='ar', course_languages.title, '') SEPARATOR  '') as ar ";

        $cols .= " , MIN(trainings." . lang() . ") as training";
        $cols .= " , MIN(faculties." . lang() . ") as faculty";
        $cols .= " , MIN(specializations." . lang() . ") as specialization";
        $cols .= " , MIN(modules." . lang(). ") as course";
        $cols .= " , MIN(courses.level) as level";
        //dd($cols);
        $query = \App\Models\Course::selectRaw(
            DB::raw($cols))
                ->leftJoin('course_languages' , 'courses.id', '=', 'course_languages.course_id')
                ->leftJoin('trainings' , 'trainings.id', '=', 'courses.training_id')
                ->leftJoin('faculties' , 'faculties.id', '=', 'courses.faculty_id')
                ->leftJoin('specializations' , 'specializations.id', '=', 'courses.specialization_id')
                ->leftJoin('modules' , 'modules.id', '=', 'courses.module_id')
             ->where($searchCond)
             ->where( function($query1) use ($searchWord) {
                if(count($searchWord)>0)
                    $query1->orWhere([$searchWord[0]])->orWhere([$searchWord[1]])->orWhere([$searchWord[2]])->orWhere([$searchWord[3]]);
               })
             ->groupBy('courses.id')->orderBy('courses.created_at','asc');

        $this->search_result = $query->paginate( $this->perPage );
        return view('livewire.translate.translate-course', ['pagination'=>$this->search_result] );
    }
}
