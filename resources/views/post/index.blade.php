@extends('layouts.app')

@section('content')
<div class="">
  <div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              
                <div class="card-header">
                  <style>
                    .card-header{
                      background-color: navy
                    }
                  </style>
                    <div class="d-flex justify-content-between" >
        
                        
                          <div><a href="{{route('posts.create')}}" class="btn btn-warning">Inserer une Situation</a></div>
                        
                        </div>
                </div>

                <div class="card-body">
                 <div class="mb-2">
                      <form class="form-inline" action="">
                        
                      @if(auth()->user()->admin==true)
                      <label for="category_filter">Filter par Souscripteur &nbsp;</label>
                       <select class="form-control" id="category_filter" name="category">
                        <option value="">Selectionner</option>
                       @if(count($categories))
                          @foreach($categories as $category)
                             <option value="{{$category->name}}"  {{(Request::query('category') && Request::query('category')==$category->name)?'selected':''}}  >{{$category->name}}</option>
                          @endforeach
                        @endif
                      </select>
                      <label for="keyword">&nbsp;&nbsp;</label>
                      @endif

                      <input type="text" class="form-control"  name="keyword" placeholder="Entrer le mot" id="keyword">
                      <span>&nbsp;</span> 
                       <button type="button" onclick="search_post()" class="btn btn-primary" >Recherche</button>
                       @if(Request::query('category') || Request::query('keyword'))
                        <a class="btn btn-success" href="{{route('posts.index')}}">Effacer</a>
                       @endif

                    </form>
                  </div>
                  <div class="table-responsive">
                    <style>
                      .table-responsive{
                        background-color: rgba(255, 166, 0, 0.918)
                      }
                
                    </style>
                    <table style="width: 100%;" class="table table-stripped ">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Matricule</th>
                          <th>Nom</th>
                          <th>Date de Naissance</th>
                          <th>Cotisation</th>
                          <th>Epargne</th>
                          <th>Année</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($posts))
                          @foreach($posts as $post)
                        <tr>
                            <td >{{$post->id}}</td>
                            <td >{{$post->matricule}}</td>
                            <td >{{$post->nom}}</td>
                            <td >{{$post->datedenaissance}}</td>
                            <td >{{$post->cotisation}}</td>
                            <td >{{$post->epargne}}</td>
                            <td >{{$post->annee}}</td>
                            <td  style="width:300px;">
                              <a  href="{{route('posts.show',$post->id)}}" class="btn btn-primary">View</a>
                              @if(auth()->user()->admin==true)
                              <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success">Edit</a>
                              
                              <a href="javascript:delete_post('{{route('posts.destroy',$post->id)}}')" class="btn btn-danger">Delete</a>
                              @endif
                            </td>
                          </tr>


                          @endforeach
                        @else

                          <tr>
                            <td colspan="6" >Aucune Situation trouvé</td>
        
                          </tr>
                        @endif

                
                      </tbody>
                    </table>
  @if(count($posts))
   {{$posts->appends(Request::query())->links()}}
  @endif

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<form id="post_delete_form" method="post" action="">
  @csrf
  @method('DELETE')
</form>


@endsection

@section('javascript')
<script type="text/javascript">
  var query=<?php echo json_encode((object)Request::only(['category','keyword','sortByComments'])); ?>;


  function search_post(){

    Object.assign(query,{'category': $('#category_filter').val()});
    Object.assign(query,{'keyword': $('#keyword').val()});

    window.location.href="{{route('posts.index')}}?"+$.param(query);

  }

  function sort(value){
    Object.assign(query,{'sortByComments': value});

    window.location.href="{{route('posts.index')}}?"+$.param(query);
  }

  function delete_post(url){

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this post!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $('#post_delete_form').attr('action',url);
         $('#post_delete_form').submit();
      } 
    });


  }


</script>
@endsection