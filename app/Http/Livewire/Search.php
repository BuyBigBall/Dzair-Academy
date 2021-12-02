<?php

namespace App\Http\Livewire;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Course;
use Livewire\Component;
use Illuminate\Session\SessionManager;

class Search extends Component
{
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
    
    public function mount()
    {
        $this->training_options = Training::select('*')->orderBy('symbol')->get()->toArray();
        $this->level_options = \Config::get('constants.levels');;
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
    public function updated($field, $newValue)
    {
    }

    public function render()
    {
        return view('livewire.search');
    }
}