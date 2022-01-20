<?php

namespace App\Http\Livewire;
use App\Models\Setting;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class Settings extends Component
{
    use WithFileUploads;

    public $email;
    public $password;

    public $ads1contents;
    public $ads2contents;
    public $ads3contents;

    // public function getAdvertise()
    // {
    //     $objects = Setting::where("key", 'ads1')->get();
    //     foreach($objects as $row)
    //     {
    //         if( empty($this->ads1contents))     $this->ads1contents = $row->description;
    //         if( $row->value==lang() )   { $this->ads1contents = $row->description; break;}
    //     }
    //     $objects = Setting::where( "key", 'ads2')->get();
    //     foreach($objects as $row)
    //     {
    //         if( empty($this->ads2contents))     $this->ads2contents = $row->description;
    //         if( $row->value==lang() )   { $this->ads2contents = $row->description; break;}
    //     }
    //     $objects = Setting::where("key", 'ads3')->get();
    //     foreach($objects as $row)
    //     {
    //         if( empty($this->ads3contents))     $this->ads3contents = $row->description;
    //         if( $row->value==lang() )   { $this->ads3contents = $row->description; break;}
    //     }
    //     if(empty($this->ads1contents))  $this->ads1contents = '<img src="'.asset('uploads/' . env('ADVERTISE1_URL')).'"  class="w-100" />';
    //     if(empty($this->ads2contents))  $this->ads2contents = '<img src="'.asset('uploads/' . env('ADVERTISE2_URL')).'"  class="w-100" />';
    //     if(empty($this->ads3contents))  $this->ads3contents = '<img src="'.asset('uploads/' . env('ADVERTISE3_URL')).'"  class="w-100" />';
    // }

    public function __construct()
    {
        
        parent::__construct();
    }

    protected $rules = [
        'toemail'     => 'required',
        'email'     => 'required',
        'password'  => 'required',
    ];
    protected $messages = [
        'toemail.required'   => ('The administrator email cannot be empty.'),
        'password.required'  => ('The password cannot be empty.'),
    ];

    public function mount(Request $request, $flag=null)
    {
        $this->toemail = env('MAIL_TO_ADDRESS');
        $this->email = env('MAIL_USERNAME');
        $this->password = env('MAIL_PASSWORD');
        
        $this->ads1contents = topAdvertise();
        $this->ads2contents = leftAdvertise();
        $this->ads3contents = rightAdvertise();
    }

    public function save(Request $request)
    {
        
        $validatedData = $this->validate();

        # setEnv
        setEnv('MAIL_USERNAME',   $this->email );
        setEnv('MAIL_PASSWORD',   $this->password );
        setEnv('MAIL_TO_ADDRESS',   $this->toemail );
        
        Setting::updateOrCreate([   'key' => 'ads1', 'value'   => lang() ],
                               [ 'description' =>$this->ads1contents ]);
        Setting::updateOrCreate([   'key' => 'ads2', 'value'   => lang() ],
                               [ 'description' =>$this->ads2contents ]);
        Setting::updateOrCreate([   'key' => 'ads3', 'value'   => lang() ],
                               [ 'description' =>$this->ads3contents ]);
                                
        $this->dispatchBrowserEvent('contentSaved', ['type' => 'success',  'message' => 'Setting saved Successfully!']);

    }
    public function render()
    {
        return view('livewire.settings', [] );
    }
}
