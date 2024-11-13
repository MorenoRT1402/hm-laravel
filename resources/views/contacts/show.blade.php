<h1>Detalle de Room</h1>
@include('rooms._details', ['room' => $data])

<form action="{{ route('rooms.destroy', $data->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminarlo?')">
        Eliminar
    </button>
</form>

<a href="{{ route('rooms.index') }}">Volver al index</a>