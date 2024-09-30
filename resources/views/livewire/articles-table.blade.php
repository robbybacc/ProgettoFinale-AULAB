{{-- 
@foreach ($articles as $article)
<div class="card mt-5" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="..." class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{$article->titolo}}</h5>
          <p class="card-text"> {{$article->sottotitolo}}<small class="text-body-secondary"></small></p>
          <p class="card-text">{{$article->body}}</p>
          
        </div>
      </div>
    </div>
  </div>
  @endforeach  --}}




{{-- 
 <div>
    <table class="table border table-dark table-striped my-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Body</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <th scope="row">{{$article->id}}</th>
                <td>{{$article->titolo}}</td>
                <td>{{$article->sottotitolo}}</td>
                <td>{{$article->body}}</td>
                <td>{{$article->img}}</td>
                <td>
                    <button wire:click="deleteArticle({{$article->id}})" class="btn btn-danger">Elimina</button>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
</div>  --}}
















 
