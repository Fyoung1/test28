@extends('app')

@section('content')
    <h2>Список моделей автомобилей</h2>
    @foreach ($CarModel as $CarModels)
        <p>{{ $CarModels->name }}</p>
    @endforeach
@endsection
