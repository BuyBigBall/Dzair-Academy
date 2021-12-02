<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;

class CourseDetail extends Component
{
    public $course_id;
    public $title;
    public $category_string;
    public $description;
    public $training;
    public $faculty;
    public $specialization;
    public $level;

    public function mount($id) {
        //$existingUser = User::find($id);
        $this->course_id = intval($id);
    }

    public function render()
    {
        $this->title = 'This is a sample Title';
        $this->category_string = 'Excercise,Exam,Course';
        $this->description = nl2br("Hello\nThis is a description");
        $this->training = 'training';
        $this->faculty = 'faculty';
        $this->specialization = 'specialization';
        $this->level = 'level';
    
        return view('livewire.courses.course-download');
    }
}
