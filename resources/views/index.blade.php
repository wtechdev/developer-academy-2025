<x-layout title="Developer Academy 2025" description="Corso Developer Academy 2025 - Laravel e Bootstrap 5">
    <x-slot name="navbar">
        <x-navbar current-page="blog"></x-navbar>
    </x-slot>

    <div class="row">
        <!-- Post -->
        <div class="col-lg-8">
            @if($first_post !== null)
                <!-- Post in evidenza-->
                <div class="card mb-4">
                    <a href="#">
                        @if ($first_post->hasMedia('immagine'))
                            <img class="card-img-top" src="{{$first_post->getFirstMediaUrl('immagine')}}"
                                 alt="{{$first_post->title}}"/>
                        @else
                            <img class="card-img-top" src="{{asset("image/noimage.jpg")}}"
                                 alt="{{$first_post->title}}"/>
                        @endif
                    </a>
                    <div class="card-body">
                        <div
                            class="small text-muted">{{\Carbon\Carbon::parse($first_post->date)->translatedFormat('j F, Y')}}</div>
                        <h2 class="card-title">{{$first_post->title}}</h2>
                        <p class="card-text">{{$first_post->text}}</p>
                        <a class="btn btn-primary" href="#!">Leggi articolo 📂</a>
                    </div>
                </div>
            @endif
            @if($posts->isNotEmpty())
                <!-- Riga per post non in evidenza -->
                <div class="row">
                    @php
                        // inizializzo un contatore per inserire le colonne ogni 2
                        $count = 0;
                    @endphp
                    @foreach($posts as $post)
                        @if (($count == 0) || (($count % 2) == 0))
                            <div class="col-lg-6"> @endif
                                <!-- Blog post-->
                                <div class="card mb-4">
                                    @if ($post->hasMedia('immagine'))
                                        <img class="card-img-top" src="{{$post->getFirstMediaUrl('immagine')}}"
                                             alt="{{$post->title}}"/>
                                    @else
                                        <img class="card-img-top" src="{{asset("image/noimage.jpg")}}"
                                             alt="{{$post->title}}"/>
                                    @endif
                                    <div class="card-body">
                                        <div
                                            class="small text-muted">{{\Carbon\Carbon::parse($post->date)->translatedFormat('j F, Y')}}</div>
                                        <h2 class="card-title h4">{{$post->title}}</h2>
                                        <p class="card-text">{{$post->text}}</p>
                                        <a class="btn btn-primary" href="#!">Leggi articolo 📂</a>
                                    </div>
                                </div>
                                @if (($count == 0) || (($count % 2) == 0))
                            </div>
                        @endif
                    @endforeach
                </div>
                {{$posts->links()}}
            @endif
        </div>
        <!-- Barra laterale -->
        <div class="col-lg-4">
            <!-- Ricerca -->
            <div class="card mb-4">
                <div class="card-header">Ricerca</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Inserisci termini di ricerca..."
                               aria-label="Inserisci termini di ricerca..." aria-describedby="button-search"/>
                        <button class="btn btn-primary" id="button-search" type="button">Invia</button>
                    </div>
                </div>
            </div>
            <!-- Categorie -->
            <div class="card mb-4">
                <div class="card-header">Categorie</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Sviluppo Web</a></li>
                                <li><a href="#!">Laravel</a></li>
                                <li><a href="#!">Bootstrap</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">Questo spazio può essere utilizzato per inserire un breve profilo dell'autore, un
                    form di newsletter o annunci promozionali. Personalizzalo facilmente con i componenti card di
                    Bootstrap 5!
                </div>
            </div>
        </div>
    </div>
</x-layout>
