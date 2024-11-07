<h1>Editar Actividad</h1>

<form action="{{ route('activities.update', $activity->id) }}" method="POST">
    @include('activities.form', ['method' => 'PUT', 'activity' => $activity])
    <a href="{{ route('activities.index') }}">Volver al listado de actividades</a>
</form>
