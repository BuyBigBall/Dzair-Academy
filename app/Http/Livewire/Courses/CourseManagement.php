<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Course;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CourseManagement extends Component
{
    private $const_path_level = ['training'=>1,'faculty'=>2,'specialization'=>3,'course'=>4,'material'=>5];
    public $const_path_name;
    public $training_options    = [] ;
    public $faculty_options     = [];
    public $course_options      = [];
    public $specialization_options = [];
    public $level_options       = [];
    public $list_items          = [];

    public $list_title;       
    public $list_of;

    public $training;       //wire:model
    public $faculty;        //wire:model
    public $specialization; //wire:model
    public $course;         //wire:model
    public $level;          //wire:model
    public $word;           //wire:model

    public $path_level = 1;
    protected $listeners = [
        'deleteCourse' => 'deleteCourse'        ,
    ];
    // protected $rules = [
    //     'del_id' => 'required',
    // ];

    public function deleteCourse($del_id){
        //$this->validate();
        //dd($del_id);
        if(Auth::user()->role=='admin' && !empty($del_id) )
        {
            #this->path_level
            #$del_id
            $dbtable = null;
            if( $this->path_level==1) $dbtable = Training::find($del_id);
            if( $this->path_level==2) $dbtable = Faculty::find($del_id);
            if( $this->path_level==3) $dbtable = Specialization::find($del_id);
            if( $this->path_level==4) $dbtable = Course::find($del_id);
            if( $this->path_level==5) $dbtable = Material::find($del_id);
            
            if(  $dbtable!=null )
            {
                $dbtable->delete();
            }
            else
            {
                dd([$this->path_level, $del_id]);
            }
            if( $this->path_level==1) $this->mount(); 
            if( $this->path_level==2) $this->updatedTraining(); 
            if( $this->path_level==3) $this->updatedFaculty(); 
            if( $this->path_level==4) $this->updatedSpecialization(); 
            if( $this->path_level==5) $this->updatedCourse(); 
        }
    }
    public function mount()
    {
        $this->path_level = $this->const_path_level['training'];
        $this->const_path_name = translate("Edit Training");
        $this->list_items = 
        $this->training_options = Training::select('*')->orderBy('symbol')->get()->toArray();
        $this->list_title = translate('All Trainings');
        $this->level_options = \Config::get('constants.levels');
        $this->list_of = '';
        $this->faculty_options = [];
        $this->specialization_options = [];
        $this->course_options = [];
    }
    public function updatedTraining($value)
    {
        if($value==0) return $this->mount();
        $this->path_level = $this->const_path_level['faculty'];
        $this->const_path_name = translate("Edit Faculty");
        $this->list_items = 
        $this->faculty_options = Faculty::where('training_id', $value)->orderBy('id')->get()->toArray();
        $this->list_title = translate('All Faculties');
        $this->list_of = Training::where('id', $value)->first()->toArray()[lang()];
    }
    public function updatedFaculty($value)
    {
        if($value==0) return $this->updatedTraining($this->training);
        $this->path_level = $this->const_path_level['specialization'];
        $this->const_path_name = translate("Edit Specialization");
        $this->list_items = 
        $this->specialization_options = Specialization::where('faculty_id', $value)->orderBy('id')->get()->toArray();
        $this->list_title = translate('All Specializations');
        $this->list_of = Faculty::where('id', $value)->first()->toArray()[lang()];
    }
    public function updatedSpecialization($value)
    {
        if($value==0) return $this->updatedFaculty($this->faculty);
        $this->path_level = $this->const_path_level['course'];
        $this->const_path_name = translate("Edit Course");
        $this->list_items = 
        $this->course_options = Course::where('specialization_id', $value)->orderBy('id')->get()->toArray();
        $this->list_title = translate('All Courses');
        $this->list_of = Specialization::where('id', $value)->first()->toArray()[lang()];
    }

    public function updatedCourse($value)
    {
        if($value==0) return $this->updatedSpecialization($this->specialization);
        $this->path_level = $this->const_path_level['material'];
        $this->const_path_name = translate("Edit Material");
        $cols =  "   materials.id as id" 
                ." , MIN(materials.title) as strkey"."" 
                ." , GROUP_CONCAT(IF(language='en', material_languages.title, '') SEPARATOR  '') as en "
                ." , GROUP_CONCAT(IF(language='fr', material_languages.title, '') SEPARATOR  '') as fr "
                ." , GROUP_CONCAT(IF(language='ar', material_languages.title, '') SEPARATOR  '') as ar ";

        $cols .= " , MIN(trainings." . lang() . ") as training";
        $cols .= " , MIN(faculties." . lang() . ") as faculty";
        $cols .= " , MIN(specializations." . lang() . ") as spacialization";
        $cols .= " , MIN(courses." . lang(). ") as course";
        $cols .= " , MIN(materials.level) as level";
        
        $this->list_title = translate('All Files');
        $this->list_of = Course::where('id', $value)->first()->toArray()[lang()];

        $limit = 10;
        if(Cookie::has("perPage"))
        {
            $limit = Cookie::get("perPage");
        }

        $query = \App\Models\Material::selectRaw( DB::raw($cols) )
                ->leftJoin('material_languages' , 'materials.id', '=', 'material_languages.material_id')
                ->leftJoin('trainings' , 'trainings.id', '=', 'materials.training_id')
                ->leftJoin('faculties' , 'faculties.id', '=', 'materials.faculty_id')
                ->leftJoin('specializations' , 'specializations.id', '=', 'materials.specialization_id')
                ->leftJoin('courses' , 'courses.id', '=', 'materials.course_id')
                ->where('course_id', $value)
                ->groupBy('materials.id')->orderBy('materials.created_at','asc');
        $this->list_items = $query->limit( $limit )->get();


    }

    public function updated($field, $newValue)
    {
    }
    public function render()
    {
        return view('livewire.courses.course-management');
        //return view('livewire.courses.course-download');
        
    }
}
