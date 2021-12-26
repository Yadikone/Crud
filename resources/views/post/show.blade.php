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
                        <div>SITUATION </div>
                        <div>
                        {{ Auth::user()->name }} <span class="caret"></span>
                        </div>
                      
                          <div><a href="{{route('posts.index')}}" class="btn btn-success">Retour</a></div>
                    </div>
                </div>

                <div class="card-body">

 <table class="table table-striped">
    
    <tbody>
    <tr>
        <td>Police</td>
        <td>{{$post->category->name}}</td>
      
      </tr>
      <tr>
        <td>Matricule</td>
        <td>{{$post->matricule}}</td>
      
      </tr>
      <tr>
        <td>Prénom et Nom</td>
        <td>{{$post->nom}}</td>
      
      </tr>
      <tr>
        <td>Date de Naissance</td>
        <td>{{$post->datedenaissance}}</td>
      
      </tr>
      <tr>
        <td>Cotisation</td>
        <td>{{$post->cotisation}}</td>
      
      </tr>
      <tr>
        <td>Epargne</td>
        <td>{{$post->epargne}}</td>
      
      </tr>
      <tr>
        <td>Année</td>
        <td>{{$post->annee}}</td>
      
      </tr>
      
      <tr>
        <td>Fait à Dakar le </td>
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