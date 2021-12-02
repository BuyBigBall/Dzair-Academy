<?php

namespace App\Http\Livewire\Message;

use Livewire\Component;

class MessageManage extends Component
{
    public function render()
    {
        return view('livewire.message.index');
    }
    public function inbox()
    {
        return view('livewire.message.inbox');
    }
    public function outbox()
    {
        return view('livewire.message.outbox');
    }
}
