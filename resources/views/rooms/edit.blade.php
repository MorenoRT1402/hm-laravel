@extends('rooms.form')

<h1>Editar Habitación</h1>

@section('form_action', route('rooms.update', $data->id))