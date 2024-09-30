<x-layout>
    <div class="container-fluid paddingAlert">
        @if (session('mess'))
            <div class="alert alert-success">
                {{ session('mess') }}
            </div>
        @endif
    </div>
    <div class="container-fluid text-center">
        <div class="row justify-content-center mt-4">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold">Lavora con noi</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{ route('careers.submit') }}" method="POST" class="card p-5 shadow">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="role" class="form-label">Per quale ruolo ti stai candidando?</label>
                        <select name="role" class="form-control" id="role">
                            <option value="" selected disabled>Seleziona il ruolo</option>
                            @if (!Auth::user()->is_admin)
                                <option value="admin">Amministratore</option>
                            @endif
                            @if (!Auth::user()->is_revisor)
                                <option value="revisor">Revisore</option>
                            @endif
                            @if (!Auth::user()->is_writer)
                                <option value="writer">Redattore</option>
                            @endif
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ Auth::user()->email }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Spiega il motivo per il quale pensi di essere adatto a
                            questo ruolo</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control"
                            placeholder="Raccontaci brevemente di te">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-3 d-flex justify-content-center flex-column align-items-center">
                        <button type="submit" class="btn btn-botton mb-3 text-white bottonShow">Invia candidatura</button>
                        <a href="{{ route('home') }}" class="text-secondary mt-2">Torna alla home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
