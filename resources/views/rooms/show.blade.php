@extends('base.show')

@section('title', 'Detalle de Habitación')

@section('detail-content')
    @include('rooms._details', ['item' => $data])
@endsection

