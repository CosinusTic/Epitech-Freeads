<h1>User Profile</h1>


<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ url('/css/home.css') }}">
  <title>Update User</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<a href="/home/{{$user->id}}"><button>home</button></a></td>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">phone number</th>
      <th scope="col">admin status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->password }}</td>
        <td>{{ $user->phone_number }}</td>
        <td>{{ $user->admin_status }}</td>
    </tr>
  </tbody>
</table>

<form method="POST">
    {{ csrf_field() }}
    New name <input type="text" name="name" id="name"><br>
    New email <input type="text" name="email" id="email"><br>
    New phone number <input type="number" name="phone_number" id="phone_number" min="0" max="50000"><br>
    New password <input type="text" name="password" id="password"><br>
    Confirm password <input type="text" name="password_confirmation" id="password_confirmation"><br>
    <input type="submit" value="Update" id="submit_button"><br>
</form>
</body>