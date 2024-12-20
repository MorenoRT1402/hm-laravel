<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Mail\BookingEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Contracts\PaymentProvider;

class BookingController extends BaseController{
    protected $resource = "bookings";
    protected $modelClass = Booking::class;
    protected $userCheck = false;
    
    protected $rules = [
        'guest' => 'required|string|max:255',
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
            'notes' => $request->input('notes'), 
            'status' => config('params.booking_status')[0],
            'room_id' => $request->input('room_id'),
        ];
    }

    public function create(){
        $rooms = Room::all();
        return view("$this->resource.create", compact('rooms'));
    }

    private function createBooking(Request $request): Booking{
        $data = $this->prepareData($request);
        return $this->modelClass::create($data);
    }

    private function handlePayment(Booking $booking): string{
        $paymentProvider = app(PaymentProvider::class);
        $amount = round($booking->get_price($booking) * 100);
        $productName = 'Room Booking';

        $data = [
            'amount' => $amount,
            'product_name' => $productName,
        ];

        return $paymentProvider->processPayment($data);
    }

    private function sendBookingEmail(Request $request, Booking $booking): void{
        $room = Room::findOrFail($booking->room_id);
        $price = $booking->get_price($booking);

        Mail::to('hello@example.com')->send(new BookingEmail(
            $request->input('guest'),
            $room,
            $request->input('check_in'),
            $request->input('check_out'),
            $price,
            $request->input('notes'),
            $request->input('picture'),
            $booking->order_date
        ));
    }

    public function store(Request $request){
        $booking = $this->createBooking($request);

        try {
            $paymentUrl = $this->handlePayment($booking);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al procesar el pago: ' . $e->getMessage());
        }

        $this->sendBookingEmail($request, $booking);

        return redirect()->away($paymentUrl);
    }


    public function edit($id){
        $method = 'PUT';
        $rooms = Room::all();
        $data = $this->modelClass::findOrFail($id);
        $back_index = true;
        
        return view("$this->resource.edit", compact('method', 'data', 'back_index', 'rooms'));
    }
}
