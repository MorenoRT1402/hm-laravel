<h1>Crear Actividad</h1>

<form action="{{ route('activities.store') }}" method="POST">
    @include('activities.form')
</form>