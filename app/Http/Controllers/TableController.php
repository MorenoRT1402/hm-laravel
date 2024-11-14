<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableController extends Controller{
    public function showTable($resource){
        $models = [
            'bookings' => \App\Models\Booking::class,
            'rooms' => \App\Models\Room::class,
            'users' => \App\Models\User::class,
            'contacts' => \App\Models\Contact::class,
            'activity' => \App\Models\Activity::class,
        ];

        if (!array_key_exists($resource, $models)) {
            abort(404, 'Recurso no encontrado');
        }

        $model = $models[$resource];
        $data = $model::all();

        $headers = array_keys($data->first()->getAttributes());

        $data = $data->map->toArray();

        return view('table', compact('headers', 'data'));
    }
}
