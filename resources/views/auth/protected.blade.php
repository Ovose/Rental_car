   <!-- не используется -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Защищённый ресурс</title>
</head>
<body>
    <h1>Защищённый ресурс</h1>
    <p>У вас есть доступ к этой странице, потому что вы вошли в систему.</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Выйти</button>
    </form>
</body>
</html>
