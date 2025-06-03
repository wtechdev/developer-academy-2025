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
                        @php
                            if($azione=="create") {
                                $currentPage = "createuser";
                            } else {
                                $currentPage = "";
                            }
                        @endphp
                        <x-dashboardnav :current-page="$currentPage"></x-dashboardnav>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">
                        @if($azione=="create")
                            Aggiunta
                        @else
                            Modifica
                        @endif
                        Utenti
                    </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="{{route("user.index")}}" class="btn btn-sm btn-secondary"><i
                                    class="bi bi-skip-start-fill me-1"></i> Elenco Utenti</a>
                        </div>
                    </div>
                </div>
                @if ($azione=="create")
                    <form action="{{route($route)}}" method="post" autocomplete="off">
                        @else
                            <form action="{{route($route,["user"=>$id_user])}}" method="post">
                                @endif
                                @csrf
                                @if($azione == "edit")
                                    @method("PATCH")
                                @endif
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label class="form-label">Nominativo <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Nome"
                                               value="{{$campi["name"]}}">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="text" name="email" class="form-control"
                                               placeholder="Email"
                                               value="{{$campi["email"]}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-end mt-4"><i
                                        class="bi bi-floppy-fill me-1"></i> Salva
                                </button>
                            </form>
            </main>
        </div>
    </div>
@endsection

@section("customscript")
    <script src="{{asset("js/dashboard.js")}}"></script>
@endsection
