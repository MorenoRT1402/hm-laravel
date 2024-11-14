<h1>Detalle de Contact</h1>
@include('contacts._details', ['contact' => $data])

<form action="{{ route('contacts.destroy', $data->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminarlo?')">
        Eliminar
    </button>
</form>

<a href="{{ route('contacts.index') }}">Volver al index</a>