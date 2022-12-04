
<!DOCTYPE html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ url('/css/home.css') }}">
  <title>Admin-Users</title>
</head>


<body>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
          <th scope="col">email</th>
          <th scope="col">password</th>
          <th scope="col">phone number</th>
          <th scope="col">admin status</th>
          <th scope="col">update</th>
          <th scope="col">delete</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ $user->admin_status }}</td>
            <td><a href="/users/update/{{$user->id}}"><button>Update User</button></a></td>
            <td><a href="/users/delete/{{$user->id}}"><button class="btn btn-danger">Delete User</button></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>



    
</body>