<x-layout>
    <div class="container-fluid text-center">
        <div class="row justify-content-center mt-4">
            <div class="col-12 text-center">
                <h1 class="display-4 margin-class">Inserisci il tuo articolo</h1>
            </div>
        </div>
        @if (session('message'))
            <div class="alert alert-success my-0">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{ route('article.store') }}" method="POST" class="card p-5 shadow"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="titolo" class="form-label">Titolo</label>
                        <input type="text" name="titolo" class="form-control" id="titolo"
                            placeholder="Ex. Nome dell'articolo" value="{{ old('titolo') }}">
                        @error('titolo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sottotitolo" class="form-label">Sottotitolo</label>
                        <input type="text" name="sottotitolo" class="form-control" id="sottotitolo"
                            placeholder="Ex. Quello che ti ha più colpito a riguardo" value="{{ old('sottotitolo') }}">
                        @error('sottotitolo')
                            <span class="text-alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Immagine</label>
                        <input type="file" name="img" class="form-control" id="img"
                            placeholder="Ex. Immagine">
                        @error('img')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select name="category" id="category" class="form-control">
                            <option selected disabled>Seleziona categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo</label>
                        <textarea name="body" id="body" cols="30" rows="7" class="form-control"></textarea>
                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" name="tags" class="form-control" id="tags" value="{{old('tags')}}">
                        <span class="small text-muted fst-italic">Dividi ogni tag con una virgola</span>
                        @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mt-3 d-flex justify-content-center flex-column align-items-center">
                        <button type="submit" class="btn btn-botton mb-3">Inserisci articolo</button>
                        <a href="{{ route('home') }}" class="text-secondary mt-2">Torna alla home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
