@extends('layouts.app')
@section('customcss')
    <link href="{{asset("css/dashboard.css")}}" rel="stylesheet"/>
    <style>
        .nav-link {
            color: #000000 !important;
        }

        .nav-link:hover {
            color: #595858 !important;
        }

        .nav-link.active {
            color: var(--bs-nav-link-color) !important;
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
                        <x-dashboardnav current-page="dashboard"></x-dashboardnav>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Condividi</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Esporta</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-auto">
                        <div class="card rounded-0">
                            <div class="card-header text-white bg-dark rounded-0">
                                Utenti registrati <i class="bi bi-people-fill float-end"></i>
                            </div>
                            <div class="card-body rounded-0">
                                @foreach($utenti as $utente)
                                    <div class="card-text d-flex flex-row align-items-center">
                                        <div>{{$utente->name}}</div>
                                        <div
                                            class="text-muted small ms-5">({{$utente->email}})
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card rounded-0 mt-4">
                            <div class="card-header text-white bg-dark rounded-0">
                                TOTALI <span class="badge text-bg-secondary float-end">{{$posts->count()}}</span>
                            </div>
                            <div class="card-body rounded-0">
                                <div class="card-title fw-bolder text-black d-flex flex-row align-items-center">
                                    <div>
                                        <i
                                            class="bi bi-journal-text text-black fs-2 me-4"></i>
                                    </div>
                                    <div>Post inseriti</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg">
                        <div class="card rounded-0">
                            <div class="card-header text-white bg-dark rounded-0">
                                Ultimi post inseriti <i class="bi bi-journal-bookmark-fill float-end"></i>
                            </div>
                            <div class="card-body rounded-0">
                                @foreach($posts->take(3) as $post)
                                    <div class="card-text d-flex flex-row align-items-center">
                                        <div>{{$post->title}}</div>
                                        <div
                                            class="text-muted small ms-3">({{$post->data}})
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@section("customscript")
    <script src="{{asset("js/dashboard.js")}}"></script>
@endsection
