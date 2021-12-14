<?php

namespace App\Http\Livewire\Modal;

// use LivewireUI\Modal\ModalComponent;
use Livewire\Component;

class AlertModal extends Component
{
    public $show;
    public $msg = 'Hello!';
    private $modal;
    protected $listeners = [
        'WireAlert' => 'showModal',
    ];
    public function mount() {
        $this->show = false;
    }
    
    public function showModal($msg,$redirect=null) {
        if(!empty($msg))        $this->msg=$msg;
        $this->doShow();
        if(!empty($redirect)) return Redirect($redirect);
    }
    public function doShow() {
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.modal.alert');
    }
}
