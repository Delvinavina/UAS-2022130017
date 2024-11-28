<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ url('/css/costum.css') }}" rel="stylesheet">
    <link href="{{ url('/css/index.css') }}" rel="stylesheet">
    <link href="{{ url('/css/hotel.css') }}" rel="stylesheet">
    <link href="{{ url('/css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg custom-container py-3 full-width" style="background-color: none; z-index: 3;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-light" href="{{ route('home') }}">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbarNav"
                aria-controls="myNavbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myNavbarNav">
                <div class="d-flex justify-content-between" style="width: 100%">
                    <ul class="navbar-nav d-flex justify-content-between custom-gap">
                        <li class="nav-item">
                            <a class="nav-link custom-color" aria-current="page" href="{{ route('hotels') }}">Find a
                                Hotel</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-flex custom-gap">
                        <li class="nav-item">
                            <button class="btn" style="background-color: #1d8974">
                                @auth
                                    <span class="fw-medium text-light"> {{ Auth::user()->name }} </span>
                                @endauth
                            </button>
                        </li>
                        <li class="nav-item">
                            <div class="btn-group dropstart">
                                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-list"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('reservations.index') }}">Booking</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    {{ $slot }}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
