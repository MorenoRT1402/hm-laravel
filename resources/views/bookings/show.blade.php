<h1>Detalle de Contact</h1>
@include('bookings._details', ['booking' => $data])

<form action="{{ route('bookings.destroy', $data->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminarlo?')">
        Eliminar
    </button>
</form>

<a href="{{ route('bookings.index') }}">Volver al index</a>