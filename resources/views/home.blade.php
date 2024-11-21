@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-semibold text-center mt-12">Bienvenido a la Página de Inicio</h1>
<p class="text-lg text-center mt-4">Aquí podrás ver todas las opciones disponibles, como actividades, habitaciones, mensajes y más.</p>

<div class="mt-8 flex justify-center space-x-6">
    <a href="{{ route('activities.index') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md">Actividades</a>
    <a href="{{ route('rooms.index') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md">Habitaciones</a>
    <a href="{{ route('contacts.index') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md">Mensajes</a>
    <a href="{{ route('bookings.index') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md">Reservas</a>
</div>
@endsection