@extends('contacts.form')

@section('title', 'Editar Contact')
@section('form_action', route('contacts.update', $data->id))
@section('button_text', 'Actualizar')