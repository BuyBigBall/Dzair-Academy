<?php

namespace App\Http\Livewire;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Module;
use Livewire\Component;
use Illuminate\Session\SessionManager;
use Illuminate\Http\Request;

class Search extends Component
{
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
    
    private $collection_id; //the id of collection into add the course file.

    public function __construct()
    {
        parent::__construct();
    }
    
    public function mount(Request $request)
    {
        if( !empty($request->collection_id))
            $this->collection_id = $request->collection_id;

        $this->training_options = Training::select('*')->orderBy('symbol')->get()->toArray();
        $this->level_options = \Config::get('constants.levels');;
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
            $this->module_options = Module::where('specialization_id', $value)->orderBy('id')->where('status', 1)->get()->toArray();
    }
    public function updatedLevel($value)
    {
        if(!empty($this->specialization))
            $this->module_options = Module::where('level', $value)->where('specialization_id', $this->specialization)->where('status', 1)->orderBy('id')->get()->toArray();
        else
            $this->module_options = Module::where('level', $value)->orderBy('id')->where('status', 1)->get()->toArray();
    }
public function updated($field, $newValue)
    {
    }

    public function render()
    {
        return view('livewire.search', ['collection_id' => $this->collection_id]);
    }
}
