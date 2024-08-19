<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Данные таблицы {{ $table }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            overflow-x: auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
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
        .button-group {
            margin: 10px 0;
        }
        form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>Данные таблицы {{ $table }}</h1>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        @foreach ($row as $cell)
                            <td>{{ $cell }}</td>
                        @endforeach
                        <td class="button-group">
                            <a href="{{ route('edit_row', ['table' => $table, 'id' => $row->id]) }}" class="button">Редактировать</a>
                            <form action="{{ route('delete_row', ['table' => $table, 'id' => $row->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="button" style="background-color: darkred;">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('create_row', ['table' => $table]) }}" class="button">Добавить данные</a>
    <a href="{{ route('tables') }}" class="button">Назад</a>
</body>
</html>
