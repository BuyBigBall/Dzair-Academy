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
                        , 'traning_id'
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
}
