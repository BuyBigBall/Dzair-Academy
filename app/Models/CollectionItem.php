<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionItem extends Model
{
    use HasFactory;

    protected $fillable = ['collection_id', 'material_id'];

    public function coll() {
        return $this->belongsTo('App\Models\Collection','collection_id');
    }
    public function mat() {
        return $this->hasOne('App\Models\Material','id','material_id');
    }
}
