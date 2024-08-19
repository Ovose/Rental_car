<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать данные таблицы {{ $table }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: red;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
        }
        .button:hover {
            background-color: darkred;
        }
        form {
            margin: 0 auto;
            display: inline-block;
            text-align: left;
        }
        label, input {
            display: block;
            margin: 10px 0;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1>Редактировать данные в таблице {{ $table }}</h1>
    <form action="{{ route('update_row', ['table' => $table, 'id' => $row->id]) }}" method="POST">
        @csrf
        @method('POST') <!-- Или @method('PUT'), если используете метод PUT -->
        @foreach ($columns as $column)
            @if ($column !== 'id') <!-- Предполагаем, что 'id' - это автоинкрементное поле -->
                <label for="{{ $column }}">{{ ucfirst($column) }}:</label>
                <input type="text" name="{{ $column }}" id="{{ $column }}" value="{{ $row->$column }}" required>
            @endif
        @endforeach
        <button type="submit">Сохранить</button>
    </form>
    <a href="{{ route('table_data', ['table' => $table]) }}" class="button">Назад</a>
</body>
</html>
