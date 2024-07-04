@extends('app')

@section('content')
    <h2>Редактирование автомобиля</h2>
    @foreach ($cars as $car)
        <form action="{{ route('updateCar', $car->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="brand_name">Марка:</label><br>
            <input type="text" id="brand_name" name="brand_name" value="{{ $car->brand_name }}"><br>
            <label for="model_name">Модель:</label><br>
            <input type="text" id="model_name" name="model_name" value="{{ $car->model_name }}"><br>
            <label for="year">Год выпуска:</label><br>
            <input type="text" id="year" name="year" value="{{ $car->year }}"><br>
            <label for="color">Цвет:</label><br>
            <input type="text" id="color" name="color" value="{{ $car->color }}"><br>
            <label for="mileage">Пробег:</label><br>
            <input type="text" id="mileage" name="mileage" value="{{ $car->mileage }}"><br>
            <input type="submit" value="Сохранить изменения">
        </form>
    @endforeach
@endsection
