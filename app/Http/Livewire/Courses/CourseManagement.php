<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Course;

class CourseManagement extends Component
{
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
    public function mount()
    {
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
        $this->list_items = 
        $this->faculty_options = Faculty::where('training_id', $value)->orderBy('id')->get()->toArray();
        $this->list_title = translate('All Faculties');
        $this->list_of = Training::where('id', $value)->first()->toArray()[lang()];
    }
    public function updatedFaculty($value)
    {
        if($value==0) return $this->updatedTraining($this->training);
        $this->list_items = 
        $this->specialization_options = Specialization::where('faculty_id', $value)->orderBy('id')->get()->toArray();
        $this->list_title = translate('All Specializations');
        $this->list_of = translate('All Courses');
        $this->list_of = Faculty::where('id', $value)->first()->toArray()[lang()];
    }
    public function updatedSpecialization($value)
    {
        if($value==0) return $this->updatedFaculty($this->faculty);
        $this->list_items = 
        $this->course_options = Course::where('specialization_id', $value)->orderBy('id')->get()->toArray();
        $this->list_title = translate('All Courses');
        $this->list_of = translate('All Courses');
        $this->list_of = Specialization::where('id', $value)->first()->toArray()[lang()];
    }

    public function updatedCourse($value)
    {
        if($value==0) return $this->updatedSpecialization($this->specialization);
        // $this->list_items = 
        // $this->course_options = Course::where('specialization_id', $value)->orderBy('id')->get()->toArray();
        // $this->list_title = translate('All Courses');
        // $this->list_of = translate('All Courses');
        // $this->list_of = Specialization::where('id', $value)->first()->toArray()[lang()];
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
