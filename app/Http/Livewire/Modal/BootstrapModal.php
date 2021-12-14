<?php

namespace App\Http\Livewire\Modal;

// use LivewireUI\Modal\ModalComponent;
use Livewire\Component;

class BootstrapModal extends Component
{
    public $show;
    public $collection_id;

    private $modal;
    protected $listeners = [
        'showModal' => 'showModal',
    ];
    public function mount() {
        $this->show = false;
    }
    
    public function showModal() {
        $this->doShow();
    }
    public function doShow() {
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function doSomething() {
        // Do Something With Your Modal
        
        // Close Modal After Logic
        $this->doClose();
    }
    
    public function render()
    {
        return view('livewire.modal.bootstrap');
    }
}
