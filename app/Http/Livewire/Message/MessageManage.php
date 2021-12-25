<?php

namespace App\Http\Livewire\Message;

use Livewire\Component;
use App\Models\User;

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
    public function sendMessage() { 
        
            $this->validate();
            $user = User::where('email', $this->email)->first();
            //dd($user);
            if($user){
                $mailRequest["recipent"] = [$this->email];
                $mailRequest["subject"] = sprintf( translate( "Dzair deliver a message from %s."), $user->name );
                $mailRequest["content"] = [ "content" => $this->content ];
                $mailRequest["template"] = "deliver";
                sendMail($mailRequest);
                // $this->showSuccesNotification = true;
                // $this->showFailureNotification = false;
                $this->emit('WireAlert', translate('Your message has been sent successfully.'), '');
            } else {
                $this->emit('WireAlert', translate('Your message sending has been failed.'), '');
                //$this->showFailureNotification = true;
            }
        $this->email = '';
        $this->content = '';
    }
    public function render()
    {
        return view('livewire.message.index');
    }
}
