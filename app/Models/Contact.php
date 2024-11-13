<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        "customer", "email", "phone", "subject", "comment", "archived"
    ];

    protected $dates = ['date'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->archived = false;
        });
    }
}