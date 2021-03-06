<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionItem extends Model
{
    use HasFactory;

    protected $fillable = ['collection_id', 'course_id'];

    public function coll() {
        return $this->belongsTo('App\Models\Collection','collection_id');
    }
    public function course() {
        return $this->hasOne('App\Models\Course','id','course_id');
    }
}
