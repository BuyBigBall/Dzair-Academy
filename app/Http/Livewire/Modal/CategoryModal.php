<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Training;

class CategoryModal extends Component
{
    public  $show;

    public  $err_msg;
    public  $edit_id;
    protected $listeners = [
        'ShowCategoryModal' => 'doShow'        ,
    ];

    public function mount(Request $request) {
        $this->show = false;
    }

    public function doShow($path_level, $edit_id=0) {
        $this->edit_id = $edit_id;
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
