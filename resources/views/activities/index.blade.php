<h1><strong>PAN</strong></h1>
@foreach($activities as $activity)
<p><strong> Tipo: </strong> {{$activity->type}} </p>
<p><strong> Fecha: </strong> {{$activity->datetime}} </p>
@endforeach