<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public $word;
    protected $listeners = ['welcome_shearch' => 'welcome_shearch'];

    public function welcome_shearch()
    {
        if(!empty($this->search_word))
        {
            //dd($this->search_word);
        }
    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
