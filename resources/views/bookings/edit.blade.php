@extends('bookings.form')

<h1>Editar Habitación</h1>

@section('form_action', route('bookings.update', $data->id))