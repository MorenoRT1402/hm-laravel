@extends('bookings.form')

@section('title', 'Editar Reserva')
@section('form_action', route('bookings.update', $data->id))
@section('button_text', 'Actualizar')