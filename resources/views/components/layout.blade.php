<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="{{$description}}"/>
    <meta name="author" content="Developer Academy 2025"/>
    <title>{{$title}}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset("favicon.ico")}}"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset("css/styles.css")}}" rel="stylesheet"/>
</head>
<body>
<!-- Responsive navbar-->
@if(isset($navbar))
    {{ $navbar }}
@endif
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Come Creare un Blog con Laravel e Bootstrap 5</h1>
            <p class="lead mb-0">Scopri passo dopo passo come realizzare un blog moderno utilizzando Laravel per il
                backend e Bootstrap 5 per il frontend. In questa guida, esploreremo l'integrazione di autenticazione, la
                creazione di un CMS semplice e l'ottimizzazione per dispositivi mobili. Perfetto per chi inizia con
                Laravel</p>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    {{ $slot }}
</div>
<!-- Footer-->
<footer class="py-5 bg-dark">
    @include("elements.footer")
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{asset("js/scripts.js")}}"></script>
</body>
</html>
