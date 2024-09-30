<x-layout>
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <div class="col-12 text-center p-3">
                <h1 class="display-4 margin-class">Tutti gli Articoli</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-6 col-md-4 d-flex flex-column justify-content-center align-items-center borderCardShow">
                <img src="{{ Storage::url($article->img) }}" class="img-fluid imgCustom"
                    alt="Immagine dell'articolo: {{ $article->titolo }}">
                <div class="text-center">
                    <h2 class="mt-3">{{ $article->sottotitolo }}</h2>
                    <p class="text-muted my-0">
                        @foreach ($article->tags as $tag)
                           # {{ $tag->name }}
                        @endforeach
                    </p>
                    @if ($article->category)
                        <p class="fs-5 mt-2">Categoria:
                            <a href="{{ route('article.byCategory', $article->category) }}"
                                class="text-capitalize fw-bold text-muted">{{ $article->category->name }}</a>
                        </p>
                    @else
                        <p class="small text-muted">Nessuna categoria</p>
                    @endif
                    {{-- <p class="fs-5">Categoria: --}}
                    {{-- <a class="text-capitalize text-muted fw-bold" --}}
                    {{-- href="{{ route('article.byCategory', $article->category) }}">{{ $article->category->name }}</a> --}}
                    {{-- </p> --}}
                    <p class="fs-5">Utente:
                        <a class="text-capitalize text-muted fw-bold"
                            href="{{ route('article.byUser', $article->user) }}">{{ $article->user->name }}</a>
                    </p>
                    <div class="text-muted mt-3">
                        <p>Publicato il {{ $article->created_at->format('d/m/y') }} da {{ $article->user->name }} </p>
                    </div>
                </div>
                <hr>
                <p class="card-text">{{ $article->body }}</p>
                @if (Auth::user() && Auth::user()->is_revisor)
                    <div class="container my-5">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-evenly">
                                <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bottonShow  bg-success">Accetta articolo</button>
                                </form>
                                <form action="{{ route('revisor.rejectArticle', $article) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bottonShow bg-danger">Rifiuta articolo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="text-center">
                    <a href="{{ route('article.index') }}" class="text-secondary">Vai alla lista degli articoli</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
