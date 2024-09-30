<div class="card" style="width: 18rem;">
    <img src="{{Storage::url($article->img)}}" class="card-img-top imgCustom" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$article->titolo}}</h5>
      <p class="card-text">{{$article->sottotitolo}}</p>
      <p  class="card-text text-truncate">{{$article->body}}</p>
      <p class="card-text fw-semibold"> Publicato da: {{$article->user->name}}</p>
    </div>
  </div>
   