<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['level', 'specialization_id', 'en' ,'fr' ,'ar', 'created_by', 'updated_by', 'status'];

    public function creator() {
        return $this->hasOne('App\Models\User','id', 'created_by');
        //return $this->belongsTo('App\Models\User','id', 'created_by');
    }
    public function updater() {
        return $this->hasOne('App\Models\User','id','updated_by');
    }
}
