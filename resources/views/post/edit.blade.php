@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> 
                    
                    <div class="d-flex justify-content-between" >
                        <div>Editer Situation </div>
                          <div><a href="{{route('posts.index')}}" class="btn btn-success">Retour</a></div>
                    </div>
                </div>

                <div class="card-body">
                 <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="matricule">Matricule :</label>
                      <input type="text" value="{{ (old('matricule')) ? old('matricule') : $post->matricule }}" class="form-control"  id="matricule" placeholder="Entrer Matricule" name="matricule" >
                      @if($errors->any('matricule'))
                        <span class="text-danger"> {{$errors->first('matricule')}}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="nom">Nom :</label>
                      <input type="text" value="{{ (old('nom')) ? old('nom') : $post->nom }}" class="form-control"  id="nom" placeholder="Entrer le Nom" name="nom" >
                      @if($errors->any('nom'))
                        <span class="text-danger"> {{$errors->first('nom')}}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="datedenaissance">Date de Naissance :</label>
                      <input type="text" value="{{ (old('datedenaissance')) ? old('datedenaissance') : $post->datedenaissance }}" class="form-control"  id="datedenaissance" placeholder="Entrer de naissance" name="datedenaissance" >
                      @if($errors->any('datedenaissance'))
                        <span class="text-danger"> {{$errors->first('datedenaissance')}}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="cotisation">Cotisation:</label>
                      <input type="text" value="{{ (old('cotisation')) ? old('cotisation') : $post->cotisation }}" class="form-control"  id="cotisation" placeholder="Entrer votre Cotisation " name="cotisation" >
                      @if($errors->any('cotisation'))
                        <span class="text-danger"> {{$errors->first('cotisation')}}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="epargne">Epargne Acquise:</label>
                      <input type="text" value="{{ (old('epargne')) ? old('epargne') : $post->epargne }}" class="form-control"  id="epargne" placeholder="Entrer votre Epargne" name="epargne" >
                      @if($errors->any('epargne'))
                        <span class="text-danger"> {{$errors->first('epargne')}}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="annee">Année:</label>
                      <input type="text" value="{{ (old('annee')) ? old('annee') : $post->annee }}" class="form-control"  id="annee" placeholder="Entrer annee" name="annee" >
                      @if($errors->any('annee'))
                        <span class="text-danger"> {{$errors->first('annee')}}</span>
                      @endif
                    </div>

                      <label for="category">Souscripteur :</label>
                      <select class="form-control" id="category" name="category">
                        <option value="">Select souscripteur</option>

                        @if(count($categories))
                          @foreach($categories as $category)
                             <option value="{{$category->id}}" 

                             @if(old('category') && old('category') ==$category->id)
                              {{'selected'}}
                             @elseif($post->category_id==$category->id)
                             {{'selected'}}
                             @endif

                              >{{$category->name}}</option>
                          @endforeach
                        @endif
                        
                      </select>
                    @if($errors->any('category'))
                        <span class="text-danger"> {{$errors->first('category')}}</span>
                      @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
 $("#category").select2({
    placeholder: "Select Domaine",
    allowClear: true
  });

  $("#tags").select2({
    placeholder: "Select Niveau",
    allowClear: true
  });
</script>
@endsection