<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Module;
use App\Models\Course;
use App\Models\CourseLanguage;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AddingManagement extends Component
{
    private $const_path_level = ['training'=>1,'faculty'=>2,'specialization'=>3,'course'=>4,'material'=>5];
    public $const_path_name;
    public $training_options    = [] ;
    public $faculty_options     = [];
    public $module_options      = [];
    public $specialization_options = [];
    public $level_options       = [];
    public $list_items          = [];

    public $list_title;       
    public $list_of;

    public $user_role;

    public $training;       //wire:model
    public $faculty;        //wire:model
    public $specialization; //wire:model
    public $module;         //wire:model
    public $level;          //wire:model
    public $word;           //wire:model
    public $registered_name;//wire:model

    public $training_style = '';
    public $faculty_style = '';
    public $spec_style = '';
    public $level_style = '';
    public $module_style = '';

    public $Label;
    public $PlaceHolder;

    public $path_level = 1;
    protected $listeners = [
        'deleteCourse' => 'deleteCourse'        ,
        'refreshBranchList' => 'refreshBranchList'        ,
    ];
    // protected $rules = [
    //     'del_id' => 'required',
    // ];
    
    public function refreshBranchList()
    {
        if( $this->path_level==1) $this->mount(); 
        if( $this->path_level==2) $this->updatedTraining($this->training); 
        if( $this->path_level==3) $this->updatedFaculty($this->faculty); 
        if( $this->path_level==4) $this->updatedSpecialization($this->specialization); 
        if( $this->path_level==5) $this->updatedModule($this->module);         
    }

    public function deleteCourse($del_id){
        if( ($this->user_role=='admin' || 
             $this->user_role=='staff' && $this->path_level>=3) 
             && !empty($del_id) )
        {
            $course_count = 0;
            $dbtable = null;
            if( $this->path_level==1) 
            {
                $dbtable = Training::find($del_id);
                $course_count = Course::where('training_id', $del_id)->where('status', '>=', 0)->get()->count();
            }
            if( $this->path_level==2) 
            {
                $dbtable = Faculty::find($del_id);
                $course_count = Course::where('faculty_id', $del_id)->where('status', '>=', 0)->get()->count();
            }
            if( $this->path_level==3) 
            {
                $dbtable = Specialization::find($del_id);
                $course_count = Course::where('specialization_id', $del_id)->where('status', '>=', 0)->get()->count();
            }
            if( $this->path_level==4) 
            {
                $dbtable = Module::find($del_id);
                $course_count = Course::where('module_id', $del_id)->get()->where('status', '>=', 0)->count();
            }
            if( $this->path_level==5) $dbtable = Course::find($del_id);
            
            if(  $dbtable!=null )
            {
                if($course_count>0)
                {
                    $this->emit('WireAlert', translate('Can not delete, please delete including courses first.'), ''); return;
                }

                // $parnt_id = 'training_id';
                // if( $this->path_level==1)
                // {
                //     $parnt_id = 'training_id';
                // }
                // else if( $this->path_level==1)
                // {
                //     $parnt_id = 'faculty_id';
                // }
                // else if( $this->path_level==1)
                // {
                //     $parnt_id = 'specialization_id'      ;              
                // }
                // else if( $this->path_level==1)
                // {
                //     $parnt_id = 'module_id';
                // }

                // foreach(Course::where($parnt_id, $del_id)->where('status', -1)->get() as $row)
                // {
                //     CourseLanguage::where('course_id', $row->id)->delete();
                // }
                // Course::where($parnt_id, $del_id)->where('status', -1)->delete();
            
                try{
                    // $dbtable->delete();
                    $dbtable->status = -1; $dbtable->save();
                }
                catch( \Throwable $e)
                {
                    dd($e);
                    return;
                }
            }
            else
            {
                dd([$this->path_level, $del_id]);
            }
            if( $this->path_level==1) $this->mount(); 
            if( $this->path_level==2) $this->updatedTraining($this->training); 
            if( $this->path_level==3) $this->updatedFaculty($this->faculty); 
            if( $this->path_level==4) $this->updatedSpecialization($this->specialization); 
            if( $this->path_level==5) $this->updatedModule($this->module); 
        }
    }
    public function mount()
    {
        $this->user_role = Auth::user()->role;

        $this->path_level = $this->const_path_level['training'];
        $this->const_path_name = translate("Edit Training");
        $this->list_items = 
        $this->training_options = Training::where('status', '>=', '0')->select('*')->orderBy('symbol')->get()->toArray();
        $this->list_title = translate('All Trainings');
        $this->level_options = \Config::get('constants.levels');
        $this->list_of = '';
        $this->faculty_options = [];
        $this->specialization_options = [];
        $this->module_options = [];

    }
    public function updatedTraining($value)
    {
        if($value==0) 
        {
            $this->training_style = 'background-color:#f6f6f2 !important; font-weight:normal;';
            $this->training = 0;
            $this->faculty = 0;
            $this->specialization = 0;
            $this->module = 0;
            return $this->mount();
        }
        $this->training_style = 'background-color:#fff !important;font-weight:600;';

        $this->path_level = $this->const_path_level['faculty'];
        $this->const_path_name = translate("Edit Faculty");
        $this->list_items = 
        $this->faculty_options = Faculty::where('training_id', $value)->where('status','>=', 0)->orderBy('id')->get()->toArray();
        $this->list_title = translate('All Faculties');
        $this->list_of = Training::find($value)->toArray()[lang()];

    }
    public function updatedFaculty($value)
    {
        if($value==0) 
        {
            $this->faculty_style = 'background-color:#f6f6f2 !important;font-weight:normal;';
            $this->faculty = 0;
            $this->specialization = 0;
            $this->module = 0;
            return $this->updatedTraining($this->training);
        }

        $this->faculty_style = 'background-color:#fff !important;font-weight:600;';
        $this->path_level = $this->const_path_level['specialization'];
        $this->const_path_name = translate("Edit Specialization");
        $this->list_items = 
        $this->specialization_options = Specialization::where('faculty_id', $value)->where('status','>=', 0)->orderBy('id')->get()->toArray();
        $this->list_title = translate('All Specializations');
        $this->list_of = Faculty::where('id', $value)->first()->toArray()[lang()];
    }
    public function updatedSpecialization($value)
    {
        if($value==0) 
        {
            $this->spec_style = 'background-color:#f6f6f2 !important;font-weight:normal;';
            $this->module_style = 'background-color:#f6f6f2 !important;font-weight:normal;';
            $this->specialization = 0;
            $this->module = 0;
            return $this->updatedFaculty($this->faculty);
        }
        $this->spec_style = 'background-color:#fff !important;font-weight:600;';

        $this->path_level       = $this->const_path_level['course'];
        $this->const_path_name  = translate("Edit Course");
        $this->list_title       = translate('All Subjects');
        $this->list_of          = Specialization::where('id', $value)->first()->toArray()[lang()];
        
        //dd($this->level);
        if(!empty($this->level) && is_numeric($this->level))
        {
            $query = Module::where('specialization_id', $value)->where('level', $this->level)->where('status','>=', 0)->orderBy('id');
        }
        else
        {
            $query = Module::where('specialization_id', $value)->where('status','>=', 0)->orderBy('id');
        }
        //dd($query->toSql());
        $this->list_items = $this->module_options = $query->get()->toArray();    

        // dd($this->list_items);

    }
    public function updatedLevel($value)
    {
        if(!empty($this->specialization))
        {
            if( !empty($value) )
                $this->list_items = 
                $this->module_options = Module::where('level', $value)->where('specialization_id', $this->specialization)->orderBy('id')->get()->toArray();
            else
                $this->list_items = 
                $this->module_options = Module::where('specialization_id', $this->specialization)->orderBy('id')->get()->toArray();
        }
        else
        {
            $this->list_items = 
            $this->module_options = Module::where('level', $value)->orderBy('id')->get()->toArray();
        }

        if(!empty($value))
            $this->level_style = 'background-color:#fff !important;font-weight:600;';
        else
            $this->level_style = 'background-color:#f6f6f2 !important;font-weight:normal;';
    }

    public function updatedModule($value)
    {
        if($value==0) 
        {
            $this->module_style = 'background-color:#f6f6f2 !important;font-weight:normal;';
            $this->module = 0;
            return $this->updatedSpecialization($this->specialization);
        }
        $this->module_style = 'background-color:#fff !important;font-weight:600;';
        $this->path_level = $this->const_path_level['material'];
        $this->const_path_name = translate("Edit Course");
        $cols =  "   courses.id as id" 
                ." , MIN(courses.title) as strkey"."" 
                ." , GROUP_CONCAT(IF(language='en', course_languages.title, '') SEPARATOR  '') as en "
                ." , GROUP_CONCAT(IF(language='fr', course_languages.title, '') SEPARATOR  '') as fr "
                ." , GROUP_CONCAT(IF(language='ar', course_languages.title, '') SEPARATOR  '') as ar ";

        $cols .= " , MIN(trainings." . lang() . ") as training";
        $cols .= " , MIN(faculties." . lang() . ") as faculty";
        $cols .= " , MIN(specializations." . lang() . ") as specialization";
        $cols .= " , MIN(modules." . lang(). ") as course";
        $cols .= " , MIN(courses.level) as level";
        
        $this->list_title = translate('All Courses');
        $this->list_of = Module::where('id', $value)->first()->toArray()[lang()];

        $limit = 10;
        if(Cookie::has("perPage"))
        {
            $limit = Cookie::get("perPage");
        }

        $query = \App\Models\Course::selectRaw( DB::raw($cols) )
                ->leftJoin('course_languages' , 'courses.id', '=', 'course_languages.course_id')
                ->leftJoin('trainings' , 'trainings.id', '=', 'courses.training_id')
                ->leftJoin('faculties' , 'faculties.id', '=', 'courses.faculty_id')
                ->leftJoin('specializations' , 'specializations.id', '=', 'courses.specialization_id')
                ->leftJoin('modules' , 'modules.id', '=', 'courses.module_id')
                ->where('module_id', $value)
                ->groupBy('courses.id')->orderBy('courses.created_at','asc');
        $this->list_items = $query->limit( $limit )->get();


    }

    public function updated($field, $newValue)
    {
    }

    public function save()
    {
        if( !!empty($this->registered_name))
        {
            $this->emit('WireAlert', translate('please input new item name'), ''); return;
        }
        if(!empty($this->specialization) && !empty($this->faculty) && !empty($this->training) )
        {
            if( !!empty($this->level))
            {
                $this->emit('WireAlert', translate('please select level'), ''); return;
            }

            $newModule = Module::create([
                'specialization_id' => $this->specialization,
                'level'             => $this->level,
                lang()              => $this->registered_name,
            ]);
            $this->updatedSpecialization($this->specialization);
            $this->registered_name = '';
        }
        if(!!empty($this->specialization) && !empty($this->faculty) && !empty($this->training) )
        {
            $newSpec = Specialization::create([
                'faculty_id'        => $this->faculty,
                lang()              => $this->registered_name,
            ]);
            $this->updatedFaculty($this->faculty);
            $this->registered_name = '';
        }
        if(!!empty($this->specialization) && !!empty($this->faculty) && !empty($this->training) )
        {
            $newFaculty = Faculty::create([
                'training_id'       => $this->training,
                lang()              => $this->registered_name,
            ]);
            $this->updatedTraining($this->training);
            $this->registered_name = '';
        }
    }

    public function render()
    {
        $this->Label = '';
        $this->PlaceHolder = '';
        
        if( !empty($this->training) )           $this->Label = translate("New Faculty Name");
        if( !empty($this->faculty) )            $this->Label = translate("New Specialization Name");
        if( !empty($this->specialization) )     $this->Label = translate("New Module Name");

        if( !empty($this->training) )           $this->PlaceHolder = translate("Please enter a new Faculty name.");
        if( !empty($this->faculty) )            $this->PlaceHolder = translate("Please enter a new Specialization name.");
        if( !empty($this->specialization) )     $this->PlaceHolder = translate("Please enter a new Module name.");
        
        return view('livewire.courses.adding-management');
    }
}
