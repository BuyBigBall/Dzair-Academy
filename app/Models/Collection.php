<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'collection_name' ,'description' ,'is_publish', 'publish_key'];

    public function owner() {
        return $this->hasOne('App\Models\User','id','user_id');
    }
    public function courses() {
        return $this->hasMany('App\Models\CollectionItem','collection_id','id');
    }
}
