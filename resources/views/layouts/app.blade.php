<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <header class="bg-dark py-2 py-md-3">
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between gap-2 gap-md-1">
                <a class="text-light text-decoration-none fs-4" href="{{route('index')}}">НА ГЛАВНУЮ</a>
                @auth
                <div class="d-flex flex-column align-items-center">
                    <span class="bg-primary fs-6 text-light px-2 rounded-pill">
                        {{auth()->user()->points}}
                    </span>
                    <span class="login text-light fs-6">
                        {{auth()->user()->email}}
                    </span>
                </div>
                @endauth

                <div>
                    <livewire:cart-icon />

                    @guest
                    <a class="btn" href="{{route('login')}}" title="Войти">
                        <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.00098 11.999L16.001 11.999M16.001 11.999L12.501 8.99902M16.001 11.999L12.501 14.999" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.3531 21.8897 19.1752 21.9862 17 21.9983M9.00195 17C9.01406 19.175 9.11051 20.3529 9.87889 21.1213C10.5202 21.7626 11.4467 21.9359 13 21.9827" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                    @endguest

                    @auth
                    <!-- Кнопка выйти -->
                    <button class="btn" title="Выйти" type="submit" form="logout_form">
                        <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 4.5H8C5.64298 4.5 4.46447 4.5 3.73223 5.23223C3 5.96447 3 7.14298 3 9.5V14.5C3 16.857 3 18.0355 3.73223 18.7678C4.46447 19.5 5.64298 19.5 8 19.5H9" stroke="#fff" stroke-width="1.5" />
                            <path d="M9 6.4764C9 4.18259 9 3.03569 9.70725 2.4087C10.4145 1.78171 11.4955 1.97026 13.6576 2.34736L15.9864 2.75354C18.3809 3.17118 19.5781 3.37999 20.2891 4.25826C21 5.13652 21 6.40672 21 8.94711V15.0529C21 17.5933 21 18.8635 20.2891 19.7417C19.5781 20.62 18.3809 20.8288 15.9864 21.2465L13.6576 21.6526C11.4955 22.0297 10.4145 22.2183 9.70725 21.5913C9 20.9643 9 19.8174 9 17.5236V6.4764Z" stroke="#fff" stroke-width="1.5" />
                            <path d="M12 11V13" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </button>

                    <form class="d-none" method="POST" action="{{route('logout')}}" id="logout_form">
                        @csrf
                    </form>
                    @endauth

                </div>

            </div>
        </header>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
