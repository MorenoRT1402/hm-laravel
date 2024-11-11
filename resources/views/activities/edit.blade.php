@extends('activities.form')

<h1>Editar Actividad</h1>

@section('form_action', route('activities.update', $activity->id))