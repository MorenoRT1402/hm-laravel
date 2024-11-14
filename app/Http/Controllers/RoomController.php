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
        'facilities.*' => 'string', // Cada elemento dentro del JSON debe ser una cadena
        'rate' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0|max:100',
        'status' => 'required|string',
    ];

    protected function get_data(Request $request){
        
        $floor = $request->input('floor_letter') . $request->input('floor_number');
        return [
            'type' => $request->input('type'),
            'number' => $request->input('number'),
            'picture' => $request->input('picture'),
            'bed_type' => $request->input('bed_type'),
            'floor' => $floor,
            'facilities' => json_encode($request->input('facilities', [])),
            'rate' => $request->input('rate'),
            'discount' => $request->input('discount', 0),
            'status' => $request->input('status'),
        ];

    }
}

