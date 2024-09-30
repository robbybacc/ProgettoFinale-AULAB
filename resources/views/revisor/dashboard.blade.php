<x-layout>
    <div class="container-fluid text-center pt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 margin-class">Bentornato, Revisore {{ Auth::user()->name }}</h1>
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
                <h2>Articoli da revisionare</h2>
                <x-articles-table :articles="$unrevisionedArticles"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli publicati</h2>
                <x-articles-table :articles="$acceptedArticles"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli non idonei</h2>
                <x-articles-table :articles="$rejectedArticles"/>
            </div>
        </div>
    </div>
</x-layout>
