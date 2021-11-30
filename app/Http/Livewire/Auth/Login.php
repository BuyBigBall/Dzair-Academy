<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required',
    ];

    public function mount()
    {
        if (auth()->user()) {
            redirect('/search');
        }

       
        if(Cookie::has("cookieSetFlag") && Cookie::has("cookieSetFlag")==1)
        {
            $this->email = Cookie::get("cookieUserName");
            $this->password = Cookie::get("cookieUserPwd");
            $this->remember_me = Cookie::get("cookieSetFlag");
            $this->fill(['email' => $this->email, 'password' => $this->password]);
        }
        else
        {
            Cookie::forget("cookieUserName");
            Cookie::forget("cookieUserPwd");
            Cookie::forget("cookieSetFlag");
            //$this->fill(['email' => 'admin@softui.com', 'password' => 'secret']);
        }
        
        
    }

    public function login()
    {
        $credentials = $this->validate();
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(["email" => $this->email])->first();
            auth()->login($user, $this->remember_me);
            if( $this->remember_me )
            {
                Cookie::queue("cookieUserName", $this->email, 3);
                Cookie::queue("cookieUserPwd", $this->password, 3);
                Cookie::queue("cookieSetFlag", $this->remember_me, 3);
                //print_r(Cookie::has("cookieSetFlag")); die;
            }
            return redirect()->intended('/search');
        } else {
            return $this->addError('email', trans('auth.failed'));
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
    public function welcome()
    {
        return view('welcome');
    }
}
