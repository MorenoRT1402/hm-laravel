@extends('layouts.app')

@section('content')
    <h1 class="text-xl uppercase font-black px-6 mt-6 mb-6 text-gray-800">Rooms</h1>

    <x-link-button href="{{ route('rooms.create') }}" class="bg-blue-600 hover:bg-blue-700">
        Crear Habitación
    </x-link-button>

    <div class="space-y-6">
        @foreach($rooms as $room)
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                @include('rooms._details', ['room' => $room])

                <div class="flex space-x-4 mt-6">
                    <x-link-button href="{{ route('rooms.show', $room->id) }}" class="bg-blue-500 hover:bg-blue-600 text-black">
                        Ver Detalles
                    </x-link-button>

                    <x-link-button href="{{ route('rooms.edit', $room->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-black">
                        Editar
                    </x-link-button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
