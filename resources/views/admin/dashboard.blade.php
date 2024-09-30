<x-layout>
    <div class="container-fluid text-center mt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 margin-class">Bentornato, Amministratore {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo di amministratore</h2>
                <x-requests-table :roleRequests="$adminRequests" role="amministratore" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo di revisore</h2>
                <x-requests-table :roleRequests="$revisorRequests" role="revisore" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo di redattore</h2>
                <x-requests-table :roleRequests="$writerRequests" role="redattore" />
            </div>
        </div>
    </div>
    <hr>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Tutti i tags</h2>
                @php
                    $title = 'tag';
                @endphp
                <x-metainfo-table :title="$title" :metaInfos="$tags" metaType="tags" />
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h2>Tutte le categorie</h2>
                    @php
                        $title = 'categoria';
                    @endphp
                    <form action="{{ route('admin.storeCategory') }}" method="POST" class="w-50 d-flex m-3">
                        @csrf
                        <input type="text" name="name" class="form-control me-2"
                            placeholder="Inserisci una nuova categoria">
                        <button type="submit" class="btn btn-outline-secondary">Inserisci</button>
                    </form>
                </div>
                <x-metainfo-table :title="$title" :metaInfos="$categories" metaType="categorie" />
            </div>
        </div>
    </div>
</x-layout>
