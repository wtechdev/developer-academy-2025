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
                        <x-dashboardnav current-page="indexpost"></x-dashboardnav>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">
                        Elenco Post
                    </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="{{route("post.create")}}" class="btn btn-sm btn-success me-1"><i
                                class="bi bi-file-earmark-plus-fill me-1"></i> Crea Post</a>
                        <a href="{{route("home")}}" class="btn btn-sm btn-secondary"><i
                                class="bi bi-skip-start-fill me-1"></i> Dashboard</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data</th>
                        <th scope="col">Titolo</th>
                        <th scope="col" class="col-text">Testo</th>
                        <th scope="col">Immagine</th>
                        <th scope="col">Utente</th>
                        <th scope="col">Operazioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{\Carbon\Carbon::parse($post->date)->format("d/m/Y H:i")}}</td>
                            <td>{{$post->title}}</td>
                            <td class="col-text">{{$post->text}}</td>
                            <td>@if($post->getFirstMediaUrl('immagine'))
                                    <a href="{{$post->getFirstMediaUrl('immagine')}}"
                                       class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 pb-2"
                                       target="_blank"><i class="bi bi-image-fill"></i> mostra</a>
                                @endif</td>
                            <td>{{$post->user->name}}</td>
                            <td>
                                <div class="d-flex flex-row gap-2">
                                    <a href="{{route("post.show",$post->id)}}"
                                       class="btn btn-secondary btn-sm d-inline-flex align-items-center gap-1 pb-2"><i
                                            class="bi bi-download"></i> mostra</a>
                                    <a href="{{route("post.edit",$post->id)}}"
                                       class="btn btn-secondary btn-sm d-inline-flex align-items-center gap-1 pb-2"><i
                                            class="bi bi-pencil-square"></i> modifica</a>
                                    <button type="button"
                                            class="btn btn-danger btn-sm d-inline-flex align-items-center gap-1 pb-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{$post->id}}">
                                        <i class="bi bi-trash-fill"></i> elimina
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{$post->id}}" tabindex="-1"
                                     aria-labelledby="deleteModal{{$post->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma
                                                    eliminazione</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route("post.destroy", $post->id)}}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <p>Sei sicuro di voler eliminare il post {{$post->title}}?</p>
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
                {{$posts->links()}}
            </main>
        </div>
    </div>
@endsection

@section("customscript")
    <script src="{{asset("js/dashboard.js")}}"></script>
@endsection
