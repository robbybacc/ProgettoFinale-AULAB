<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-1 margin-class">Accedi</h1>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 shadow-border-rounded">
                <form action="{{ route('login') }}" method="POST" class="card p-5 shadow">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="mariorossi@gmail.com"
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Inserisci password"
                            value="{{ old('password') }}">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4 d-flex justify-content-center flex-column align-items-center">
                        <button type="submit" class="btn btn-primary">Accedi</button>
                        <p class="mt-2">Non sei registrato? <a href="{{ route('register') }}">Registrati</a> </p>
                    </div>
            </div>
            </form>
        </div>
    </div>
</x-layout>
