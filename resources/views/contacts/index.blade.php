<h1><strong>Buzón</strong></h1>
<a href="{{ route('contacts.create') }}">Nuevo mensaje</a>
@foreach($contacts as $contact)
    @include('contacts._details', ['contact' => $contact])

    <a href="{{ route('contacts.show', $contact->id) }}">Detalles</a>

    <a href="{{ route('contacts.edit', $contact->id) }}">Editar</a>
    
    <br>
@endforeach