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

        .col-text {
            max-width: 400px !important;
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
                        <x-dashboardnav current-page="indexuser"></x-dashboardnav>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">
                        Elenco Utenti
                    </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="{{route("user.create")}}" class="btn btn-sm btn-success me-1"><i
                                class="bi bi-file-earmark-plus-fill me-1"></i> Crea Utente</a>
                        <a href="{{route("home")}}" class="btn btn-sm btn-secondary"><i
                                class="bi bi-skip-start-fill me-1"></i> Dashboard</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nominativo</th>
                        <th scope="col">Email</th>
                        <th scope="col">Data</th>
                        <th scope="col">Operazioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{\Carbon\Carbon::parse($user->created_at)->format("d/m/Y H:i")}}</td>
                            <td>
                                <div class="d-flex flex-row gap-2">
                                    <a href="{{route("user.show",$user->id)}}"
                                       class="btn btn-secondary btn-sm d-inline-flex align-items-center gap-1 pb-2"><i
                                            class="bi bi-download"></i> mostra</a>
                                    <a href="{{route("user.edit",$user->id)}}"
                                       class="btn btn-secondary btn-sm d-inline-flex align-items-center gap-1 pb-2"><i
                                            class="bi bi-pencil-square"></i> modifica</a>
                                    <button type="button"
                                            class="btn btn-danger btn-sm d-inline-flex align-items-center gap-1 pb-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{$user->id}}">
                                        <i class="bi bi-trash-fill"></i> elimina
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1"
                                     aria-labelledby="deleteModal{{$user->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma
                                                    eliminazione</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route("user.destroy", $user->id)}}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <p>Sei sicuro di voler eliminare l'utente {{$user->name}}?</p>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Annulla
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$users->links()}}
            </main>
        </div>
    </div>
@endsection

@section("customscript")
    <script src="{{asset("js/dashboard.js")}}"></script>
@endsection
