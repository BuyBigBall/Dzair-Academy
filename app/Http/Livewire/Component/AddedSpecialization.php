<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\Specialization;
use Illuminate\Http\Request;

class AddedSpecialization extends Component
{
    public $new_specs = [];
    protected $listeners = [
        'agree_specialization'  => 'agree_specialization',
        'delete_specialization'  => 'delete_specialization',
    ];

    public function mount()
    {
        $query = Specialization::where('status', '0')->orderBy('created_at', 'DESC');
        $this->new_specs = $query->get();
    }
    public function agree_specialization($spec_id)
    {
        Specialization::find($spec_id)->update(['status'=>1]);
        $this->mount();
    }
    public function delete_specialization($spec_id)
    {
        Specialization::find($spec_id)->update(['status'=>-1]);
        $this->mount();
    }
    public function render()
    {
        return view('livewire.component.added-specialization');
    }
}
