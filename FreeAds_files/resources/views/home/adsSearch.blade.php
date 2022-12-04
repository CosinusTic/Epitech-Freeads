<!DOCTYPE html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ url('/css/home.css') }}">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>


  <div class="navbar">
    <h1>Results</h1>

    <a href="/home/{{$user->id}}"><button>home</button></a></td>
  </div>
  <div class="wrapper">
    <div class="innerwrapper">
      <h1 z>Search results</h1>
      <div class="searchbar">
        <form method="GET" action="/home/{{$user->id}}/adsSearch">
          {{ csrf_field() }}
          <input type="text" name="searched_item" class="search">
          <input type="image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magnifying_glass_icon.svg/2048px-Magnifying_glass_icon.svg.png" alt="Submit" class="submit-img" name="search">

        </form>
      </div>
    </div>

    @if($posts->isNotEmpty())
    <div class='container '>

      @foreach ($posts as $post)
      <div class="grid-item bg-dark text-white" style="border-radius: 1rem;">
        <div class="innercontainer ">
          <h2 class="fw-bold mb-2 text-uppercase">{{ $post->title }}</p>
          <img src="{{$post->image_URL}}">
          <p class="text-white mb-5">{{ $post->price }} $</p>
          <p class="text-white">{{ $post->description }}</p>
        </div>
        @endforeach
      </div>
      @else
      <div>
        <h3>No advert found</h3>
      </div>
      @endif
    </div>
  </div>
</body>
