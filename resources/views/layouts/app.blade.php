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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    <link href="{{asset("css/styles.css")}}" rel="stylesheet"/>
    @yield('customcss')

</head>
<body>
<div id="app">
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark"><a
            class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white"
            href="{{route("index")}}">{{ config('app.name', 'Laravel') }}</a>
        <div class="float-end px-3">
            <a class="btn btn-dark d-flex flex-row align-content-center"
               href="{{ route('logout') }}"
               id="btn-logout">
                <i class="bi bi-box-arrow-right fs-6 me-1"></i> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </header>

    <main class="py-4">
        @if(session()->has('success'))
            <div class="alert alert-success mx-4 mb-3 alert-dismissible fade show small">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        @endif

        @if(session()->has('alert'))
            <div class="alert alert-danger mx-4 mb-3 alert-dismissible fade show small">
                {{ session()->get('alert') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger mx-4 mb-3 alert-dismissible fade show small">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        @yield('content')
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById("btn-logout").addEventListener("click", function (event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    })
</script>
@yield('customscript')
</body>
</html>
