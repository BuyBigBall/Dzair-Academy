<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Http\Request;

class AddedModule extends Component
{
    public $new_modules = [];
    protected $listeners = [
        'agree_module'  => 'agree_module',
        'delete_module'  => 'delete_module',
    ];

    public function mount()
    {
        $query = Course::where('status', '0')->orderBy('created_at', 'DESC');
        $this->new_modules = $query->get();
    }
    public function agree_module($module_id)
    {
        Course::find($module_id)->update(['status'=>1]);
        $this->mount();
    }
    public function delete_module($module_id)
    {
        Course::find($module_id)->update(['status'=>-1]);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.component.added-module');
    }
}
