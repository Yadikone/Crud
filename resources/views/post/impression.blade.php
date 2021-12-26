@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <style>
                img{
                  border-radius: 50%;
                }
              </style>
                <div class="card-header">
                              <div class="d-flex justify-content-between" >
                        <div>Voir Cartes </div>
                          <div><a href="{{route('posts.index')}}" class="btn btn-success">Retour</a></div>
                    </div>
                </div>

                <div class="card-body">

 <table class="table table-striped">
    <thead>
      <tr>
        <th width="20%">Nom de domaine</th>
        <th width="80%"> Valeur</th>
     
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Id</td>
        <td>{{$post->id}}</td>
      
      </tr>
      <tr>
        <td>Prénom</td>
        <td>{{$post->prenom}}</td>
      
      </tr>
      <tr>
        <td>Nom</td>
        <td>{{$post->nom}}</td>
      
      </tr>
      <tr>
        <td>Numéro Contrats</td>
        <td>{{$post->numcontrats}}</td>
      
      </tr>
      <tr>
        <td>Num Id</td>
        <td>{{$post->numid}}</td>
      
      </tr>
      <tr>
        <td>Assuré Principal</td>
        <td>{{$post->assureprincipal}}</td>
      
      </tr>
      <tr>
        <td>Date de Naissance</td>
        <td>{{$post->datedenaissance}}</td>
      
      </tr>
      <tr>
        <td>Durée Validité Carte</td>
        <td>{{$post->datevalidite}}</td>
      
      </tr>
     <tr>
        <td>Status</td>
        <td>{{$post->category->name}}</td>
      
      </tr>

      <tr>
        <td>Commentaires</td>
        <td>
            @if(count($post->tags))
              @foreach($post->tags as $tag)
               {{$tag->name}} <br>
              @endforeach
            @endif
        </td>
      
      </tr>

      <tr class="photo">
        <td>Photo</td>
        <td>
            <img  width="20%" src="{{asset('post_images/'.$post->image)}}">
        </td>
      
      </tr>

      <tr>
        <td>Créé à</td>
        <td>
          {{$post->created_at}}
        </td>
      
      </tr>

    </tbody>
  </table>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection