<?php

namespace App\Http\Livewire;
use App\Models\Training;
use App\Models\Faculty;
use App\Models\Specialization;
use App\Models\Module;
use App\Models\Course;
use Livewire\Component;
use Illuminate\Session\SessionManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Settings extends Component
{
    use WithFileUploads;

    public $ads1_file;
    public $ads1_link;
    public $ads2_file;
    public $ads2_link;
    public $ads3_file;
    public $ads3_link;
    public $email;
    public $password;

    public function __construct()
    {
        parent::__construct();
    }

    protected $rules = [
        'email'     => 'required',
        'password'  => 'required',
        'ads1_link' => 'required',
        'ads2_link' => 'required',
        'ads3_link' => 'required',

        # required no need
        'ads1_file'  => 'max:'.MAX_COURSE_UPLOAD_SIZE,     // max 1M=1024K
        'ads2_file'  => 'max:'.MAX_COURSE_UPLOAD_SIZE,     // max 1M=1024K
        'ads3_file'  => 'max:'.MAX_COURSE_UPLOAD_SIZE,     // max 1M=1024K
    ];
    protected $messages = [
        'password.required'  => ('The password cannot be empty.'),
        'ads1_link.required' => ('The link address for advertise 1 cannot be empty.'),
        'ads2_link.required' => ('The link address for advertise 2 cannot be empty.'),
        'ads3_link.required' => ('The link address for advertise 3 cannot be empty.'),
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
        $this->email = env('MAIL_USERNAME');
        $this->password = env('MAIL_PASSWORD');
        $this->ads1_file = env('ADVERTISE1_URL');
        $this->ads1_link = env('ADVERTISE1_LINK');
        $this->ads2_file = env('ADVERTISE2_URL');
        $this->ads2_link = env('ADVERTISE2_LINK');
        $this->ads3_file = env('ADVERTISE3_URL');
        $this->ads3_link = env('ADVERTISE3_LINK');
    }
    public function updatedAds1File($value)
    {
        $this->validate([
            'ads1_file' => 'max:'.MAX_COURSE_UPLOAD_SIZE.       // Max 1MB =1024K
                     '|mimes:'.env('ALLOW_ADS_EXTENSIONS')
        ]);
    }
    public function updatedAds2File($value)
    {

        $this->validate([
            'ads2_file' => 'max:'.MAX_COURSE_UPLOAD_SIZE.       // Max 1MB =1024K
                     '|mimes:'.env('ALLOW_ADS_EXTENSIONS')
        ]);
    }
   
    public function updatedAds3File($value)
    {
        $this->validate([
            'ads3_file' => 'max:'.MAX_COURSE_UPLOAD_SIZE.       // Max 1MB =1024K
                     '|mimes:'.env('ALLOW_ADS_EXTENSIONS')
        ]);
    }
    public function save(Request $request)
    {
        
        $validatedData = $this->validate();
        // dd($request);
        // dd($request->hasFile('ads2_file'));
        //if ($request->hasFile('document')) {
        //dd($this->ads1_file);

        # please reference config/filesystem/php
        if( Gettype($this->ads1_file)=='object' && Gettype($this->ads1_file)!='string')
        {
            $origin_filename = $this->ads1_file->getClientOriginalName();
            $file_extension = explode('.', $origin_filename );
            $file_extension = $file_extension[count($file_extension)-1];
            $save_file_name = md5('ads1'.date('Ynd His').$file_extension) .'.'.$file_extension;
            $file_path1 = 'attach/' . $save_file_name;
            $this->ads1_file->storePubliclyAs('attach',  $save_file_name, 'public');


            // $file_content   = $this->ads1_file->get();
            // Storage::disk('public')->put( $file_path1 , $file_content ); 
            #######################################
            //$store_result = $this->ads1_file->store('ads');  # courses/nb6QQA0FZ2e2YA8whGNej3R9KISpIO1tQrJEJhEi.zip
            // $file_extension = explode('.', $store_result );
            // $file_name = explode('/', $store_result);
            // $file_name = $file_name[ count($file_name)-1];
            // $file_path1 = $store_result;
            setEnv('ADVERTISE1_URL',  $file_path1 );
        }

        if( Gettype($this->ads2_file)=='object' && Gettype($this->ads2_file)!='string')
        {
            $origin_filename = $this->ads2_file->getClientOriginalName();
            $file_extension = explode('.', $origin_filename );
            $file_extension = $file_extension[count($file_extension)-1];
            $save_file_name = md5('ads2'.date('Ynd His').$file_extension) .'.'.$file_extension;
            $file_path2 = 'attach/' . $save_file_name;
            $this->ads2_file->storePubliclyAs('attach',  $save_file_name, 'public');
            setEnv('ADVERTISE2_URL',  $file_path2 );
        }

        if( Gettype($this->ads3_file)=='object' && Gettype($this->ads3_file)!='string')
        {
            $origin_filename = $this->ads3_file->getClientOriginalName();
            $file_extension = explode('.', $origin_filename );
            $file_extension = $file_extension[count($file_extension)-1];
            $save_file_name = md5('ads3'.date('Ynd His').$file_extension) .'.'.$file_extension;
            $file_path3 = 'attach/' . $save_file_name;
            $this->ads3_file->storePubliclyAs('attach',  $save_file_name, 'public');
            setEnv('ADVERTISE3_URL',  $file_path3 );
        }


        # setEnv
        setEnv('MAIL_USERNAME',   $this->email );
        setEnv('MAIL_PASSWORD',   $this->password );

        setEnv('ADVERTISE1_LINK', $this->ads1_link );
        setEnv('ADVERTISE2_LINK', $this->ads2_link );
        setEnv('ADVERTISE3_LINK', $this->ads3_link );

        $this->dispatchBrowserEvent('contentSaved', ['type' => 'success',  'message' => 'Setting saved Successfully!']);

    }
    public function render()
    {
        return view('livewire.settings', [] );
    }
}
