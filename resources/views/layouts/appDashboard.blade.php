<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dashboard/script.js') }}" defer></script>
    <script src="{{ asset('js/dashboard/bootstrap-tagsinput.min.js') }}" defer></script>
    <script src="{{ asset('js/fontawesome/all.min.js') }}" defer></script>

    @stack('script')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/all.min.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div id="side_navigation">
            <a href="javascript:void(0)" class="closebtn">&times;</a>
            @forelse($permissions as $key => $permission)
                @if ($permission['actions']['is_view'])
                    <li>
                        <a href="{{ url('dashboard/' . $permission->slug . '?key=' . $permission->slug) }}">
                            <span class="listName">{{ $permission->name }}</span>
                        </a>
                    </li>
                @endif
            @empty
                Empty!
            @endforelse
        </div>
        <main>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="open_side_navigation">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                </div>

                                <a href="{{ url('home') }}">
                                    <b style="font-size: 25px;">VacationTest</b>
                                    <sub>Панель приборов</sub>
                                </a>

                                <ul class="navbar-nav">
                                    <li>
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                                Выйти
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            @stack('modals')
        </main>
    </div>
</body>

</html>
