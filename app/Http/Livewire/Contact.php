<?php

namespace App\Http\Livewire;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Module;
use Livewire\Component;
use Illuminate\Session\SessionManager;
use Illuminate\Http\Request;

class Contact extends Component
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function mount(Request $request)
    {
       
    }
    
    public function render()
    {
        // var myModal = new bootstrap.Modal(document.getElementById('myModal'), {  keyboard: false})
        // myModal.hide()
        return view('livewire.contact-script', []);
    }
}
