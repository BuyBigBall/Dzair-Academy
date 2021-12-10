<?php

namespace App\Http\Livewire\Courses;
use Livewire\Component;
use App\Models\Material;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Course;


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
    public $course;
    public $protected;
    public $encryptPassword;
    public $file_information;

    private $password;

    public $selection_string;

    public function mount($id) {

        $this->pid = intval($id);
        $this->material = $mat = Material::find($id);
        $this->material_laanguage = $mat_lang = Material::find($id)->lang()->where('language', lang())->first();
        
        $this->password = $mat->protected;
        $this->protected = !empty($mat->protected);

        $this->title        = $mat_lang->title;
        $this->description  = $mat_lang->description;

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
        $this->course           = $mat->course_id;


        $this->selection_string = '';
        if(!empty($this->selection_string) && !empty($this->training))   $this->selection_string .= htmlentities(' / ') ;
        if(!empty($this->training))          $this->selection_string .= Training::find($this->training)->toArray()[lang()];
        if(!empty($this->selection_string) && !empty($this->faculty))   $this->selection_string .= htmlentities(' / ');
        if(!empty($this->faculty))           $this->selection_string .= Faculty::find($this->faculty)->toArray()[lang()];
        if(!empty($this->selection_string) && !empty($this->specialization))   $this->selection_string .= ' / ';
        if(!empty($this->specialization))    $this->selection_string .= Specialization::find($this->specialization)->toArray()[lang()];
        if(!empty($this->selection_string) && !empty($this->level))   $this->selection_string .= ' / ';
        if(!empty($this->level))             $this->selection_string .= $this->level;
        if(!empty($this->selection_string) && !empty($this->course))   $this->selection_string .= ' / ';
        if(!empty($this->course))            $this->selection_string .= Course::find($this->course)->toArray()[lang()];

        $this->file_information = [];
        $this->file_information['filename'] = $mat->filename;
        $this->file_information['filepath'] = $mat->filepath;
        $this->file_information['filetype'] = $mat->filetype;
        $this->file_information['filesize'] = $mat->filesize;
        //dd($this->selection_string);
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
