<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ url('/css/home.css') }}">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>



<body>

  <div class="navbar">

    <h1>Hello {{ $user->name }}</h1>


    <div class="redirect-buttons">
      <a href="/profile/{{$user->id}}"><button>My Profile</button></a>
      <a href=""><button>Add an ad</button></a>
    </div>
  </div>


  <div class="wrapper">
    <div class="searchbar">
      <form method="GET" action="{{$user->id}}/adsSearch">
        {{ csrf_field() }}
        <input type="text" name="searched_item" class="search">
        <input type="image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magnifying_glass_icon.svg/2048px-Magnifying_glass_icon.svg.png" alt="Submit" class="submit-img" name="search">
      </form>
    </div>
    <div class='container '>
      @foreach ($ads as $ad)
      <div class="innercontainer  bg-dark">
        <div class='grid-item  text-white style="border-radius: 1rem;'>
          <h2 class="fw-bold mb-2 text-uppercase">{{ $ad->title }}</h2>
          <img src="{{$ad->image_URL}}">
          <p class="text-white mb-5">{{ $ad->price }} $</p>
          <p class="text-white">{{ $ad->description }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</body>

</html>