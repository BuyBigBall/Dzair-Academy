<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];
    protected $fillable = ['from', 'to' ,'title' ,'content' ,'attached' ,
            'sent_at', 'view_at', 'status', 
        ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function sender() {
        return $this->hasOne('App\Models\User','id', 'from');
        //return $this->belongsTo('App\Models\User','id', 'created_by');
    }
    public function receiver() {
        return $this->hasOne('App\Models\User','id','to');
    }
    public function users() {
        return $this->hasOne('App\Models\User','id', 'from');
        //return $this->belongsTo('App\Models\User','id', 'created_by');
    }
}
