@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Formulario de Cliente</h1>

    <form action="@yield('form_action')" method="POST" class="space-y-4">
        @csrf
        @method(isset($data->id) ? 'PUT' : 'POST')

        <div>
            <label for="customer" class="block text-sm font-medium text-gray-700">Nombre del Cliente</label>
            <input name="customer" id="customer" type="text" placeholder="Nombre del Cliente" 
                   value="{{ old('customer', $data->customer ?? '') }}" required 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <input name="email" id="email" type="email" placeholder="Correo Electrónico" 
                   value="{{ old('email', $data->email ?? '') }}" required 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
            <input name="phone" id="phone" type="text" placeholder="Número de Teléfono" 
                   value="{{ old('phone', $data->phone ?? '') }}" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
        </div>

        <div>
            <label for="subject" class="block text-sm font-medium text-gray-700">Asunto</label>
            <input name="subject" id="subject" type="text" placeholder="Asunto" 
                   value="{{ old('subject', $data->subject ?? '') }}" required 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" />
        </div>

        <div>
            <label for="comment" class="block text-sm font-medium text-gray-700">Comentario</label>
            <textarea name="comment" id="comment" placeholder="Comentario" rows="4" required
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ old('comment', $data->comment ?? '') }}</textarea>
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