<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends BaseController{
    protected $view_root = "bookings";
    protected $modelClass = Booking::class;
    protected $userCheck = false;
    
    protected $rules = [
        'guest' => 'required|string|max:255',
        'picture' => 'nullable|string|max:255',
        'check_in' => 'required|date|after_or_equal:order_date',
        'check_out' => 'required|date|after:check_in',
        'discount' => 'required|numeric|min:0|max:100',
        'notes' => 'nullable|string',
        'room_id' => 'required|exists:rooms,id',
    ];    

    protected function get_data(Request $request){
        return [
            'guest' => $request->input('guest'),
            'picture' => $request->input('picture'),
            'order_date' => now(),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'discount' => $request->input('discount'),
            'notes' => json_encode($request->input('notes')), 
            'status' => $request->input('status'),
            'room_id' => $request->input('room_id'),
        ];
    }

    public function create(){
        $method = 'POST';
        $rooms = Room::all();
        return view("$this->view_root.create", compact('method', 'rooms'));
    }

    public function edit($id){
        $method = 'PUT';
        $rooms = Room::all();
        $data = $this->modelClass::findOrFail($id);
        $back_index = true;
        
        return view("$this->view_root.edit", compact('method', 'data', 'back_index', 'rooms'));
    }
}