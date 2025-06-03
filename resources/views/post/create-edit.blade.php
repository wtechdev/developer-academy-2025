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
                                $currentPage = "createpost";
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
                        Post
                    </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="{{route("post.index")}}" class="btn btn-sm btn-secondary"><i
                                    class="bi bi-skip-start-fill me-1"></i> Elenco Post</a>
                        </div>
                    </div>
                </div>
                @if ($azione=="create")
                    <form action="{{route($route)}}" method="post" enctype="multipart/form-data">
                        @else
                            <form action="{{route($route,["post"=>$id_post])}}" method="post"
                                  enctype="multipart/form-data">
                                @endif
                                @csrf
                                @if($azione == "edit")
                                    @method("PATCH")
                                @endif
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label class="form-label">Titolo <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="Titolo"
                                               value="{{$campi["title"]}}">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label class="form-label">Testo <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="text"
                                                  rows="4">{{$campi["text"]}}</textarea>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="featured"
                                                   id="featured">
                                            <label class="form-check-label" for="featured">
                                                Post in evidenza <small class="text-muted">(SOLO 1 POST DEVE ESSERE
                                                    SEGNALATO IN EVIDENZA)</small>
                                            </label>
                                        </div>
                                    </div>
                                    @if($azione == "edit")
                                        <div class="mb-3 col-12">
                                            @if($post->getFirstMedia('immagine'))
                                                @php
                                                    $url_image = $post->getFirstMediaUrl('immagine');
                                                @endphp
                                                <a href="{{$url_image}}"
                                                   class="btn btn-primary btn-sm" target="_blank"><i
                                                        class="bi bi-image-fill"></i>
                                                    mostra</a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        form="form-image-destroy"><i
                                                        class="bi bi-image-fill"></i>
                                                    elimina
                                                </button>
                                            @else
                                                <div class="mb-3 col-12">
                                                    <label for="image" class="form-label">Immagine <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control form-control-sm" type="file" id="image"
                                                           name="image">
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <div class="mb-3 col-12">
                                            <label for="image" class="form-label">Immagine <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control form-control-sm" type="file" id="image"
                                                   name="image">
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary float-end mt-4"><i
                                        class="bi bi-floppy-fill me-1"></i> Salva
                                </button>
                            </form>
                            @if ($azione!="create")
                                <form action="{{route("post.image.destroy", $post->id)}}" method="post"
                                      id="form-image-destroy">
                                    @csrf
                                    @method('DELETE')
                                </form>
                @endif
            </main>
        </div>
    </div>
@endsection

@section("customscript")
    <script src="{{asset("js/dashboard.js")}}"></script>
@endsection
