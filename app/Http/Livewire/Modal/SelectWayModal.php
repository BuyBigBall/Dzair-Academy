<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Module;

class SelectWayModal extends Component
{
    public  $show;
    public  $err_msg;
    public  $way;
  
    protected $listeners = [
        'SelectWayModal' => 'SelectWayModal',
    ];

    public function mount(Request $request) {
        $this->show = false;
        $this->way  = 'add-module';
    }

    public function SelectWayModal() {
        $this->show = true;
    }
    public function save() {
        //dd($this->way);
        if($this->way  == 'add-module')
            $this->emit('ShowAddModuleModal', '');
        else
            $this->emit('ShowSpecializationModal', '');
        $this->show = false;
    }
    public function doClose() {
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.modal.select-way-modal');
    }
}
