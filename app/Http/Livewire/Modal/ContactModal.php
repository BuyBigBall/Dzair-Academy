<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use App\Http\Livewire\Modal;
use Illuminate\Support\Facades\Auth;

class ContactModal extends Component
{
    public $show;
    public $msg = '';
    public $fullname = '';
    public $email = '';

    protected $listeners = [
        'showContactus' => 'showContactus',
        'doClose'       => 'doClose',
        'save'          => 'save'
    ];
    public function mount() {
        $this->show = false;
    }
    public function save() {
        $mailRequest["recipent"] = [env('MAIL_TO_ADDRESS')];
        $mailRequest["subject"] = sprintf( translate( "Dzair Academy has been received the message from the client %s."), $this->fullname );
        $mailRequest["content"] = [ "content" => $this->msg . '<br>' . sprintf( 'the client\'s email address is %s', $this->email) ];
        $mailRequest["template"] = "contactus";
        sendMail($mailRequest);
        $this->show = false;
    }
    public function showContactus()
    {
        if( !empty(Auth::id()))
        {
            $this->fullname = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
        $this->show = true;
    }
    public function doClose()
    {
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.modal.contactus');
    }
}