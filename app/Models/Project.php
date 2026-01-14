<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'status',
        'description',
        'image',
        'dimensions',
        'building_height',
        'weight',
        'purpose',
        'documentation',
    ];
}
