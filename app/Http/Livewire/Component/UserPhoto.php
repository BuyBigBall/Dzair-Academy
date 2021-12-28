<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;

class UserPhoto extends Component
{
    public $newPhoto_users = [];
    protected $listeners = [
        'agree_photo' => 'agree_photo',
        'reject_photo' => 'reject_photo',
    ];

    public function mount()
    {
        $query = User::where('photo_agree', '0')->where('photo', '!=', '');
        $this->newPhoto_users = $query->get();
    }
    public function agree_photo($user_id)
    {
        User::find($user_id)->update(['photo_agree'=>1]);
        $this->mount();
    }
    public function reject_photo($user_id)
    {
        User::find($user_id)->update(['photo'=>'']);
        $this->mount();
    }
    public function render()
    {
        return view('livewire.component.user-photo');
    }
}
