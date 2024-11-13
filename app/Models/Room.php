<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        "type", "number", "picture", "bed_type", "floor", "facilities", 
        "rate", "discount", "status"
    ];
}
