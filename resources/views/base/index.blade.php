@extends('layouts.app')

@section('content')
    <h1 class="text-4xl uppercase font-black m-6 text-gray-800">
        @yield('title', 'Default Title')
    </h1>
    <div class="flex gap-4 m-6">
        <x-link-button href={{$create_route}} class="bg-blue-600 hover:bg-blue-700 text-white">
            Crear
        </x-link-button>

        <x-link-button href="{{ request()->path() . '/table' }}" class="bg-green-600 hover:bg-green-700 text-white">
            Vista Tabla
        </x-link-button>
    </div>

    <x-resource-list :items="$items" :resource="$resource" />
@endsection
