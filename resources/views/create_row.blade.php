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
            width: 100%;
            max-width: 500px;
        }
        label, input, select {
            display: block;
            margin: 10px 0;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1>Добавить данные в таблицу {{ $table }}</h1>
    <form action="{{ route('store_row', ['table' => $table]) }}" method="POST">
        @csrf
        @foreach ($columns as $column)
            @if ($column !== 'id') <!-- Предполагаем, что 'id' - это автоинкрементное поле -->
                <label for="{{ $column }}">{{ ucfirst($column) }}:</label>
                @if (in_array($column, ['related_table_id'])) <!-- Замените на соответствующие колонки для выпадающих списков -->
                    <select name="{{ $column }}" id="{{ $column }}" required>
                        <option value="">Выберите</option>
                        @foreach ($relatedData['users'] as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                @elseif (in_array($column, ['date_field'])) <!-- Замените на соответствующие колонки для выбора даты -->
                    <input type="date" name="{{ $column }}" id="{{ $column }}" required>
                @else
                    <input type="text" name="{{ $column }}" id="{{ $column }}" required>
                @endif
            @endif
        @endforeach
        <button type="submit">Сохранить</button>
    </form>
    <a href="{{ route('table_data', ['table' => $table]) }}" class="button">Назад</a>
</body>
</html>
