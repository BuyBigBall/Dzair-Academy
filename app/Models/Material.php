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
    public function course() {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
    public function faculty() {
        return $this->belongsTo('App\Models\Faculty', 'faculty_id');
    }
    public function training() {
        return $this->belongsTo('App\Models\Training', 'training_id');
    }
    public function specialization() {
        return $this->belongsTo('App\Models\Specialization', 'specialization_id');
    }
}
