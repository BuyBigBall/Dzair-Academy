<?php

namespace App\Http\Livewire\Message;

use Livewire\Component;

class MessageOutbox extends Component
{
    public function render()
    {
        return view('livewire.message.outbox');
    }
   
}
