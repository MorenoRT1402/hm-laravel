<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller{    
    protected $view_root = "rooms";
    protected $modelClass = Room::class;
    protected $userCheck = false;
    
    protected $validation = [
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

    private function prepareRoomData(Request $request){
        $this->validate($request, $this->validation);

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

    public function store(Request $request){
        $data = $this->prepareRoomData($request);
        Room::create($data);
        return redirect(route("$this->view_root.index"))->with('success', 'Habitación creada correctamente.');
    }

    public function update(Request $request, $id){
        $data = $this->prepareRoomData($request);
        $room = Room::findOrFail($id);
        $room->update($data);
        return redirect(route("$this->view_root.show", $id))->with('success', 'Habitación actualizada correctamente.');
    }  
}

