<?php

namespace App\Http\Livewire\Message;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

class MessageManage extends Component
{

   // public Post $post;
    public $selusername;        //model
    public $seluserphoto;        //model
    public $search;             //model

    public $userlist;
    public $selected_user;
    public $chathist;
    
    public function mount(Request $request) 
    {
        $this->chathist = [];
        $this->RefreshContent();
    }

    public function updatedSearch($word) 
    {
        $this->search       = $word;
        $this->chathist     = [];
        $this->RefreshContent($word);
    }
    public function SelectChatUser($selUserId) 
    {
        $this->selected_user    = User::find($selUserId);
        $this->RefreshContent();
    }

    public function SendChatMessage($chatmessage) 
    {
        // dd($chatmessage);
        if( !! empty($this->selected_user) )
        {
            $this->emit('WireAlert', translate('The message could not send. please select the opponent user.'), '');
        }
        else
        {
            $to_id = $this->selected_user->id;
            $from_id = Auth::id();
            Message::create([
                'from'          => $from_id, 
                'to'            => $to_id,
                'title'         => '',
                'content'       => $chatmessage,
                'attached'      => '',
                'status'        => 1
            ]);
        }
        
        $this->RefreshContent();
    }

    public function RefreshContent($word=null)
    {
        $query = Message::select('from', 'to')
            ->distinct()
            ->where('from', Auth::id())
            ->orWhere('to', Auth::id());

        //dd($query->toSql());
        //dd($word);
        $this->userlist = [];
        foreach( $query->get()  as $row)
        {
            $opp = null;
            $opp_id = 0;
            if($row->from==Auth::id())
            {
                $opp    = $row->receiver;
                $opp_id = $row->receiver->id;
            }
            else
            {
                $opp    = $row->sender;
                $opp_id = $row->sender->id;
            }
            //dd($opp->name);
            if( !empty($word) )
            {
                //dd(stripos($word, $opp->name));
                if(stripos($opp->name, $word) === false)
                {
                    $opp = null;
                }
            }

            if($opp!=null)         $this->userlist[$opp_id] = $opp;
        }
        //  dd($this->userlist);
        $this->chathist = [];
        if(!empty($this->selected_user))
        {
            $opp_id = $this->selected_user->id;
            $query = Message::where(['from' => Auth::id(), 'to'=>$this->selected_user->id])
            ->orWhere(
                function($query1) use ($opp_id) {
                    $query1->where( ['to' => Auth::id(), 'from'=>$opp_id] );
                   }
                )
            ->orderBy('id', 'ASC');
            $this->chathist = $query->get();        
        }
    }
    public function render()
    {
        $this->selusername  = !!empty($this->selected_user) ? 'Select User' : $this->selected_user->name;
        $this->seluserphoto = userphoto(!!empty($this->selected_user) ? '' : $this->selected_user->photo);
        
        return view('livewire.message.manage');
    }
}
