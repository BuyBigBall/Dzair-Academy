<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;

class ContactModal extends Component
{
    public $show;
    public $msg = 'Hello!';
    private $modal;
    protected $listeners = [
        'showContactus' => 'showContactus',
    ];
    public function mount() {
        $this->show = false;
        
    }
    public function showContactus()
    {
        $this->show = true;
        dd($this->show);
    }
    public function hideContactus()
    {
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.modal.contactus');
    }
}