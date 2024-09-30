<x-layout>
    <div class="container-fluid text-center margin-class">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-4 mt-3 fw-bold">Tutti gli Articoli</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-evenly">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3 mt-3 ">
                    <div class="card" style="width: 18rem;">
                        <div class="position mt-2">
                            <img src="{{ Storage::url($article->img) }}" class="card-img-top imgCustom" alt="...">
                            <h5 class="card-title m-3 fw-bold">{{ $article->titolo }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-subtitle my-0">{{ $article->sottotitolo }}</p>
                            @if ($article->category)
                                <p class="small text- mt-3">Categoria:
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
                            {{-- <p class="small text-muted">Categoria: --}}
                            {{-- <a class="text-capitalize text-muted" --}}
                            {{-- href="{{ route('article.byCategory', $article->category) }}">{{ $article->category->name }}</a> --}}
                            {{-- </p> --}}
                            <p class="fs-5">Utente:
                                <a class="text-capitalize text-muted fw-bold"
                                    href="{{ route('article.byUser', $article->user) }}">{{ $article->user->name }}</a>
                            </p>
                            <p class="card-text text-truncate">{{ $article->body }}</p>
                            {{-- <p class="small text-muted my-0"> --}}
                                {{-- @foreach ($article->tags as $tag) --}}
                                    {{-- {{ $tag->name }} --}}
                                {{-- @endforeach --}}
                            {{-- </p> --}}
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <p>Inserito il {{ $article->created_at->format('d/m/y') }} <br>
                                    da {{ $article->user->name }}
                                </p>
                                <a href="{{ route('article.show', $article) }}"
                                    class="btn btn-botton text-white ">Leggilo</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>





















{{-- <x-layout>
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 margin-class">Tutti gli articoli</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ Storage::url($article->img) }}" class="card-img-top imgCustom" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->titolo }}</h5>
                            <p class="card-subtitle">{{ $article->sottotitolo }}</p>
                            <p class="card-text text-truncate">{{ $article->body }}</p>
                            <p class="small text-muted">Categoria:
                                <a class="text-capitalize text-muted" href="#">{{ $article->category->nome }}</a>
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p>Inserito il {{ $article->created_at->format('d/m/y') }} <br>
                                da {{ $article->user->nome }}
                            </p>
                            <a href="{{route('article.show', $article)}}" class="btn btn-outline-secondary">Leggilo</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout> --}}
