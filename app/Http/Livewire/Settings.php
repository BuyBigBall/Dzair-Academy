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

    // public $adv1content;
    // public $adv2content;
    // public $adv3content;

    // public $ads1_file;
    // public $ads1_link;
    // public $ads2_file;
    // public $ads2_link;
    // public $ads3_file;
    // public $ads3_link;
    public $email;
    public $password;

    public $ads1contents;
    public $ads2contents;
    public $ads3contents;
    public $ads1contents_changed;

    public function getAdvertise()
    {
        $objects = Setting::where("key", 'ads1')->get();
        foreach($objects as $row)
        {
            if( empty($this->ads1contents))     $this->ads1contents = $row->description;
            if( $row->value==lang() )   { $this->ads1contents = $row->description; break;}
        }
        $objects = Setting::where( "key", 'ads2')->get();
        foreach($objects as $row)
        {
            if( empty($this->ads2contents))     $this->ads2contents = $row->description;
            if( $row->value==lang() )   { $this->ads2contents = $row->description; break;}
        }
        $objects = Setting::where("key", 'ads3')->get();
        foreach($objects as $row)
        {
            if( empty($this->ads3contents))     $this->ads3contents = $row->description;
            if( $row->value==lang() )   { $this->ads3contents = $row->description; break;}
        }
        if(empty($this->ads1contents))  $this->ads1contents = '<img src="'.asset('uploads/' . env('ADVERTISE1_URL')).'"  class="w-100" />';
        if(empty($this->ads2contents))  $this->ads2contents = '<img src="'.asset('uploads/' . env('ADVERTISE2_URL')).'"  class="w-100" />';
        if(empty($this->ads3contents))  $this->ads3contents = '<img src="'.asset('uploads/' . env('ADVERTISE3_URL')).'"  class="w-100" />';
    }

    public function __construct()
    {
        $this->getAdvertise();
        
        parent::__construct();
    }

    protected $rules = [
        'toemail'     => 'required',
        'email'     => 'required',
        'password'  => 'required',
        // 'ads1_link' => 'required',
        // 'ads2_link' => 'required',
        // 'ads3_link' => 'required',

        # required no need
        // 'ads1_file'  => 'max:'.MAX_COURSE_UPLOAD_SIZE,     // max 1M=1024K
        // 'ads2_file'  => 'max:'.MAX_COURSE_UPLOAD_SIZE,     // max 1M=1024K
        // 'ads3_file'  => 'max:'.MAX_COURSE_UPLOAD_SIZE,     // max 1M=1024K
    ];
    protected $messages = [
        'toemail.required'   => ('The administrator email cannot be empty.'),
        'password.required'  => ('The password cannot be empty.'),

        // 'ads1_link.required' => ('The link address for advertise 1 cannot be empty.'),
        // 'ads2_link.required' => ('The link address for advertise 2 cannot be empty.'),
        // 'ads3_link.required' => ('The link address for advertise 3 cannot be empty.'),
        # no need
        // 'ads1_file.required' => ('The file for advertise 1 cannot be empty.'),
        // 'ads2_file.required' => ('The file for advertise 2 cannot be empty.'),
        // 'ads3_file.required' => ('The file for advertise 3 cannot be empty.'),
    ];
    public function index(Request $request)
    {
        
    }

    public function mount(Request $request, $flag=null)
    {
        $this->toemail = env('MAIL_TO_ADDRESS');
        $this->email = env('MAIL_USERNAME');
        $this->password = env('MAIL_PASSWORD');
        
        $this->ads1contents_changed = $this->ads1contents;
        // $this->ads2contents_changed = $this->ads2contents;
        // $this->ads3contents_changed = $this->ads3contents;

        // $this->ads1_file = env('ADVERTISE1_URL');
        // $this->ads1_link = env('ADVERTISE1_LINK');
        // $this->ads2_file = env('ADVERTISE2_URL');
        // $this->ads2_link = env('ADVERTISE2_LINK');
        // $this->ads3_file = env('ADVERTISE3_URL');
        // $this->ads3_link = env('ADVERTISE3_LINK');
    }
    // public function updatedAds1File($value)
    // {
    //     $this->validate([
    //         'ads1_file' => 'max:'.MAX_COURSE_UPLOAD_SIZE.       // Max 1MB =1024K
    //                  '|mimes:'.env('ALLOW_ADS_EXTENSIONS')
    //     ]);
    // }
    // public function updatedAds2File($value)
    // {

    //     $this->validate([
    //         'ads2_file' => 'max:'.MAX_COURSE_UPLOAD_SIZE.       // Max 1MB =1024K
    //                  '|mimes:'.env('ALLOW_ADS_EXTENSIONS')
    //     ]);
    // }
   
    // public function updatedAds3File($value)
    // {
    //     $this->validate([
    //         'ads3_file' => 'max:'.MAX_COURSE_UPLOAD_SIZE.       // Max 1MB =1024K
    //                  '|mimes:'.env('ALLOW_ADS_EXTENSIONS')
    //     ]);
    // }
    public function save(Request $request)
    {
        
        $validatedData = $this->validate();

        # setEnv
        setEnv('MAIL_USERNAME',   $this->email );
        setEnv('MAIL_PASSWORD',   $this->password );
        setEnv('MAIL_TO_ADDRESS',   $this->toemail );
        
        // setEnv('ADVERTISE1_LINK', $this->ads1_link );
        // setEnv('ADVERTISE2_LINK', $this->ads2_link );
        // setEnv('ADVERTISE3_LINK', $this->ads3_link );

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
