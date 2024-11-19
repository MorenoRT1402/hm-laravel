<article class="bg-white p-6 rounded-lg shadow-md space-y-4">
    <p class="text-lg font-semibold text-gray-800"><strong>{{ $room->type . " " . $room->number }}</strong></p>
    <p class="text-sm text-gray-600"><strong>ID:</strong> {{ $room->id }}</p>
    <p class="text-sm text-gray-600"><strong>Cama:</strong> {{ $room->bed_type }}</p>
    <p class="text-sm text-gray-600"><strong>Planta:</strong> {{ $room->floor }}</p>
    
    <p class="text-sm text-gray-600"><strong>Instalaciones:</strong></p>
    <ul class="list-disc pl-5 space-y-1">
        @foreach(json_decode($room->facilities) as $facility)
            <li class="text-sm text-gray-600">{{ $facility }}</li>
        @endforeach
    </ul>

    <p class="text-sm text-gray-600"><strong>Precio:</strong> ${{ number_format($room->rate, 2) }}</p>
    <p class="text-sm text-gray-600"><strong>Descuento:</strong> {{ $room->discount }}%</p>
    <p class="text-sm text-gray-600"><strong>Status:</strong> {{ $room->status }}</p>
</article>
