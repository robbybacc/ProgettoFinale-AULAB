<x-layout>
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-4 margin-class">Tutti gli Articoli per {{ $query }}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-8">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ Storage::url($article->img) }}" class="card-img-top imgCustom"
                            alt="Immagine dell'articolo: {{ $article->titolo }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->titolo }}</h5>
                            <p class="card-subtitle">{{ $article->sottotitolo }}</p>
                            @if ($article->category)
                                <p class="small text-muted">Categoria:
                                    <a href="{{ route('article.byCategory', $article->category) }}"
                                        class="text-capitalize text-muted">{{ $article->category->name }}</a>
                                </p>
                            @else
                                <p class="small text-muted">Nessuna categoria</p>
                            @endif
                            <p class="small text-muted my-0">
                                @foreach ($article->tags as $tag)
                                    # {{ $tag->name }}
                                @endforeach
                            </p>
                            {{-- <p class="small text-muted">Categoria:
                                <a class="text-capitalize text-muted"
                                    href="{{ route('article.byCategory', $article->category) }}">{{ $article->category->name }}</a>
                            </p> --}}
                        </div>
                        <p class=" text-muted my-0">
                            @foreach ($article->tags as $tag)
                                {{ $tag->name }}
                            @endforeach
                        </p>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p>Redatto il {{ $article->created_at->format('d/m/y') }} <br> da <a class="text-muted"
                                    href="{{ route('article.byUser', $article->user) }}">{{ $article->user->name }}</a>
                            </p>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-outline-secondary">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
