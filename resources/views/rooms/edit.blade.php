@extends('rooms.form')

@section('title', 'Editar Habitación')
@section('form_action', route('rooms.update', $data->id))
@section('button_text', 'Actualizar')