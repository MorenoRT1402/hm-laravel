@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">@yield('title')</h1>

    <form action="@yield('form_action')" method="POST" class="space-y-4">
        @csrf
        @method(isset($data->id) ? 'PUT' : 'POST')

        <div>
            <label for="type" class="block text-sm font-medium text-gray-700">Tipo de Habitación</label>
            <select name="type" id="type" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                @foreach(config('params.room_types') as $roomType)
                    <option value="{{ $roomType }}" {{ old('type', $data->type ?? 'Normal') == $roomType ? 'selected' : '' }}>
                        {{ $roomType }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="number" class="block text-sm font-medium text-gray-700">Número</label>
            <input name="number" id="number" type="number" placeholder="Introduce un número"
                   value="{{ old('number', $data->number ?? 1) }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
        </div>

        <div>
            <label for="bed_type" class="block text-sm font-medium text-gray-700">Tipo de Cama</label>
            <select name="bed_type" id="bed_type" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                @foreach(config('params.bed_types') as $bedType)
                    <option value="{{ $bedType }}" {{ old('bed_type', $data->bed_type ?? 'Single Bed') == $bedType ? 'selected' : '' }}>
                        {{ $bedType }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="floor_letter" class="block text-sm font-medium text-gray-700">Piso</label>
            <div class="grid grid-cols-2 gap-4">
                <select id="floor_letter" name="floor_letter" required 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    @foreach(config('params.room_floor_letters') as $floorLetter)
                        <option value="{{ $floorLetter }}" {{ old('floor_letter', $data->floor_letter ?? '') == $floorLetter ? 'selected' : '' }}>
                            {{ $floorLetter }}
                        </option>
                    @endforeach
                </select>
                <input id="floor_number" name="floor_number" type="number" 
                       min="{{ config('params.room_floor_numbers.min') }}" 
                       max="{{ config('params.room_floor_numbers.max') }}" 
                       value="{{ old('floor_number', $data->floor_number ?? config('params.room_floor_numbers.min')) }}" 
                       required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Instalaciones</label>
            <div class="space-y-2">
                @foreach(config('params.facilities') as $facility)
                    <div class="flex items-center">
                        <input type="checkbox" id="{{ $facility }}" name="facilities[]" value="{{ $facility }}" 
                               {{ in_array($facility, old('facilities', json_decode($data->facilities ?? '[]', true))) ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring focus:ring-blue-200" />
                        <label for="{{ $facility }}" class="ml-2 text-sm text-gray-600">{{ $facility }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <label for="rate" class="block text-sm font-medium text-gray-700">Precio</label>
            <input name="rate" id="rate" type="number" step="0.01" placeholder="Precio" min="0" max="500" 
                   value="{{ old('rate', $data->rate ?? 100.00) }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
        </div>

        <div>
            <label for="discount" class="block text-sm font-medium text-gray-700">Descuento</label>
            <input name="discount" id="discount" type="number" step="0.01" placeholder="Descuento" min="0" max="100" 
                   value="{{ old('discount', $data->discount ?? 0.00) }}" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
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
