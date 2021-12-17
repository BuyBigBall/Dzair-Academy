<?php

namespace App\Http\Livewire\Message;

use Livewire\Component;

class MessageManage extends Component
{
    public $email;
    public $content;

    protected $rules = [
        'email'     => 'required|email',
        'content'   => 'required|max:200|min:3',
    ];
    protected $messages = [
        'email.required'  => ('The email cannot be empty.'),
        'content.required' => ('The content cannot be empty.'),
        'email.email' => ('The email is not correct'),
        'content.max' => ('The content could not over 200 characters.'),
        'content.min' => ('The content cannot be empty.'),
    ];
    public function mount($email=null) 
    {
        $this->email = $email;
    }
    public function sendMail() { 
        
            $this->validate();

            $mail_contents = [
                'recipent' => [$this->email],
                'content'  => [$this->content],
                'subject'  => '',
                'template' => ''
            ];

            $user = User::where('email', $this->email)->first();
            if($user){
                $this->notify(new ResetPassword($user->id));
                $this->showSuccesNotification = true;
                $this->showFailureNotification = false;
            } else {
                $this->showFailureNotification = true;
            }
    }
    public function render()
    {
        return view('livewire.message.index');
    }
}
