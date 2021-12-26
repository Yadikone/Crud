<!DOCTYPE html>
<html>
<head>
    <title>Generet Fils Download</title>  
</head>
<style type="text/css"> 
    table{
        width: 50%;
        border-collapse: collapse;
    } 
    table td, table th{  
        border:1px solid black;
    } 
    table tr, table td{
        padding: 5px;
    } 
    .container{
        background-color: red;


    }
</style>
<body>
    <div class="container">  
    <br/>  
    <a href="{{ route('itemPdfView',['download'=>'pdf']) }}">Download PDF</a>     
    <table>  
        <tr>  
            <th>Nom</th> <br> 
            <th>Souscripteur</th> <br>
            <th>Num ID</th>  <br>
            <th>image</th> 
            
        </tr>  <br>
        @foreach ($posts as $key => $post)
            <tr>  
                <td>{{$post->nom}}</td>  
                <td>{{$post->numcontrats}}</td>  
                <td>{{$post->datedenaissance}}</td> 
                <td>
                     <img  width="5%" src="{{asset('post_images/'.$post->image)}}">
                </td>
            </tr>  
        @endforeach  
    </table>  
</div>  
</body>
</html>