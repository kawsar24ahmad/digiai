<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type',
        'feature',
        'is_active',
        'image',
    ];
    const TYPES = ['api', 'access_id', 'web_tool'];

}
