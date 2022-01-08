<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = ['training_id', 'en' ,'fr' ,'ar', 'created_by', 'updated_by', 'status'];
}
