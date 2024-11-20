@extends('base.show')

@section('title', 'Detalle de Actividad')

@section('detail-content')
    @include('activities._details', ['item' => $data])
@endsection