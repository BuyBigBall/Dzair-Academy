<?php

namespace App\Http\Livewire\Courses;
use Livewire\Component;
use App\Models\Material;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Module;
use Illuminate\Http\Request;

class CourseDetail extends Component
{
    public $pid;
    public $material;
    public $material_laanguage;

    public $title;
    public $category_string;
    public $description;
    public $training;
    public $faculty;
    public $specialization;
    public $level;
    public $module;
    public $protected;
    public $encryptPassword;
    public $file_information;

    public $password;

    public $training_string;
    public $faculty_string;
    public $specialization_string;
    public $level_string;
    public $module_string;

    public function mount($id) {

        $this->pid = intval($id);
        $this->material = $mat = Material::find($id);
        $this->material_laanguage = $mat_lang = Material::find($id)->lang()->where('language', lang())->first();
        
        $this->password = $mat->protected;
        $this->protected = !empty($mat->protected);

        $this->title        = $mat_lang!=null ? $mat_lang->title : $mat->title;
        $this->description  = $mat_lang!=null ? $mat_lang->description : $mat->description;

        $this->category_string = '';
        if(!empty($this->category_string) && !empty($mat->cate_exercise))   $this->category_string .= ',';
        if(!empty($mat->cate_exercise))     $this->category_string .= translate('Exercise');
        if(!empty($this->category_string) && !empty($mat->cate_course))     $this->category_string .= ',';
        if(!empty($mat->cate_course))       $this->category_string .= translate('Course');
        if(!empty($this->category_string) && !empty($mat->cate_exam))       $this->category_string .= ',';
        if(!empty($mat->cate_exam))         $this->category_string .= translate('Exam');

        $this->training         = $mat->training_id;
        $this->faculty          = $mat->faculty_id;
        $this->specialization   = $mat->specialization_id;
        $this->module           = $mat->course_id;

        $this->training_string         = '';
        $this->faculty_string          = '';
        $this->specialization_string   = '';
        $this->level_string            = '';
        $this->module_string           = '';
        if(!empty($this->training))          $this->training_string = Training::find($this->training)->toArray()[lang()];
        if(!empty($this->faculty))           $this->faculty_string = Faculty::find($this->faculty)->toArray()[lang()];
        if(!empty($this->specialization))    $this->specialization_string = Specialization::find($this->specialization)->toArray()[lang()];
        if(!empty($this->level))             $this->level_string = $this->level;
        if(!empty($this->module))            $this->module_string = Module::find($this->module)->toArray()[lang()];

        $this->file_information = [];
        $this->file_information['filename'] = $mat->filename;
        $this->file_information['filepath'] = $mat->filepath;
        $this->file_information['filetype'] = $mat->filetype;
        $this->file_information['filesize'] = $mat->filesize;
        //dd($this->selection_string);
    }
    public function download(Request $request)
    {
        //$myFile = public_path("dummy_pdf.pdf");
        $myFile = storage_path('app/'.$this->material->filepath);
    	$headers = []; //['Content-Type: application/pdf'];
    	$newName = $this->file_information['filename'];
        
        if( !empty($this->password) && $this->password!=md5($this->encryptPassword))
        {
            return $this->emit('WireAlert', translate('Download password no matched.'), '');
        }

    	return response()->download($myFile, $newName, $headers);
    }

    public function render()
    {
        $this->training = 'training';
        $this->faculty = 'faculty';
        $this->specialization = 'specialization';
        $this->level = 'level';
    
        return view('livewire.courses.course-download');
    }
}
