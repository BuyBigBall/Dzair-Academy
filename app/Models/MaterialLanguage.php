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
        , 'description'
    ];
}
