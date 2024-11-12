<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends BaseController{
    protected $validation = [
        'room_type' => 'required|string|in:Normal,Deluxe A,Deluxe B,Deluxe C,Duplex,Suite',
        'number' => 'required|integer',
        'picture' => 'nullable|string',
        'bed_type' => 'required|string|in:Single bed,Double bed,Double Superior,Suite',
        'room_floor' => 'required|string|in:A1,A2,A3,B1,B2,B3',
        'facilities' => 'nullable|array',
        'facilities.*' => 'string', // Each element within the JSON must be a string
        'rate' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0|max:100',
        'status' => 'required|string|in:Available,Booked',
    ];
    
    protected $view_root = "rooms";
    protected $modelClass = Room::class;
    protected $userCheck = false;
}
