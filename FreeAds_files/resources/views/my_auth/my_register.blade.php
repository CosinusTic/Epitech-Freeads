<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('/css/login.css') }}">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body>
<!--
    <form method="POST">
        {{ csrf_field() }}
        Name <input type="text" name="name" placeholder="Name"><br>
        Email <input type="email" name="email" placeholder="Email"><br>
        Password <input type="text" name="password" placeholder="Password"><br>
        Password Confirmation <input type="text" name="password_confirmation" placeholder="Password confirmation"><br>
        Phone <input type="text" name="phone_number" placeholder="e.g. 07123456456"><br>
        <input type="submit" name="submit" value="register"><br>
    </form>

-->

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-95">
        <div class="row d-flex justify-content-center align-items-center h-95">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-0 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                            <p class="text-white-50 mb-5">Please enter your informations!</p>

                            <form method="POST">
                                {{ csrf_field() }}
                                <div class="form-outline form-white mb-4">

                                    <input type="text" name="name" id="typeEmailX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX">Username</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="email" name="email" id="typePasswordX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Email</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="password_confirmation" id="typePasswordX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Password Confirmation</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="phone_number" placeholder="e.g. 07123456456" id="typePasswordX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Phone</label>
                                </div>

                                <button type="submit" name="submit" value="register" class="btn btn-outline-light btn-lg px-5">Register</button>
                            </form>

                        </div>

                        <div>
                            <p class="mb-0">have an account? <a href="my_login" class=" text-white-50 fw-bold">Login</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>