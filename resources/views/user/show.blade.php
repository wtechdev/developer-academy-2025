@extends('layouts.app')
@section('customcss')
    <link href="{{asset("css/dashboard.css")}}" rel="stylesheet"/>
    <style>
        .date {
            font-size: 0.8rem;
            color: #adb5bd !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary text-black">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                     aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header"><h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 py-lg-3 overflow-y-auto">
                        <x-dashboardnav current-page=""></x-dashboardnav>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">
                        Visualizza Utente
                    </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="{{route("user.index")}}" class="btn btn-sm btn-secondary"><i
                                    class="bi bi-skip-start-fill me-1"></i> Elenco Utenti</a>
                        </div>
                    </div>
                </div>
                <div class="card w-50">
                    <div class="card-header">
                        {{$user->name}}
                        <a href="{{route("password.request",["email" => $user->email])}}"
                           class="btn btn-sm btn-primary float-end"><i
                                class="bi bi-key-fill"></i> Reset password</a>
                    </div>
                    <div class="card-body">
                        <div class="date mb-2">
                            <i class="bi bi-calendar4"></i> {{\Carbon\Carbon::parse($user->created_at)->format("d/m/Y H:i")}}
                        </div>
                        <p class="card-text">{{$user->email}}</p>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@section("customscript")
    <script src="{{asset("js/dashboard.js")}}"></script>
@endsection
