<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование записи</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        form {
            display: inline-block;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Редактирование записи в таблице {{ $table }}</h1>
    <form action="{{ route('update_record', ['table' => $table, 'id' => $record->id]) }}" method="POST">
        @csrf
        @method('POST')
        <!-- Добавьте поля для всех редактируемых полей -->
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" value="{{ $record->name }}" required>
        <!-- Повторите для других полей -->
        <button type="submit">Обновить</button>
    </form>
    <a href="{{ route('show_table', ['table' => $table]) }}" class="button">Назад</a>
</body>
</html>
