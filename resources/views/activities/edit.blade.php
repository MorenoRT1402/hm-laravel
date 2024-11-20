@extends('activities.form')

@section('title', 'Editar Actividad')
@section('form_action', route('activities.update', $data->id))
@section('button_text', 'Actualizar')