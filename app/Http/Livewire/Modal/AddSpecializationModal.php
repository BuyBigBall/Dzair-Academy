<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Course;

class AddSpecializationModal extends Component
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

    protected $listeners = [
        'ShowSpecializationModal' => 'ShowSpecializationModal',
    ];

    public function mount(Request $request) {
        $this->show = false;
        $this->title = translate("Add specialization or faculty");
        $this->training_options = Training::select('*')->orderBy('symbol')->get()->toArray();
    }

    public function updatedTraining($value)
    {
        $this->faculty_options = Faculty::where('training_id', $value)->orderBy('id')->get()->toArray();
        if( !!empty($value) || !is_numeric($value)) $this->title = translate("Add specialization or faculty");
        else                 $this->title = translate("Add faculty");
    }

    public function updatedFaculty($value)
    {
        if( !!empty($value) || !is_numeric($value)) $this->title = translate("Add faculty");
        else                 $this->title = translate("Add specialization");
    }

    public function ShowSpecializationModal() {
        
        $this->en = "";
        $this->fr = "";
        $this->ar = "";

        $this->show = true;
    }

    public function save() {

        $fldArray = [
            'en' => $this->en,'fr' => $this->fr,'ar' => $this->ar,
        ];
        if( !empty($this->training) && is_numeric($this->training))
        {
            if( !empty($this->faculty) && is_numeric($this->faculty))
            {
                $obj = new Specialization();
                $obj->faculty_id = $this->faculty;
                $obj->en = $this->en;
                $obj->fr = $this->fr;
                $obj->ar = $this->ar;
                $obj->created_by = Auth::id();
                $obj->updated_by = Auth::id();
                $obj->save();
            }
            else
            {
                $obj = new Faculty();
                $obj->training_id = $this->training;
                $obj->en = $this->en;
                $obj->fr = $this->fr;
                $obj->ar = $this->ar;
                $obj->created_by = Auth::id();
                $obj->updated_by = Auth::id();
                $obj->save();
            }
        }

        $this->en = "";
        $this->fr = "";
        $this->ar = "";

        $this->show = false;
    }
    public function doClose() {
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.modal.addspec-modal');
    }
}
