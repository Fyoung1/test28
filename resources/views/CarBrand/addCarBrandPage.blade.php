@extends('app')

@section('content')
    <div class="DivWithAddCarBrand" style="position: relative;margin-top:2.5%;">
        <h3>Страница с добавлением марки автомобиля: </h3>
        <form id="add-car-brand-form">
            @csrf
            <div>
                <label for="name">Марка:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <button type="submit">Добавить марку автомобиля</button>
        </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#add-car-brand-form').on('submit', function(e) {
            e.preventDefault(); // Предотвращаем отправку формы по умолчанию

            var formData = $(this).serialize(); // Сериализуем данные формы

            $.ajax({
                url: '/add-car-brand-to-base', // URL-адрес для отправки запроса
                method: 'POST', // Метод запроса (POST или GET)
                data: formData, // Данные для отправки на сервер
                dataType: 'json', // Тип данных, которые ожидаются в ответе
                success: function(response) { // Функция, которая будет вызвана при успешном ответе сервера
                    console.log(response); // Выводим ответ сервера в консоль
                },
                error: function(jqXHR, textStatus, errorThrown) { // Функция, которая будет вызвана при ошибке
                    console.log(textStatus, errorThrown); // Выводим текст ошибки в консоль
                }
            });
        });
    });
</script>
