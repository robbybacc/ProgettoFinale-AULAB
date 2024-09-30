<table class="table table-striped table-hover">
    <thead class="">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tags</th>
            <th scope="col">Inserito il</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->titolo }}</td>
                <td>{{ $article->sottotitolo }}</td>
                <td>{{ $article->category->name ?? 'Nessuna categoria' }}</td>
                <td>
                    @foreach ($article->tags as $tag)
                        #{{ $tag->name }}
                    @endforeach
                </td>

                <td>{{ $article->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('article.show', $article) }}" class="btn btn-secondary">Leggi l'articolo</a>
                    <a href="{{route('article.edit', $article)}}" class="btn btn-warning text-white">Modifica</a>
                    <form action="{{route('article.destroy', $article)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
