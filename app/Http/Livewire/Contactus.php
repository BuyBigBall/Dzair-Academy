<?php

namespace App\Http\Livewire;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Module;
use Livewire\Component;
use Illuminate\Session\SessionManager;
use Illuminate\Http\Request;

class Contactus extends Component
{
    public $fullname;
    public $email;
    public $subject;
    public $msg;

    protected $rules = [
        'email'     =>'required|email',
        'subject'   =>'required',
        'msg'       =>'required',
    ];
    protected $messages = [
        'email.required'    => ('The Email cannot be empty.'),
        'subject.required'  => ('The Subject cannot be empty.'),
        'msg.required'      => ('The Message Content cannot be empty.'),
    ];

    public function __construct()
    {
        parent::__construct();
    }
    
    public function mount(Request $request)
    {
       
    }

    public function sendmessage(Request $request)
    {
        $validatedData = $this->validate();

        $mailRequest = [];
        $client_info = '';
        $client_info .= '<br>' . sprintf( 'the client\'s email address is %s', $this->email);
        if( !empty($this->fullname) )
        {
            $client_info .= '<br>' . sprintf( ' from %s', $this->fullname);
        }

        $mailRequest["recipent"]    = [env('MAIL_TO_ADDRESS')];
        $mailRequest["subject"]     = $this->subject;           // $this->fullname
        $mailRequest["content"]     = [ "content" => $this->msg . $client_info ];
        $mailRequest["template"]    = "contactus";

        sendMail($mailRequest);
        
        $this->fullname = '';
        $this->email    = '';
        $this->subject  = '';
        $this->msg      = '';
        $this->emit('WireAlert', translate('The message has been send to the manager successfully.'), '');
    }

    public function render()
    {
        return view('livewire.contactus', []);
    }
}
