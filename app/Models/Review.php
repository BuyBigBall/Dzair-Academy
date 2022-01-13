<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'course_id' ,'marks' , 'content', 'verified_at'];

    public function user() {
        return $this->hasOne('App\Models\User','id','user_id');
    }
    public function course() {
        return $this->hasOne('App\Models\Course','id','course_id');
    }
}
