<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialLanguage extends Model
{
    use HasFactory;
    protected $fillable = [
        'material_id'
        , 'language' 
        , 'created_by'
        , 'updated_by'
        , 'title'
        , 'status'
        , 'description'
    ];

    public function creator() {
        return $this->hasOne('App\Models\User','id', 'created_by');
    }
    public function updater() {
        return $this->hasOne('App\Models\User','id','updated_by');
    }
    public function mat() {
        return $this->belongsTo('App\Models\Material', 'material_id');
    }
}
