<p>Page of update confirmation (ad)</p>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ url('/css/home.css') }}">
  <title>Update Ad</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">category</th>
      <th scope="col">description</th>
      <th scope="col">image URL</th>
      <th scope="col">price</th>
      <th scope="col">location</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th scope="row">{{ $ad_to_update->id }}</th>
        <td>{{ $ad_to_update->title }}</td>
        <td>{{ $ad_to_update->category }}</td>
        <td>{{ $ad_to_update->description }}</td>
        <td>{{ $ad_to_update->image_URL }}</td>
        <td>{{ $ad_to_update->price }}</td>
        <td>{{ $ad_to_update->location }}</td>
    </tr>
  </tbody>
</table>

<p>Enter new credentials for ad n{{$ad_to_update->id}} (no need to fill all fields)</p>
<form method="POST">
    {{ csrf_field() }}
    New title<input type="text" name="title" id="name"><br>
    New category<input type="text" name="category" id="category"><br>
    New description<input type="text" name="description" id="description"><br>
    New image URL<input type="text" name="image_URL" id="image_URL"><br>
    New price<input type="number" name="price" id="price" min="0" max="50000"><br>
    New location<input type="text" name="location" id="location"><br>
    <input type="submit" value="Update" id="submit_button"><br>
</form>


