<x-layout>
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-4 margin-class">Modifica l'articolo</h1>
            </div>
        </div>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{route('article.update', $article)}}" method="POST" class="card p-5 shadow" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 mt-3">
                        <label for="titolo" class="form-label">Titolo</label>
                        <input type="text" name="titolo" class="form-control" id="titolo"
                            placeholder="Ex. Nome dell'articolo" value="{{$article->titolo}}">
                        @error('titolo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sottotitolo" class="form-label">Sottotitolo</label>
                        <input type="text" name="sottotitolo" class="form-control" id="sottotitolo"
                            placeholder="Ex. Quello che ti ha più colpito a riguardo" value="{{$article->sottotitolo}}">
                        @error('sottotitolo')
                            <span class="text-alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Immagine attuale</label>
                        <img src="{{ Storage::url('$article->image') }}" alt="{{ $article->titolo }}"
                            class="w-50 d-flex">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Nuova immaggine</label>
                        <input type="file" name="img" class="form-control" id="img">
                        @error('img')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select name="category" id="category" class="form-control">
                            <option selected disabled>Seleziona categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"@if ($article->category_id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo</label>
                        <textarea name="body" id="body" cols="30" rows="7" class="form-control">{{$article->body}}</textarea>
                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" name="tags" class="form-control" id="tags"
                            value="{{$article->tags->implode('name', ',') }}">
                        <span class="small text-muted fst-italic">Dividi ogni tag con una virgola</span>
                        @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3 d-flex justify-content-center flex-column align-items-center">
                        <button type="submit" class="btn btn-botton mb-3">Modifica articolo</button>
                        <a href="{{ route('home') }}" class="text-secondary mt-2">Torna alla home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
