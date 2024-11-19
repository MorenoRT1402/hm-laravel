@extends('layouts.app')

@section('content')
    <h1 class="text-4xl uppercase font-black m-6 text-gray-800">Rooms</h1>

    <x-link-button href="{{ route('rooms.create') }}" class="ml-6 bg-blue-600 hover:bg-blue-700 text-white">
        Crear
    </x-link-button>

    <x-resource-list :items="$rooms" resource="rooms" />
@endsection
