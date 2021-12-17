<?php

namespace App\Http\Livewire\LaravelExamples;
use App\Models\User;

use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;
    public User $user;
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;
    
    protected $rules = [
        'user.name'     => 'max:40|min:3',
        'user.email'    => 'email:rfc,dns',
        'user.phone'    => 'max:10',
        'user.about'    => 'max:200',
        'user.location' => 'min:3',
        'user.photo'    => 'max:'.MAX_COURSE_UPLOAD_SIZE,  
    ];

    public function mount() { 
        $this->user = auth()->user();
    }

    public function save() {
        $this->validate();

        $this->user->save();
        $this->showSuccesNotification = true;
    }
    public function render()
    {
        //dd($this->user->course_id);
        return view('livewire.laravel-examples.user-profile');
    }
}
