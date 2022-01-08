<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\Specialization;
use App\Models\Faculty;
use Illuminate\Http\Request;

class AddedFaculty extends Component
{
    public $new_faculties = [];
    protected $listeners = [
        'agree_faculty'  => 'agree_faculty',
        'delete_faculty'  => 'delete_faculty',
    ];

    public function mount()
    {
        $query = Faculty::where('status', '0')->orderBy('created_at', 'DESC');
        $this->new_faculties = $query->get();
    }
    public function agree_faculty($faculty_id)
    {
        Faculty::find($faculty_id)->update(['status'=>1]);
        $this->mount();
    }
    public function delete_faculty($faculty_id)
    {
        Faculty::find($faculty_id)->update(['status'=>-1]);
        $this->mount();
    }
    public function render()
    {
        return view('livewire.component.added-faculty');
    }
}
