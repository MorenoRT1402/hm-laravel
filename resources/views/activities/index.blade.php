<h1><strong>Actividades</strong></h1>
@foreach($activities as $activity)
    @include('activities._activity_details', ['activity' => $activity])

    <a href="{{ route('activities.show', $activity->id) }}">Ver Detalles</a>

    <a href="{{ route('activities.edit', $activity->id) }}">Editar</a>
    
    <br>
@endforeach