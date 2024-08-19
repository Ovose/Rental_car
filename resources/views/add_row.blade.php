<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить данные в таблицу {{ $table }}</title>
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
        input {
            display: block;
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
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
    <h1>Добавить данные в таблицу {{ $table }}</h1>
    <form action="{{ route('store_row', ['table' => $table]) }}" method="POST">
        @csrf
        @foreach ($columns as $column)
            @if ($column != 'id') <!-- Предположим, что 'id' автогенерируется -->
                <label for="{{ $column }}">{{ ucfirst($column) }}</label>
                <input type="text" id="{{ $column }}" name="{{ $column }}" required>
            @endif
        @endforeach
        <button type="submit">Добавить</button>
    </form>
    <a href="{{ route('show_table', ['table' => $table]) }}">Назад</a>
</body>
</html>
