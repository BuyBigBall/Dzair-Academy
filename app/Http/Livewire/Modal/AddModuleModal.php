<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Course;

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
        $this->title = translate("Add specialization or faculty");
        $this->training_options = Training::select('*')->orderBy('symbol')->get()->toArray();
        $this->faculty_options  = Faculty::where('training_id', $value)->orderBy('id')->get()->toArray();
    }

    public function ShowAddModuleModal() {
        
        $this->training         = $training;
        $this->faculty          = $faculty;
        $this->specialization   = $specialization;
        $this->module          = $module;

        $this->en = "";
        $this->fr = "";
        $this->ar = "";

        $obj = null;
        if(!empty($obj))
        {
            $this->en = $obj->en;
            $this->fr = $obj->fr;
            $this->ar = $obj->ar;
        }
            
        $this->show = true;
    }
    public function save() {

        $fldArray = [
            'en' => $this->en,'fr' => $this->fr,'ar' => $this->ar,
        ];
        // {
           
        //     {
        //         $obj = new Specialization();
        //         $obj->faculty_id = $this->faculty;
        //         $obj->en = $this->en;
        //         $obj->fr = $this->fr;
        //         $obj->ar = $this->ar;
        //         $obj->created_by = Auth::id();
        //         $obj->updated_by = Auth::id();
        //         $obj->save();
        //     }
        // }

        $this->show = false;
    }
    public function doClose() {
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.modal.addmodule-modal');
    }
}
