<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionItem extends Model
{
    use HasFactory;

    protected $fillable = ['collection_id', 'material_id'];

    public function col() {
        return $this->belongsTo('App\Models\Collection','collection_id');
    }
    public function mat() {
        return $this->hasMany('App\Models\Material','id','material_id');
    }
}
