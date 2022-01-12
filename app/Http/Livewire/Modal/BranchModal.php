<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;

class BranchModal extends Component
{
    public  $show;

    public  $err_msg;
    public  $edit_id;
    public  $en;
    public  $fr;
    public  $ar;
    public  $path_level;
    public  $title;

    public  $training;       
    public  $faculty;        
    public  $specialization; 
    public  $module;         


    protected $listeners = [
        'ShowBranchModal' => 'doShow',
    ];

    public function mount(Request $request) {
        $this->show = false;
        $this->title = translate("Branch Info");
    }

    public function doShow($path_level, $training,$faculty,$specialization,$module, $edit_id=0) {
        $this->edit_id          = $edit_id;
        $this->path_level       = $path_level;
        $this->training         = $training;
        $this->faculty          = $faculty;
        $this->specialization   = $specialization;
        $this->module          = $module;

        if($this->path_level==5)
        {
            if( !! empty($this->edit_id))
            {
                return redirect( route("course-material") );
            }
        }
        $this->en = "";
        $this->fr = "";
        $this->ar = "";

        $obj = null;
        if($this->path_level==1)
        {
            $this->title = translate("Training Info");
            $obj = Training::find( $this->edit_id );
        }
        if($this->path_level==2)
        {
            $this->title = translate("Faculty Info");
            $obj = Faculty::find( $this->edit_id );
        }
        if($this->path_level==3)
        {
            $this->title = translate("Specialization Info");
            $obj = Specialization::find( $this->edit_id );
        }
        if($this->path_level==4)
        {
            $this->title = translate("Module Info");
            $obj = Module::find( $this->edit_id );
        }
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
        if(!empty($this->edit_id))
        {
            if($this->path_level==1)
            {
                $obj = Training::find( $this->edit_id )->update($fldArray);
            }
            if($this->path_level==2)
            {
                $obj = Faculty::find( $this->edit_id )->update($fldArray);
            }
            if($this->path_level==3)
            {
                $obj = Specialization::find( $this->edit_id )->update($fldArray);
            }
            if($this->path_level==4)
            {
                $obj = Module::find( $this->edit_id )->update($fldArray);
            }        
        }
        else
        {
           
            if($this->path_level==3)
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
            if($this->path_level==4)
            {
                $obj = new Module();
                $obj->specialization_id = $this->specialization;
                $obj->en = $this->en;
                $obj->fr = $this->fr;
                $obj->ar = $this->ar;
                $obj->created_by = Auth::id();
                $obj->updated_by = Auth::id();
                $obj->save();
            }        
        }

        $this->emit("refreshBranchList", null);
        $this->show = false;
    }
    public function doClose() {
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.modal.branch-modal');
    }
}
