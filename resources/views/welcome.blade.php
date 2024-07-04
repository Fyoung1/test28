@extends('app')

@section('content')
    <h2>Список автомобилей</h2>
    @foreach ($cars as $car)
        <p>Марка {{ $car->brand_name }} Модель {{ $car->model_name }} Год выпуска {{ $car->year }} Цвет {{ $car->color }} Пробег {{ $car->mileage }}</p>
        <button style="position:relative;height: 20px;width: 5%;border: 0px solid #FFFFFF;color:#1d2124;font-size: 15px;left:5%;margin-top:-10%;" id="{{$car->id}}" onclick='myFunction(this.id)'>Удалить</button>
        <a href="EditCar" style="position:relative; height: 20px; width: 5%; border: 0px solid #FFFFFF; color:#1d2124; font-size: 15px; left:10%; margin-top:-2%; text-decoration: none;">Редактировать</a>
    @endforeach
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    function myFunction(id) {
        $.ajax({
            url: '/delete-from-db/'+id,         /* Куда отправить запрос */
            method: 'POST',             /* Метод запроса (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: {
                _token: '{{ csrf_token() }}',
                id:id},     /* Данные передаваемые в массиве */
            success: function(response){
                window.location.href = response.redirect;/* функция которая будет выполнена после успешного запроса.  */
            }
        });
    }
    function myFunctionEdit(id) {
        $.ajax({
            url: '/edit-data-to-db/',         /* Куда отправить запрос */
            method: 'Get',             /* Метод запроса (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: {
                id:id},     /* Данные передаваемые в массиве */
            success: function(response){   /* функция которая будет выполнена после успешного запроса.  */
            }
        });
    }
</script>
