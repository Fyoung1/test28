@extends('app')

@section('content')
    <h2>Список марок автомобилей</h2>
    @foreach ($CarBrand as $CarBrands)
        <p>{{ $CarBrands->name }}</p>
    @endforeach
@endsection
