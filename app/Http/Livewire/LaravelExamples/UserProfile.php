<?php

namespace App\Http\Livewire\LaravelExamples;
use App\Models\User;
use App\Models\CollectionShare;
use App\Models\Course;
use App\Models\CourseLanguage;
use App\Models\University;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserProfile extends Component
{
    use WithFileUploads;
    public User $user;
    public $user_email;
    public $user_phone;
    public $user_about;
    public $user_location;
    public $user_photo;
    public $user_university;
    public $user_edit_photo;
    public $tabs_id = 1;

    public $hide_email = 0;
    public $hide_phone = 0;

    public $myUpload_courses;
    public $university_options;

    public $showSuccesNotification  = false;

    public $showDemoNotification = false;
    
    public $listeners = [
        'stopShareCollection' => 'stopShareCollection',
        'delete_course' => 'delete_course'
    ];
    protected $rules = [
        'user_name'     => 'max:40|min:3',
        'user_email'    => 'email:rfc,dns',
        'user_phone'    => 'numeric|digits_between:6,12',
        'user_about'    => 'max:200',
        //'user_location' => 'min:3',
        'user_university'=> 'required',
        'user_photo'    => 'max:'.MAX_COURSE_UPLOAD_SIZE,  
    ];
    protected $messages = [
        'user_name.min'     =>  ('The user name length cannot be less than 3 characters.'),
        'user_name.max'     =>  ('The user name length cannot be over than 40 characters.'),
        'user_email.email'  =>  ('The user email is invalid.'),
        'user_phone.digits_between'    =>  ('The user phone length must be between 6 and 12 digits.'),
        'user_phone.numeric'=>  ('The user phone can be allow only numeric.'),
        'user_about.max'    =>  ('The user description length cannot be over than 200 characters.'),
        //'user_location.min' =>  ('The user univercity name length cannot be less than 3 characters.'),
        'user_photo.min'    =>  ('The user photo file size cannot be over than '.MAX_COURSE_UPLOAD_SIZE.' bytes.'),
        'user_university.required'=> ('The user university cannot be empty'),
    ];

    public function stopShareCollection($share_id)
    {
        CollectionShare::find($share_id)->delete();
    }
    
    public function updatedHideEmail($value) { 
        $this->user->hide_email = $this->hide_email ? 1 : 0;
        $this->user->save();
    }
    public function updatedHidePhone($value) { 
        $this->user->hide_phone = $this->hide_phone ? 1 : 0;
        $this->user->save();
    }

    public function updatedUserPhoto($value) { 
        //dd($value);
        $this->validate([
            'user_photo' => 'max:'.MAX_COURSE_UPLOAD_SIZE.       // Max 1MB =1024K
                     '|mimes:'.env('ALLOW_PHOTO_EXTENSIONS')
        ]);
    }
    public function mount(Request $request) { 
        if(!empty($request->user_id))
        {
            $this->user = User::find($request->user_id);
        }
        else
        {
            $this->user = auth()->user();
        }

        $this->user_name        = $this->user->name;
        $this->user_email       = $this->user->email;
        $this->user_phone       = $this->user->phone;
        $this->user_about       = $this->user->about;
        $this->user_location    = $this->user->location;
        $this->user_university    = $this->user->university_id;
        $this->user_photo       = $this->user->photo;

        $this->hide_email       = $this->user->hide_email;
        $this->hide_phone       = $this->user->hide_phone;

        if($this->user->photo_agree!=1 && $this->user->id!=Auth::id())
        {
            $this->user_photo= "no-image";
        }
        if(!empty($request->user_id))
            $this->myUpload_courses = Course::where('created_by', $this->user->id)->where('status', '1')->orderBy('created_at', 'DESC')->get();
        else
            $this->myUpload_courses = Course::where('created_by', $this->user->id)->orderBy('created_at', 'DESC')->get();
        
        
        $this->university_options = University::orderBy('mainname')->get();//->toArray();

        // dd($this->university_options);
    }

    public function save() {
        $this->validate();
        $this->user->email       = $this->user_email;
        $this->user->name        = $this->user_name;
        $this->user->email       = $this->user_email;
        $this->user->phone       = $this->user_phone;
        $this->user->about       = $this->user_about;


        if( ($univ=University::find($this->user_university)) )
        {
            $this->user->university_id  = $univ->id;
            $this->user->location       = $univ->town;
        }
        
        if($this->user_edit_photo)
        {
            //$store_result = $this->user_edit_photo->storePublicly( '/assets/img'); //to storage
            $store_result = $this->user_edit_photo->store('assets/img', 'public');   //to public

            $file_name = explode('/', $store_result);
            $file_name = $file_name[ count($file_name)-1];
            $file_path = $store_result;
            $this->user->photo = $file_path;
            $this->user->photo_agree = 0;
        }
        $this->user->save();
        $this->showSuccesNotification = true;
    }
    public function delete_course($course_id)
    {
        $this->tabs_id = 3;
        CourseLanguage::where('course_id', $course_id)->delete();
        Course::find($course_id)->delete();
        $this->mount();
    }
    public function render()
    {
        $query = CollectionShare::where('to_user', Auth::id())
                ->orderBy('created_at', 'ASC');
        $this->search_result = $query->get(); //paginate( $this->perPage );

        return view('livewire.laravel-examples.user-profile')->with('pagination', $this->search_result);
    }
}
