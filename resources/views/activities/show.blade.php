<h1>Detalle de Actividad</h1>
<p><strong>Tipo:</strong> {{ $activity->type }}</p>
<p><strong>Fecha y Hora:</strong> {{ $activity->datetime }}</p>
<p><strong>Notas:</strong> {{ $activity->notes }}</p>
<a href="{{ route('activities.index') }}">Volver al listado de actividades</a>