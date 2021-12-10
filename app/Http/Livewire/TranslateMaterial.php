<?php

namespace App\Http\Livewire;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Course;
use App\Models\Material;
use App\Models\MaterialLanguage;
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
    public  $perPage = 10;
    public  $curPage = 1;
    private $search_result;
    // public  $search_input;
    public  $current_route = 'translate-material';   //for pagination jump

    public $training_options    = [] ;
    public $faculty_options     = [];
    public $course_options     = [];
    public $specialization_options = [];
    public $level_options       = [];

    public $training;       //wire:model
    public $faculty;        //wire:model
    public $specialization; //wire:model
    public $course;       //wire:model
    public $level;          //wire:model
    public $word;          //wire:model

    public function __construct()
    {
        parent::__construct();
    }
    
    public function updatedTraining($value)
    {
        $this->faculty_options = Faculty::where('training_id', $value)->orderBy('id')->get()->toArray();
    }
    public function updatedFaculty($value)
    {
        $this->specialization_options = Specialization::where('faculty_id', $value)->orderBy('id')->get()->toArray();
    }
    public function updatedSpecialization($value)
    {
        $this->course_options = Course::where('specialization_id', $value)->orderBy('id')->get()->toArray();
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
        $this->level_options = \Config::get('constants.levels');;

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

        if( ! empty($this->training))               $searchCond[] = ['materials.training_id' , $this->training];
        if( ! empty($this->faculty))                $searchCond[] = ['materials.faculty_id' , $this->faculty];
        if( ! empty($this->specialization))         $searchCond[] = ['materials.specialization_id' , $this->specialization];
        if( ! empty($this->level))                  $searchCond[] = ['materials.level' , $this->level];
        if( ! empty($this->course))                 $searchCond[] = ['materials.course_id' , $this->course];

        if( ! empty($this->word))                  
        {
            $searchWord[] =  ['material_languages.title' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['material_languages.description' , 'like' , '%'.$this->word.'%'];
            $searchWord[] =  ['materials.title' , 'like' , '%'.$this->word.'%']; 
            $searchWord[] =  ['materials.description' , 'like' , '%'.$this->word.'%'];
        } 

        $cols =  "   materials.id as idx" 
                ." , MIN(materials.title) as strkey"."" 
                ." , GROUP_CONCAT(IF(language='en', material_languages.title, '') SEPARATOR  '') as en "
                ." , GROUP_CONCAT(IF(language='fr', material_languages.title, '') SEPARATOR  '') as fr "
                ." , GROUP_CONCAT(IF(language='ar', material_languages.title, '') SEPARATOR  '') as ar ";

        $cols .= " , MIN(trainings." . lang() . ") as training";
        $cols .= " , MIN(faculties." . lang() . ") as faculty";
        $cols .= " , MIN(specializations." . lang() . ") as spacialization";
        $cols .= " , MIN(courses." . lang(). ") as course";
        $cols .= " , MIN(materials.level) as level";
        //dd($cols);
        $query = \App\Models\Material::selectRaw(
            DB::raw($cols))
                ->leftJoin('material_languages' , 'materials.id', '=', 'material_languages.material_id')
                ->leftJoin('trainings' , 'trainings.id', '=', 'materials.training_id')
                ->leftJoin('faculties' , 'faculties.id', '=', 'materials.faculty_id')
                ->leftJoin('specializations' , 'specializations.id', '=', 'materials.specialization_id')
                ->leftJoin('courses' , 'courses.id', '=', 'materials.course_id')
             ->where($searchCond)
             ->where( function($query1) use ($searchWord) {
                if(count($searchWord)>0)
                    $query1->orWhere([$searchWord[0]])->orWhere([$searchWord[1]])->orWhere([$searchWord[2]])->orWhere([$searchWord[3]]);
               })
             ->groupBy('materials.id')->orderBy('materials.created_at','asc');


        // $cols = "   materials.id as idx" .
        //         " , materials.title as default_title".", materials.description as default_description" .
        //         " , GROUP_CONCAT(IF(language='en', material_languages.title, '') SEPARATOR  '') as en_title  ".
        //         " , GROUP_CONCAT(IF(language='en', material_languages.description, '') SEPARATOR  '') as en_description  ".
        //         " , GROUP_CONCAT(IF(language='fr', material_languages.title, '') SEPARATOR  '') as fr_title ".
        //         " , GROUP_CONCAT(IF(language='fr', material_languages.description, '') SEPARATOR  '') as fr_description  ".
        //         " , GROUP_CONCAT(IF(language='ar', material_languages.title, '') SEPARATOR  '') as ar_title  ".
        //         " , GROUP_CONCAT(IF(language='ar', material_languages.description, '') SEPARATOR  '') as ar_description ";
        // $cols .= " , trainings." . lang() . " as training";
        // $cols .= " , faculties." . lang() . " as faculty";
        // $cols .= " , specializations." . lang() . " as spacialization";
        // $cols .= " , materials.level";

        // $query = \App\Models\Material::selectRaw(
        //     DB::raw($cols))
        //         ->leftJoin('material_languages' , 'materials.id', '=', 'material_languages.material_id')
        //         ->leftJoin('trainings' , 'trainings.id', '=', 'materials.training_id')
        //         ->leftJoin('faculties' , 'faculties.id', '=', 'materials.faculty_id')
        //         ->leftJoin('specializations' , 'specializations.id', '=', 'materials.specialization_id')
        //     ->where($searchCond)->groupBy('materials.id')->orderBy('materials.created_at','asc');
        // print($query->toSql()); //die;// dd($query->get());
        // $this->perPage = 5;        // $this->curPage = 1;
       
        $this->search_result = $query->paginate( $this->perPage );
        return view('livewire.translate-material', ['pagination'=>$this->search_result] );
    }
}