@extends('contacts.form')

<h1>Editar Habitación</h1>

@section('form_action', route('contacts.update', $data->id))