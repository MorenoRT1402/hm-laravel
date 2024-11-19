<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends BaseController{    
    protected $view_root = "rooms";
    protected $modelClass = Room::class;
    protected $userCheck = false;
    
    protected $rules = [
        'type' => 'required|string',
        'number' => 'required|integer',
        'picture' => 'nullable|string',
        'bed_type' => 'required|string',
        'floor_letter' => 'required|string',
        'floor_number' => 'required|integer',
        'facilities' => 'nullable|array',
        'facilities.*' => 'string', // Each element within the JSON must be a string
        'rate' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0|max:100',
    ];

    protected function get_data(Request $request){
        $floor = $request->input('floor_letter') . $request->input('floor_number');        
        $roomStatusFirst = config('params.room_status')[0];
    
        return [
            'type' => $request->input('type'),
            'number' => $request->input('number'),
            'picture' => $request->input('picture'),
            'bed_type' => $request->input('bed_type'),
            'floor' => $floor,
            'facilities' => json_encode($request->input('facilities', [])),
            'rate' => $request->input('rate'),
            'discount' => $request->input('discount', 0),
            'status' => $roomStatusFirst,
        ];
    }
}

