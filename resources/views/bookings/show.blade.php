@extends('base.show')

@section('title', 'Detalle de Reserva')

@section('detail-content')
    @include('bookings._details', ['item' => $data])
@endsection