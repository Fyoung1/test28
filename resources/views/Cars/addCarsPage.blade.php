@extends('app')

@section('content')
    <div class="DivWithAddCar" style="position: relative;margin-top:2.5%;">
        <h3>Страница с добавлением автомобиля: </h3>
        <form id="add-car-form">
            @csrf
            <div>
                <label for="brand">Марка:</label>
                <input type="text" id="brand" name="brand" required>
            </div>
            <div>
                <label for="model">Модель:</label>
                <input type="text" id="model" name="model" required>
            </div>
            <div>
                <label for="year">Год выпуска:</label>
                <input type="number" id="year" name="year" required min="1900" max="2024">
            </div>
            <div>
                <label for="mileage">Пробег:</label>
                <input type="number" id="mileage" name="mileage" required min="0">
            </div>
            <div>
                <label for="color">Цвет:</label>
                <input type="text" id="color" name="color" required>
            </div>
            <button type="submit">Добавить марку автомобиля</button>
        </form>
    </div>
@endsection



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#add-car-form').on('submit', function(e) {
            e.preventDefault(); // Предотвращаем отправку формы по умолчанию

            var formData = $(this).serialize(); // Сериализуем данные формы

            $.ajax({
                url: '/add-car-to-base', // URL-адрес для отправки запроса
                method: 'POST', // Метод запроса (POST или GET)
                data: formData, // Данные для отправки на сервер
                dataType: 'json', // Тип данных, которые ожидаются в ответе
                success: function(response) { // Функция, которая будет вызвана при успешном ответе сервера
                    console.log(response);
                    window.location.href = response.redirect;// Выводим ответ сервера в консоль
                },
                error: function(jqXHR, textStatus, errorThrown) { // Функция, которая будет вызвана при ошибке
                    console.log(textStatus, errorThrown); // Выводим текст ошибки в консоль
                }
            });
        });
    });
</script>
