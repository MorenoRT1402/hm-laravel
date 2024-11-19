<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Helpers\PriceHelper;

class Booking extends Model {
    protected $fillable = [
        "guest", "picture", "order_date", "check_in", "check_out", 
        "discount", "notes", "room_id", "status"
    ];

    // Convertir campos de fecha automáticamente
    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];

    public function room() : BelongsTo {
        return $this->belongsTo(Room::class);
    }

    public function get_price() {
        $room = Room::find($this->room_id);
        $nights = $this->check_in->diffInDays($this->check_out);
        
        $basePrice = $room->rate * $nights;        
        $priceAfterRoomDiscount = PriceHelper::applyDiscount($basePrice, $room->discount);
    
        $finalPrice = PriceHelper::applyDiscount($priceAfterRoomDiscount, $this->discount);
    
        return $finalPrice;
    }
}