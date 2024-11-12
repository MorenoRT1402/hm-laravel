<h1>Detalle de Actividad</h1>
@include('activities._details')

<form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta actividad?')">
        Eliminar Actividad
    </button>
</form>

<a href="{{ route('activities.index') }}">Volver al listado de actividades</a>