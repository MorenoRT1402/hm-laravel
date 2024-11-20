@extends('base.show')

@section('title', 'Detalle de Contact')

@section('detail-content')
    @include('contacts._details', ['item' => $data])
@endsection