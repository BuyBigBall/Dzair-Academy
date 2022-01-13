<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\University;
use Illuminate\Http\Request;
use App\Models\CourseLanguage;
use Illuminate\Support\Facades\DB;

class UsereditModal extends Component
{

    public  $show;

    public  $err_msg;
    public User $user;
    public  $edit_user_id;
    public  $university_options;

    protected $listeners = [
        'ShowUserModal' => 'doShow'        ,
    ];
    protected $rules = [
        'user.name'     => 'max:40|min:3',
        'user.email'    => 'email:rfc,dns',
        'user.phone'    => 'max:10',
        'user.about'    => 'max:200',
        'user.role'     => 'required',  
        'user.university_id'=>'required',  
        //'user.location' => 'min:3',
        //'user.photo'    => 'max:'.MAX_COURSE_UPLOAD_SIZE,  
    ];
    public function mount(Request $request) {
        $this->show = false;

        $this->university_options = University::orderBy('mainname')->get();
    }

    public function doShow($user_id) {
        //dd($user_id);
        $this->edit_user_id = $user_id;
        $this->user = User::find($user_id);
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function save() {
        
        if ( !!empty(Auth::user() ))
        {
            return Redirect('login');
        }
        
        {
            if(!empty($this->edit_user_id)){

                if(!empty($this->user->university_id))
                {
                    $univ = University::find($this->user->university_id);
                    $this->user->location = $univ->town;
                }

                User::updateOrCreate(['id'=>$this->edit_user_id],
                    [
                        'role' => $this->user->role,
                        'name' => $this->user->name,
                        'email' => $this->user->email,
                        'phone' => $this->user->phone,
                        'location' => $this->user->location,
                        'about' => $this->user->about,
                        'university_id' => $this->user->university_id,
                    ]);
            }
            return Redirect(route('user-management'));
        }

        $this->doClose();
    } 

    public function render()
    {
        //dd($this->user);
        return view('livewire.modal.useredit-modal');
    }
}
