<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background-color: #f4f4f4;
        }
        .message {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .button {
            background-color: #e74c3c; /* Красный цвет */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }
        .button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="message">Добро пожаловать на главную страницу!</div>
    <a href="{{ route('about') }}" class="button">Перейти на страницу "О нас"</a>
    <a href="{{ route('tables') }}" class="button">Список таблиц</a>
</body>
</html>
