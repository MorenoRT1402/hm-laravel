<h1><strong>Rooms</strong></h1>
<a href="{{ route('rooms.create') }}">Crear Habitación</a>
@foreach($rooms as $room)
    @include('rooms._details', ['room' => $room])

    <a href="{{ route('rooms.show', $room->id) }}">Ver Detalles</a>

    <a href="{{ route('rooms.edit', $room->id) }}">Editar</a>
    
    <br>
@endforeach