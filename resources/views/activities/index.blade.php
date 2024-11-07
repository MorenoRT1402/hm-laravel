<h1><strong>Actividades</strong></h1>
@foreach($activities as $activity)
<p><strong> Tipo: </strong> {{$activity->type}} </p>
<p><strong> Fecha: </strong> {{$activity->datetime}} </p>
<br>
@endforeach