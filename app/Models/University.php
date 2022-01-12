<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = ['mainname', 'en' ,'fr' ,'ar', 'created_by', 'updated_by', 'town'];
}
