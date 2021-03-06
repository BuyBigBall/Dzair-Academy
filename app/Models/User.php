<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];
    protected $fillable = ['role', 'status' ,'name' ,'email' ,'email_verified_at' ,
            'photo_agree', 'university_id', 'hide_email', 'hide_phone',
            'password', 'photo', 'phone', 'location', 'course_id', 'about', 
        ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userRelations() {
        return $this->hasMany([['App\Models\Course','created_by'], ['App\Models\Course','updated_by']]);
    }
    public function course() {
        return $this->hasOne('App\Models\Module', 'id', 'course_id');
    }
    public function collection() {
        return $this->hasMany('App\Models\Collection', 'user_id', 'id');
    }
    public function university() {
        return $this->hasOne('App\Models\University', 'id', 'university_id');
    }

    public function sent_message() {
        return $this->hasMany('App\Models\Message', 'from','id')
                        ->where('to', '=', Auth::id() )
                        ->where('status', '=', '1');
    }

}
