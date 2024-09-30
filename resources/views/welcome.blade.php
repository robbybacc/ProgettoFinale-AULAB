<x-layout>
    <div class="paddingAlert">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12 col-md-12 p-0 m-0">
                <div class="p-5 m-0 text-center" style="background-image: url('/img/header.jpg'); height: 70vh;">
                    <div class=mask>
                        <div class="d-flex justify-content-center align-items-center h-100 p-5 mt-5">
                            <div class="text-grey bg-image p-5">
                                <h1 class="mt-5 display-3 fw-bold" id="typewriter"></h1>
                                <h4 class="mb-3 display-5 " id="typewriter2"></h4>
                                <a data-mdb-ripple-init class="btn btn-outline-light btn-lg btn-botton pulse-hover"
                                    href="{{ route('article.create') }}" role="button">Inserisci un articolo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="containerArticle right-container">
        <h1 class="pt-5 display-3 fw-bold">Gli ultimi articoli</h1>
        <div class="articles">
            @foreach ($articles as $article)
                <div class="articolo2 articolo bg-white m-3" id="{{ $article->id }}"
                    data-title="{{ $article->titolo }}" data-subtitle="{{ $article->sottotitolo }}"
                    image='{{ $article->img }}' category="{{ $article->category->name }}"
                    user="{{ $article->user->name }}">
                    <div class=" card3 p-1">
                        <div class="position">
                            <img src="{{ Storage::url($article->img) }}" class="card-img-top imgCustom" alt="...">
                            <h5 class="card-title fw-bold m-3">{{ $article->titolo }}</h5>
                        </div>

                        <p class="card-subtitle m-3">{{ $article->sottotitolo }}</p>
                        @if ($article->category)
                            <div class="d-none" id="categoryId">{{ $article->category->id }}</div>
                            <p class="d-none small text-muted ">Categoria:
                                <a href="{{ route('article.byCategory', $article->category) }}"
                                    class="text-capitalize text-muted">{{ $article->category->name }}</a>
                            </p>
                        @else
                            <p class="small text-muted">Nessuna categoria</p>
                        @endif
                        <p class="d-none small text-muted my-0">
                        <div class="d-none m-3" id="tags">{{ $article->tags }}</div>
                        @foreach ($article->tags as $tag)
                            # {{ $tag->name }}
                        @endforeach
                        </p>
                        <div>
                            <div class="d-none" id="userId">{{ $article->user->id }}</div>
                            <p class=" d-none small text-muted">Utente:
                                <a class="text-capitalize text-muted fw-bold "
                                    href="{{ route('article.byUser', $article->user) }}">{{ $article->user->name }}</a>
                            </p>
                        </div>
                        <p class="card-text text-truncate hidden d-none">{{ $article->body }}</p>
                    </div>

                    {{-- <div class="separator"></div> --}}
                    <div class="footerArticle p-1 d-none">

                        <div class="dimensioneData d-none">
                            <p>Inserito il {{ $article->created_at->format('d/m/y') }} <br>
                                da {{ $article->user->name }}
                            </p>
                        </div>
                        <div class="d-none">
                            <a href="{{ route('article.show', $article) }}"
                                class=" dimensioneBottone btn btn-outline-light hidden d-none">Leggilo</a>
                        </div>


                    </div>

                </div>
            @endforeach
        </div>
        <div class="left-container">
        </div>

    </div>
    <div class="container-fluid text-black containerRoles pb-3 pt-5 bg-secondary-subtle">
        <div class="justify-content-center">
            <div class="col-12">
                <div class="titleFooter fw-bold">Ruoli che potrebbero interessarti</div>
                <br>
                <div class="titleJob">Lavora come amministratore</div>
                <div>Scegliendo di lavorare come amministratore, ti occuperai di gestire le richieste di lavoro e di
                    aggiungere e modificare le categorie.
                    <a href="{{ route('careers') }}" class="colorTextLink">Candidati</a>
                </div>
                <div class="titleJob">Lavora come revisore</div>
                <div>Scegliendo di lavorare come revisore, deciderai se un articolo può essere pubblicato o meno in
                    piattaforma
                    <a href="{{ route('careers') }}" class="colorTextLink">Candidati</a>
                </div>
                <div class="titleJob">Lavora come redattore</div>
                <div>Scegliendo di lavorare come redattore, potrai scrivere gli articoli che saranno pubblicati
                    <a href="{{ route('careers') }}" class="colorTextLink">Candidati</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="main.js"></script>
</x-layout>
