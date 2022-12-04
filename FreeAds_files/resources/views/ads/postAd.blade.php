<!DOCTYPE html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ url('/css/postads.css') }}">
  <title>Post your advert</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<!--

<form method="POST">
  {{ csrf_field() }}
  Title<input type="text" name="title" id="name"><br>
  Category<input type="text" name="category" id="category"><br>
  Description<input type="text" name="description" id="description"><br>
  Image URL<input type="text" name="image_URL" id="image_URL"><br>
  Price<input type="number" name="price" id="price" min="0" max="50000"><br>
  Location<input type="text" name="location" id="location"><br>
  <input type="submit" value="Update" id="submit_button"><br>
</form>

-->

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              <h1>ADD your product </h1>
              <form method="POST">
                {{ csrf_field() }}
                <div class="form-outline form-white mb-4">

                  <input type="text" name="title" id="name" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX">Title</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="text" name="category" id="category" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Category</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="text" name="description" id="description" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Description</label>
                </div>

                <div class="form-outline form-white mb-4">

                  <input type="text" name="image_URL" id="image_URL" id="name" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX">Image URL</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="number" name="price" id="price" min="0" max="50000" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Price</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="text" name="location" id="location" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Location</label>
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit" value="Update" id="submit_button">Update</button>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>