<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use App\Http\Livewire\Modal;

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
        $mailRequest["subject"] = sprintf( translate( "Dzair deliver's client send a message %s. <br> email address is %s"), $this->fullname, $this->email );
        $mailRequest["content"] = [ "content" => $this->msg ];
        $mailRequest["template"] = "contactus";
        sendMail($mailRequest);
        $this->show = false;
    }
    public function showContactus()
    {
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