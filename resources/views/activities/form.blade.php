@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Formulario de Actividad</h1>

    <form action="@yield('form_action')" method="POST" class="space-y-4">
        @csrf
        @method(isset($data->id) ? 'PUT' : 'POST')

        <div>
            <label for="type" class="block text-sm font-medium text-gray-700">Tipo de Actividad</label>
            <select name="type" id="type" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                <option value="surf" {{ old('type', $data->type ?? '') === 'surf' ? 'selected' : '' }}>Surf</option>
                <option value="windsurf" {{ old('type', $data->type ?? '') === 'windsurf' ? 'selected' : '' }}>Windsurf</option>
                <option value="kayak" {{ old('type', $data->type ?? '') === 'kayak' ? 'selected' : '' }}>Kayak</option>
                <option value="atv" {{ old('type', $data->type ?? '') === 'atv' ? 'selected' : '' }}>ATV</option>
                <option value="hot air balloon" {{ old('type', $data->type ?? '') === 'hot air balloon' ? 'selected' : '' }}>Hot Air Balloon</option>
            </select>
        </div>

        <div>
            <label for="datetime" class="block text-sm font-medium text-gray-700">Fecha y Hora</label>
            <input type="datetime-local" id="datetime" name="datetime" 
                   value="{{ old('datetime', $data->datetime ?? '') }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
        </div>

        <div>
            <label for="notes" class="block text-sm font-medium text-gray-700">Notas</label>
            <textarea id="notes" name="notes" rows="4" 
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ old('notes', $data->notes ?? '') }}</textarea>
        </div>

        <div>
            <button type="submit"
                    class="w-full bg-blue-600 font-bold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200 text-white">
                @yield('button_text')
            </button>
        </div>
    </form>

    @isset($back_index)
        <div class="mt-4 text-center">
            <a href="{{ route('activities.index') }}" class="text-blue-600 hover:underline">Volver al listado de actividades</a>
        </div>
    @endisset
</div>
@endsection
