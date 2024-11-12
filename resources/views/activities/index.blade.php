<h1><strong>Actividades</strong></h1>
<a href="{{ route('activities.create') }}">Crear Actividad</a>
@foreach($activities as $activity)
    @include('activities._activity_details', ['activity' => $activity])

    <a href="{{ route('activities.show', $activity->id) }}">Ver Detalles</a>

    <a href="{{ route('activities.edit', $activity->id) }}">Editar</a>
    
    <br>
@endforeach