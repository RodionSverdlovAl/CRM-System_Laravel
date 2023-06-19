<!doctype html>
<html lang="en">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Web Site</title>
</head>
<body>
    <header class="container">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{route('posts.index')}}" class="nav-link" aria-current="page">Posts</a></li>
            <li class="nav-item"><a href="{{route('about.index')}}" class="nav-link">About</a></li>
            <li class="nav-item"><a href="{{route('contacts.index')}}" class="nav-link">Contacts</a></li>
            <li class="nav-item"><a href="{{route('workers.index')}}" class="nav-link">Workers</a></li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Зарегестрировать сотрудника</a>
                </li>
            @endif
        </ul>
    </header>
    <main>
        @yield('content')
    </main>

    <footer class="container d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">© 2023 Company, EbuchiySoft</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
        </ul>
    </footer>

</body>
</html>
