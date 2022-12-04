<p>Page of update confirmation</p>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ url('/css/home.css') }}">
  <title>Update User</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>


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
        <th scope="row">{{ $user_to_update->id }}</th>
        <td>{{ $user_to_update->name }}</td>
        <td>{{ $user_to_update->email }}</td>
        <td>{{ $user_to_update->password }}</td>
        <td>{{ $user_to_update->phone_number }}</td>
        <td>{{ $user_to_update->admin_status }}</td>
    </tr>
  </tbody>
</table>





<p>Enter new credentials for user n{{$user_to_update->id}} (no need to fill all fields)</p>
<form method="POST">
    {{ csrf_field() }}
    New name<input type="text" name="name" id="name"><br>
    New email<input type="email" name="email" id="email"><br>
    New password<input type="text" name="password" id="password"><br>
    New phone number<input type="text" name="phone_number" id="password"><br>
    New admin status<input type="number" name="admin_status" id="password" min="0" max="1"><br>
    <input type="submit" value="Update" id="submit_button"><br>
</form>
