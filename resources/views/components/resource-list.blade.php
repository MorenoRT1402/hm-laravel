<div class="space-y-6">
    @foreach($items as $item)
        <div class="bg-gray-50 m-5 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
            @include($resource . '._details', ['item' => $item])

            <div class="flex space-x-4 mt-6">
                <x-link-button href="{{ route($resource . '.show', $item->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white">
                    Ver Detalles
                </x-link-button>

                <x-link-button href="{{ route($resource . '.edit', $item->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white">
                    Editar
                </x-link-button>
            </div>
        </div>
    @endforeach
</div>
