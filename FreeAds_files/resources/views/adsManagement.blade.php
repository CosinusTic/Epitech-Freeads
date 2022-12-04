<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ url('/css/home.css') }}">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">price</th>
      <th scope="col">description</th>
      <th scope="col">update</th>
      <th scope="col">supprimer</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($ads as $ad)
    <tr>
        <th scope="row">{{ $ad->id }}</th>
        <td>{{ $ad->title }}</td>
        <td>{{ $ad->price }}</td>
        <td>{{ $ad->description }}</td>
        <td><a href="/ads/update/{{$ad->id}}"><button>Update Product</button></a></td>
        <td><a href="/ads/delete/{{$ad->id}}"><button class="btn btn-danger">Delete product</button></a></td>
    </tr>
    @endforeach
    
    
  </tbody>
</table>


