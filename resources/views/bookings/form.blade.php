@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Formulario de Reserva</h1>

    <form action="@yield('form_action')" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method(isset($data->id) ? 'PUT' : 'POST')

        <div>
            <label for="guest" class="block text-sm font-medium text-gray-700">Huésped</label>
            <input name="guest" type="text" id="guest" placeholder="Nombre del huésped" 
                   value="{{ old('guest', $data->guest ?? '') }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
        </div>

        <div>
            <label for="picture" class="block text-sm font-medium text-gray-700">Imagen</label>
            <input name="picture" type="file" id="picture"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
        </div>

        <div>
            <label for="check_in" class="block text-sm font-medium text-gray-700">Fecha de Check-In</label>
            <input name="check_in" type="date" id="check_in" 
                   value="{{ old('check_in', $data->check_in ?? '') }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
        </div>

        <div>
            <label for="check_out" class="block text-sm font-medium text-gray-700">Fecha de Check-Out</label>
            <input name="check_out" type="date" id="check_out" 
                   value="{{ old('check_out', $data->check_out ?? '') }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
        </div>

        <div>
            <label for="discount" class="block text-sm font-medium text-gray-700">Descuento (%)</label>
            <input name="discount" type="number" id="discount" step="0.01" min="0" max="100" placeholder="Descuento" 
                   value="{{ old('discount', $data->discount ?? '') }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
        </div>

        <div>
            <label for="notes" class="block text-sm font-medium text-gray-700">Notas</label>
            <textarea name="notes" id="notes" placeholder="Agregar notas" rows="4"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ old('notes', $data->notes ?? '') }}</textarea>
        </div>

        <div>
            <label for="room_id" class="block text-sm font-medium text-gray-700">Habitación</label>
            <select name="room_id" id="room_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                <option value="">Selecciona una habitación</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ old('room_id', $data->room_id ?? '') == $room->id ? 'selected' : '' }}>
                        {{ $room->type . ' ' . $room->number }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit"
                    class="w-full bg-blue-600 font-bold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200 text-white">
                @yield('button_text')
            </button>
        </div>
    </form>
</div>
@endsection
