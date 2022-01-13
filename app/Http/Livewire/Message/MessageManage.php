<?php

namespace App\Http\Livewire\Message;

use Livewire\Component;
use App\Models\User;

class MessageManage extends Component
{
    public $email;
    public $username;
    public $content;

    protected $rules = [
        'username'     => 'required|min:3|max:40',
        'content'   => 'required|max:200|min:3',
    ];
    protected $messages = [
        'content.required' => ('The content cannot be empty.'),
        'email.email' => ('The email is not correct'),
        'content.max' => ('The content could not be over 200 characters.'),
        'content.min' => ('The content cannot be less 3 characters.'),
        'username.required'  => ('The email cannot be empty.'),
        'username.max'  => ('The user name could not be over 40 characters.'),
        'username.min'  => ('The user name cannot be less 3 characters.'),
    ];
    public function mount($username=null) 
    {
        $this->username = urldecode( $username );
    }
    public function sendMessage() { 
        
            $this->validate();
            $query = User::whereRaw("UPPER(name) LIKE '%" . strtoupper($this->username) . "%'" );
            //dd($query->toSql());
            $user = $query->first();
            
            //dd($user);
            if($user){
                $this->email = $user->email;
                $mailRequest["recipent"] = [$this->email];
                $mailRequest["subject"] = sprintf( translate( "Dzair deliver a message from %s."), $user->name );
                $mailRequest["content"] = [ "content" => $this->content ];
                $mailRequest["template"] = "deliver";
                sendMail($mailRequest);
                // $this->showSuccesNotification = true;
                // $this->showFailureNotification = false;
                $this->emit('WireAlert', translate('Your message has been sent successfully.'), '');
            } else {
                $this->emit('WireAlert', translate('could not be found a user to send the message'), '');
                //$this->showFailureNotification = true;
            }
        $this->email = '';
        $this->username = '';
        $this->content = '';
    }
    public function render()
    {
        return view('livewire.message.index');
    }
}
