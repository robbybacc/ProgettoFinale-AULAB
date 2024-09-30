<table class="table table-striped table-hover">
    <thead class="">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Redattore</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->titolo }}</td>
                <td>{{ $article->sottotitolo }}</td>
                <td>{{ $article->user->name }}</td>
                <td>
                    @if (is_null($article->is_accepted))
                        <a href="{{ route('article.show', $article) }}">
                        <button type="submit" class="bottonShow  bg-primary">Leggi l'articolo</button></a>
                    @else
                        <form action="{{ route('revisor.undoArticle', $article) }}" method="POST">
                            @csrf
                            <button type="submit" class="bottonShow  bg-warning">Riporta in revisione</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
