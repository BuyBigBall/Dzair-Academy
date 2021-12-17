<?php

namespace App\Http\Livewire\Message;

use Livewire\Component;

class MessageManage extends Component
{
    public $email;
    public $content;
    
    public function mount($email=null) 
    {
        $this->email = $email;
    }
    public function render()
    {
        return view('livewire.message.index');
    }
}
