<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link gap-2 @if($currentPage == "dashboard") active @endif fs-6"
           aria-current="page" href="{{route("home")}}">
            <i class="bi bi-house-gear-fill"></i>
            Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link gap-2 @if($currentPage == "createpost") active @endif fs-6"
           aria-current="page" href="{{route("post.create")}}">
            <i class="bi bi-file-earmark-plus-fill"></i>
            Crea Post
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link gap-2 @if($currentPage == "indexpost") active @endif fs-6"
           aria-current="page" href="{{route("post.index")}}">
            <i class="bi bi-file-earmark-text-fill"></i>
            Elenco Post
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link gap-2 @if($currentPage == "createuser") active @endif fs-6"
           aria-current="page" href="{{route("user.create")}}">
            <i class="bi bi-person-plus-fill"></i>
            Crea Utente
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link gap-2 @if($currentPage == "indexuser") active @endif fs-6"
           aria-current="page" href="{{route("user.index")}}">
            <i class="bi bi-person-lines-fill"></i>
            Elenco Utenti
        </a>
    </li>
</ul>
