<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Course;
use Livewire\WithFileUploads;
use App\Models\MaterialLanguage;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class CourseMaterial extends Component
{
    use WithFileUploads;


    public $training_options    = [] ;
    public $faculty_options     = [];
    public $subject_options     = [];
    public $specialization_options = [];
    public $level_options       = [];
    
    // ######## ---> wire:model
    public $training;       
    public $faculty;        
    public $specialization; 
    public $module;       
    public $level;          
    
    public $add_coll_type;       


    public $title;          
    public $description;          
    public $file;          
    public $protection;        
    public $password_code;  
    public $confirm_code;
    public $cate_course = true;
    public $cate_exercise = true;
    public $cate_exam = true;
    // <--- ######## wire:model

    protected $rules = [
        'training' => 'required',
        'faculty' => 'required',
        'specialization' => 'required',
        'module' => 'required',
        'level' => 'required',
        'title' => 'required|max:200',
        'file'  => 'required|max:'.MAX_COURSE_UPLOAD_SIZE,     // max 1M=1024K
    ];
    public function __construct()
    {
        parent::__construct();
    }
    
    public function mount()
    {
        $this->training_options = Training::select('*')->orderBy('symbol')->get()->toArray();
        $this->level_options = \Config::get('constants.levels');
        $this->add_coll_type = 0;

    } 
    public function updatedAddCollType($value)
    {
        //dd($value);
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
        $this->subject_options = Course::where('specialization_id', $value)->orderBy('id')->get()->toArray();
    }

    public function updatedFile()
    {
        //dd( $this->file);
        $this->validate([
            'file' => 'max:'.MAX_COURSE_UPLOAD_SIZE.       // Max 1MB =1024K
                     '|mimes:'.env('ALLOW_COURSE_UPLOAD_EXTENSIONS')
        ]);
    }


    public function updated($field, $newValue)
    {
        $this->validateOnly($field);
    }

    public function savecourse() {

        $validatedData = $this->validate();

       //dd($this->add_coll_type);
        if(!empty($this->protection))
        {
            if( !! empty($this->password_code))
            {
                $error['password_empty'] = true;
                return;
            }
            if($this->password_code != $this->confirm_code)
            {
                $error['password_nomatch'] = true;
                return;
            }
        }
        //$this->photo->storePubliclyAs('photos', 'avatar', 's3');  # save to S3 service store
        $origin_filename = $this->file->getClientOriginalName();
        $store_result = $this->file->store($this->specialization . '/courses');  # courses/nb6QQA0FZ2e2YA8whGNej3R9KISpIO1tQrJEJhEi.zip

        $file_extension = explode('.', $store_result );
        if( count($file_extension)==1 ) $file_extension[]='none';
        if( strlen($file_extension[count($file_extension)-1])>env('MAX_EXTENSION_LENGTH')) 
                $file_extension[count($file_extension)-1]=substr($file_extension[count($file_extension)-1], -env('MAX_EXTENSION_LENGTH') );
        $file_extension = $file_extension[count($file_extension)-1];
        $file_name = explode('/', $store_result);
        $file_name = $file_name[ count($file_name)-1];
        $file_path = $store_result;

        // Add registration data to modal
        // dd( $validatedData );
        // dd($file_extension);
        // dd(GetFile_Type( $file_extension));
        $course_material = Material::create(
                    [
                        'specialization_id' => $this->specialization,
                        'level'             => $this->level,
                        'faculty_id'        => $this->faculty,
                        'training_id'       => $this->training,
                        'course_id'         => $this->module,
                        'created_by'        => Auth::id(),
                        'updated_by'        => Auth::id(),
                        'title'             => $this->title,
                        'description'       => $this->description,
                        'filetype'          => GetFile_Type( $file_extension),
                        'filesize'          => $this->file->getSize(),
                        'filepath'          => $file_path,
                        'filename'          => $origin_filename,
                        'protected'         => !empty($this->protection) ? md5($this->password_code) : '',
                        'cate_course'       => $this->cate_course,
                        'cate_exercise'     => $this->cate_exercise,
                        'cate_exam'         => $this->cate_exam,
                    ]);
        $new_course_Material_id = $course_material->id;
        
        $materal_language = MaterialLanguage::create([
                        'material_id'      => $new_course_Material_id,
                        'language'         => lang(),
                        'created_by'       => Auth::id(),
                        'updated_by'       => Auth::id(),
                        'title'            => $this->title,
                        'description'      => $this->description,
                    ]);
        $materal_language_id = $materal_language->id;

        $this->title = null;          
        $this->description = null;          
        $this->file = null;          
        $this->protection = null;          
        $this->password_code = '';    
        $this->confirm_code = '';
        
        if($this->add_coll_type==1)
            $this->emit('ShowModal', $new_course_Material_id);
        elseif($this->add_coll_type==2)
            $this->emit('doShow', $new_course_Material_id);
        else
            $this->emit('WireAlert', translate('Course file registration has been successed.'), '');

    }

    public function render()
    {
        return view('livewire.coursematerial');
    }
}
