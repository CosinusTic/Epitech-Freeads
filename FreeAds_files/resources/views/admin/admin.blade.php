<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ url('/css/admin.css') }}">
  <title>Home</title>
</head>

<body>
  <div class="blockmid">
    <div class="innerblock">
      <h1>Welcome to admin page, {{ $user_id->name }}</h1>
      <div class="btn">
        <a href="{{$user_id->id}}/user"><button>Manage Users</button></a>
        <a href="{{$user_id->id}}/ads"><button>Manage ads</button></a>
      </div>
    </div>
  </div>

</body>