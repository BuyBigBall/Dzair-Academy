<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Course;

class CategoryModal extends Component
{
    public  $show;

    public  $err_msg;
    public  $edit_id;
    public  $en;
    public  $fr;
    public  $ar;
    public  $path_level;

    protected $listeners = [
        'ShowCategoryModal' => 'doShow'        ,
    ];

    public function mount(Request $request) {
        $this->show = false;
    }

    public function doShow($path_level, $edit_id=0) {
        $this->edit_id = $edit_id;
        $this->path_level = $path_level;

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
            $obj = Training::find( $this->edit_id );
        }
        if($this->path_level==2)
        {
            $obj = Faculty::find( $this->edit_id );
        }
        if($this->path_level==3)
        {
            $obj = Specialization::find( $this->edit_id );
        }
        if($this->path_level==4)
        {
            $obj = Course::find( $this->edit_id );
        }
        if(!empty($obj))
        {
            $this->en = $obj->en;
            $this->fr = $obj->fr;
            $this->ar = $obj->ar;
        }
            
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.modal.category-modal');
    }
}
