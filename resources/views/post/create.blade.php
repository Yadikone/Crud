@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    
                    <div class="d-flex justify-content-between" >
                        <div>Insertion Situation</div>
                          <div><a href="{{route('posts.index')}}" class="btn btn-success">Retour</a></div>
                    </div>
                </div>

                <div class="card-body">
                 <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="matricule">Matricule</label>
                      <input type="text" value="{{old('matricule')}}" class="form-control"  id="matricule" placeholder="Entrer votre Matricule" name="matricule" >
                      @if($errors->any('matricule'))
                        <span class="text-danger"> {{$errors->first('matricule')}}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="nom">Nom</label>
                      <input type="text" value="{{old('nom')}}" class="form-control"  id="nom" placeholder="Entrer le  nom" name="nom" >
                      @if($errors->any('nom'))
                        <span class="text-danger"> {{$errors->first('nom')}}</span>
                      @endif
                    </div>
                    
                    <div class="form-group">
                      <label for="datedenaissance">Date de Naissance</label>
                      <input type="text" value="{{old('datedenaissance')}}" class="form-control"  id="datedenaissancee" placeholder="Entrer votre Date de Naissance" name="datedenaissance" >
                      @if($errors->any('datedenaissance'))
                        <span class="text-danger"> {{$errors->first('datedenaissance')}}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="cotisation">Cotisation</label>
                      <input type="text" value="{{old('cotisation')}}" class="form-control"  id="cotisation" placeholder="Entrer votre Cotisation " name="cotisation" >
                      @if($errors->any('cotisation'))
                        <span class="text-danger"> {{$errors->first('cotisation')}}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="epargne">Epargne </label>
                      <input type="text" value="{{old('epargne')}}" class="form-control"  id="epargne" placeholder="Votre votre Epargne" name="epargne" >
                      @if($errors->any('epargne'))
                        <span class="text-danger"> {{$errors->first('epargne')}}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="annee">Année </label>
                      <input type="text" value="{{old('annee')}}" class="form-control"  id="annee" placeholder="Entrer année" name="annee" >
                      @if($errors->any('annee'))
                        <span class="text-danger"> {{$errors->first('annee')}}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="category">Souscripteur :</label>
                      <select class="form-control" id="category" name="category">
                        <option value="" >Select domaine</option>

                        @if(count($categories))
                          @foreach($categories as $category)
                             <option value="{{$category->id}}"  {{(old('category') && old('category')==$category->id )?'selected':''}}  >{{$category->name}}</option>
                          @endforeach
                        @endif
                        
                      </select>
                    @if($errors->any('category'))
                        <span class="text-danger"> {{$errors->first('category')}}</span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="tags">Niveau :</label>
                      <select class="form-control" id="tags" name="tags[]" multiple>
                        <option value="">Select Souscripteur</option>
                          @if(count($tags))
                          @foreach($tags as $tag)
                             <option value="{{$tag->id}}" 
{{(old('tags') && in_array($tag->id,old('tags')) )?'selected':''}} 
                             >{{$tag->name}}</option>
                          @endforeach
                        @endif
                      </select>
                               @if($errors->any('tags'))
                        <span class="text-danger"> {{$errors->first('tags')}}</span>
                      @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
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
    placeholder: "Select Police",
    allowClear: true
  });

  $("#tags").select2({
    placeholder: "Select Niveau",
    allowClear: true
  });
</script>
@endsection