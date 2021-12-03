<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
                        'specialization_id'
                        , 'level' 
                        , 'faculty_id' 
                        , 'training_id'
                        , 'created_by'
                        , 'updated_by'
                        , 'title'
                        , 'description'
                        , 'filename'
                        , 'filepath'
                        , 'filesize'
                        , 'filetype'
                        , 'cate_course'
                        , 'cate_exercise'
                        , 'cate_exam'
                        , 'protected'
            ];
    public function creator() {
        return $this->hasOne('App\Models\User','id', 'created_by');
        //return $this->belongsTo('App\Models\User','id', 'created_by');
    }
    public function updater() {
        return $this->hasOne('App\Models\User','id','updated_by');
    }
    public function lang() {
        return $this->hasMany(MaterialLanguage::class);
    }
}
