@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">
            @yield('title', 'Detalle de Recurso')
        </h1>

        @yield('detail-content')

        @isset($data)
            <form action="@yield('delete-route')" method="POST" class="mt-6" style="display:inline;">
                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminarlo?')"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-red-200">
                    Eliminar
                </button>
            </form>
        @endisset

        <a href="@yield('back-link', route('rooms.index'))" class="mt-4 inline-block text-blue-600 hover:text-blue-700">
            Volver al índice
        </a>
    </div>
@endsection
