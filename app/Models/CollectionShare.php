<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionShare extends Model
{
    use HasFactory;

    protected $fillable = ['collection_id', 'to_user', 'share_url'];

    public function coll() {
        return $this->belongsTo('App\Models\Collection','collection_id');
    }
    public function share_to() {
        return $this->hasMany('App\Models\User','id','to_user');
    }
}
