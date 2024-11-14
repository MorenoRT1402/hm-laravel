<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model{
    protected $fillable = [
        "guest", "picture", "order_date", "check_in", "check_out", 
        "discount", "notes", "room_id", "status"
    ];

    public function room() : BelongsTo {
        return $this->belongsTo(Room::class);
    }
}
