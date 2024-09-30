<x-layout>
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 margin-class text-capitalize"> Articoli di {{ $category->name }}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-evenly">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ Storage::url($article->img) }}" class="card-img-top imgCustom" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->titolo }}</h5>
                            <p class="card-subtitle">{{ $article->sottotitolo }}</p>
                            <p class="card-text text-truncate">{{ $article->body }}</p>
                            <p class="text-muted my-0">
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
                            {{-- @foreach ($article->tags as $tag)
                                {{ $tag->name }}
                            @endforeach --}}
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p>Inserito il {{ $article->created_at->format('d/m/y') }} <br>
                                da {{ $article->user->name }}
                            </p>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-outline-secondary">Leggilo</a>
                        </div>
                    </div>
                   
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
