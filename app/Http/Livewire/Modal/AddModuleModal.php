<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;

class AddModuleModal extends Component
{
    public  $show;

    public  $err_msg;
    
    public  $en;
    public  $fr;
    public  $ar;
    public  $title;

    public  $training;       
    public  $faculty;        
    public  $specialization; 
    public  $level;   
    public  $module;         

    public  $training_options = [];
    public  $faculty_options = [];
    public  $specialization_options = [];
    public  $level_options = [];

    protected $listeners = [
        'ShowAddModuleModal' => 'ShowAddModuleModal',
    ];

    public function mount(Request $request) {
        
        $this->show = false;
        $this->title = translate("Add module");
        $this->training_options = Training::where('status', '>=', '0')->select('*')->orderBy('symbol')->get()->toArray();
        $this->level_options = \Config::get('constants.levels');
    }

    public function updatedTraining($value)
    {
        $this->faculty_options = Faculty::where('training_id', $value)->where('status', 1)->orderBy('id')->get()->toArray();
    }
    public function updatedFaculty($value)
    {
        $this->specialization_options = Specialization::where('faculty_id', $value)->where('status', 1)->orderBy('id')->get()->toArray();
    }
    // public function updatedSpecialization($value)
    // {

    // }

    public function ShowAddModuleModal() {
        
        $this->en = "";
        $this->fr = "";
        $this->ar = "";

        $this->show = true;
    }
    public function save() {

        $fldArray = [
            'en' => $this->en,'fr' => $this->fr,'ar' => $this->ar,
        ];

        // dd($this);
        if( !empty($this->training) && !empty($this->faculty) && !empty($this->specialization) && !empty($this->level))
        {
            $obj = new Module();    // this is the module
            $obj->specialization_id = $this->specialization;
            $obj->level = $this->level;
            $obj->en = $this->en;
            $obj->fr = $this->fr;
            $obj->ar = $this->ar;
            $obj->created_by = Auth::id();
            $obj->updated_by = Auth::id();
            $obj->save();
            $this->show = false;
        }

    }
    public function doClose() {
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.modal.add-module-modal');
    }
}
