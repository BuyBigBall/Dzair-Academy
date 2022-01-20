<?php

namespace App\Http\Livewire;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Module;
use App\Models\Setting;
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

    
    public $ads1contents;
    public $ads2contents;
    public $ads3contents;

    public function getAdvertise()
    {
        $objects = Setting::where("key", 'ads1')->get();
        foreach($objects as $row)
        {
            if( empty($this->ads1contents))     $this->ads1contents = $row->description;
            if( $row->value==lang() )   { $this->ads1contents = $row->description; break;}
        }
        $objects = Setting::where( "key", 'ads2')->get();
        foreach($objects as $row)
        {
            if( empty($this->ads2contents))     $this->ads2contents = $row->description;
            if( $row->value==lang() )   { $this->ads2contents = $row->description; break;}
        }
        $objects = Setting::where("key", 'ads3')->get();
        foreach($objects as $row)
        {
            if( empty($this->ads3contents))     $this->ads3contents = $row->description;
            if( $row->value==lang() )   { $this->ads3contents = $row->description; break;}
        }
        if(empty($this->ads1contents))  $this->ads1contents = '<img src="'.asset('uploads/' . env('ADVERTISE1_URL')).'"  class="w-100" />';
        if(empty($this->ads2contents))  $this->ads2contents = '<img src="'.asset('uploads/' . env('ADVERTISE2_URL')).'"  class="w-100" />';
        if(empty($this->ads3contents))  $this->ads3contents = '<img src="'.asset('uploads/' . env('ADVERTISE3_URL')).'"  class="w-100" />';
    }

    public function __construct()
    {
        $this->getAdvertise();
        
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
