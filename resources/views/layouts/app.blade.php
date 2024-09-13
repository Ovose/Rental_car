<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body>
    <header>
    
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Главная</a></li>
                
              
                @guest
                    <li><a href="{{ route('login') }}">Войти</a></li>
                    <li><a href="{{ route('register') }}">Регистрация</a></li>
                @endguest
                
                @auth
                    <li><a href="{{ route('dashboard') }}">Панель управления</a></li>
                    <li><a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </ul>
        </nav>
    </header>

 
    @yield('content')

   
</body>
</html>
