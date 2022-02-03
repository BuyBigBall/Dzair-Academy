<?php

namespace App\Http\Livewire;
use App\Models\Setting;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Session\SessionManager;

class Pages extends Component
{
    use WithFileUploads;

    public $aboutus;
    public $qna;
    public $tutorial;
    public $privacy;
    
    protected $rules = [
        // 'aboutus'=>'required',
        // 'qna'=>'required',
        // 'tutorial'=>'required',
    ];
    protected $messages = [
        // 'aboutus.required'   => ('The Aboutus content cannot be empty.'),
        // 'qna.required'  => ('The QnA content cannot be empty.'),
        // 'tutorial.required'  => ('The Tutorial Content cannot be empty.'),
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function mount(Request $request, $flag=null)
    {
        $this->aboutus  = getPageHtml('aboutus');
        $this->qna      = getPageHtml('qna');
        $this->tutorial = getPageHtml('tutorial');
        $this->privacy  = getPageHtml('privacy');
    }

    public function save(Request $request)
    {
        
       //  $validatedData = $this->validate();

        Setting::updateOrCreate([   'key' => 'aboutus', 'value'   => lang() ],
                               [ 'description' =>$this->aboutus ]);
        Setting::updateOrCreate([   'key' => 'qna', 'value'   => lang() ],
                               [ 'description' =>$this->qna ]);
        Setting::updateOrCreate([   'key' => 'tutorial', 'value'   => lang() ],
                               [ 'description' =>$this->tutorial ]);
        Setting::updateOrCreate([   'key' => 'privacy', 'value'   => lang() ],
                               [ 'description' =>$this->privacy ]);
                                
        $this->dispatchBrowserEvent('contentSaved', ['type' => 'success',  'message' => 'Setting saved Successfully!']);

    }

    public function render()
    {
        return view('livewire.pages', [] );
    }
}
