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
    protected $rules = [
        'aboutus'=>'required',
        'qna'=>'required',
        'tutorial'=>'required',
    ];
    protected $messages = [
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
    }

    public function save(Request $request)
    {
        
        $validatedData = $this->validate();

        Setting::updateOrCreate([   'key' => 'aboutus', 'value'   => lang() ],
                               [ 'description' =>$this->aboutus ]);
        Setting::updateOrCreate([   'key' => 'qna', 'value'   => lang() ],
                               [ 'description' =>$this->qna ]);
        Setting::updateOrCreate([   'key' => 'tutorial', 'value'   => lang() ],
                               [ 'description' =>$this->tutorial ]);
                                
        $this->dispatchBrowserEvent('contentSaved', ['type' => 'success',  'message' => 'Setting saved Successfully!']);

    }
    public function render()
    {
        return view('livewire.pages', [] );
    }
}
