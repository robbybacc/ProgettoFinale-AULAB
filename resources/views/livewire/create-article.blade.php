{{-- <div class="col-12 col-md-8">
    <form action="{{route('article.store')}}" method="POST" class="card p-5 shadow" enctype="multipart/form-data" wire:submit.prevent="createArticle">
        @csrf
        <div class="mb-3 mt-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" name="titolo" id="titolo" class="form-control" placeholder="Ex. Nome dell'articolo" wire:model.blur="titolo" value="{{old('titolo')}}">
            @error('titolo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sottotitolo" class="form-label">Sottotitolo</label>
            <input type="text" name="sottotitolo" id="sottotitolo" class="form-control"
                placeholder="Ex. Quello che ti ha più colpito a riguardo" wire:model.blur="sottotitolo"
                value="{{ old('sottotitolo') }}">
            @error('sottotitolo')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select name="category" id="category" class="form-control">
                <option selected disabled>Seleziona una categoria</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->nome}}</option>
                @endforeach
            </select>
            @error('category')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Corpo del testo</label>
            <textarea name="body" class="form-control" id="body" cols="30" rows="7" placeholder="Descrivi l'articolo" wire:model.blur="body">{{old('body')}}</textarea>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Immagine</label>
            <input type="file" name="img" id="img" class="form-control" placeholder="Immagine" wire:model.blur="img">
            @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-botton mb-3">Inserisci</button>
    </form>
</div> --}}
