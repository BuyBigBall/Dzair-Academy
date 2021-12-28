<?php

namespace App\Http\Livewire\LaravelExamples;
use App\Models\User;

use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;
    public User $user;
    public $user_email;
    public $user_phone;
    public $user_about;
    public $user_location;
    public $user_photo;
    public $user_edit_photo;

    public $showSuccesNotification  = false;

    public $showDemoNotification = false;
    
    protected $rules = [
        'user_name'     => 'max:40|min:3',
        'user_email'    => 'email:rfc,dns',
        'user_phone'    => 'numeric|digits_between:6,12',
        'user_about'    => 'max:200',
        'user_location' => 'min:3',
        'user_photo'    => 'max:'.MAX_COURSE_UPLOAD_SIZE,  
    ];
    protected $messages = [
        'user_name.min'     =>  ('The user name length cannot be less than 3 characters.'),
        'user_name.max'     =>  ('The user name length cannot be over than 40 characters.'),
        'user_email.email'  =>  ('The user email is invalid.'),
        'user_phone.digits_between'    =>  ('The user phone length must be between 6 and 12 digits.'),
        'user_phone.numeric'=>  ('The user phone can be allow only numeric.'),
        'user_about.max'    =>  ('The user description length cannot be over than 200 characters.'),
        'user_location.min' =>  ('The user univercity name length cannot be less than 3 characters.'),
        'user_photo.min'    =>  ('The user photo file size cannot be over than '.MAX_COURSE_UPLOAD_SIZE.' bytes.'),
    ];

    public function updatedUserPhoto($value) { 
        //dd($value);
        $this->validate([
            'user_photo' => 'max:'.MAX_COURSE_UPLOAD_SIZE.       // Max 1MB =1024K
                     '|mimes:'.env('ALLOW_PHOTO_EXTENSIONS')
        ]);
    }
    public function mount() { 
        $this->user = auth()->user();
        $this->user_email       = $this->user->email;
        $this->user_name        = $this->user->name;
        $this->user_email       = $this->user->email;
        $this->user_phone       = $this->user->phone;
        $this->user_about       = $this->user->about;
        $this->user_location    = $this->user->location;
        $this->user_photo       = $this->user->photo;
        //dd($this->user->photo);
    }

    public function save() {
        $this->validate();
        $this->user->email       = $this->user_email;
        $this->user->name        = $this->user_name;
        $this->user->email       = $this->user_email;
        $this->user->phone       = $this->user_phone;
        $this->user->about       = $this->user_about;
        $this->user->location    = $this->user_location;
        
        if($this->user_edit_photo)
        {
            
            //$store_result = $this->user_edit_photo->storePublicly( '/assets/img'); //to storage
            $store_result = $this->user_edit_photo->store('assets/img', 'public');   //to public

            $file_name = explode('/', $store_result);
            $file_name = $file_name[ count($file_name)-1];
            $file_path = $store_result;
            $this->user->photo = $file_path;
            $this->user->photo_agree = 0;
        }
        $this->user->save();
        $this->showSuccesNotification = true;
    }
    public function render()
    {
        //dd($this->user);
        return view('livewire.laravel-examples.user-profile');
    }
}
