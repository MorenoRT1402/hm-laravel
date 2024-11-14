<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller{
    protected $view_root = "bookings";
    protected $modelClass = Booking::class;
    protected $userCheck = false;
    
    protected $rules = [
        'guest' => 'required|string|max:255',
        'picture' => 'nullable|string|max:255',
        'order_date' => 'required|date',
        'check_in' => 'required|date|after_or_equal:order_date',
        'check_out' => 'required|date|after:check_in',
        'discount' => 'required|numeric|min:0|max:100',
        'notes' => 'nullable|array',
        'notes.*' => 'string|max:255',
        'room_id' => 'required|exists:rooms,id',
        'status' => 'required|string',
    ];    

    protected function get_data(Request $request){
        return [
            'guest' => $request->input('guest'),
            'picture' => $request->input('picture'),
            'order_date' => $request->input('order_date'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'discount' => $request->input('discount'),
            'notes' => json_encode($request->input('notes')), 
            'status' => $request->input('status'),
            'room_id' => $request->input('room_id'),
        ];
    }
}
