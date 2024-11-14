<h1><strong>Reservas</strong></h1>
<a href="{{ route('bookings.create') }}">Nueva reserva</a>
@foreach($bookings as $booking)
    @include('bookings._details', ['booking' => $booking])

    <a href="{{ route('bookings.show', $booking->id) }}">Detalles</a>

    <a href="{{ route('bookings.edit', $booking->id) }}">Editar</a>
    
    <br>
@endforeach