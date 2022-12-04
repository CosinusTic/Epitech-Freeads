<?php

use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckAdminStatus;


/*
|--------------------------------------------------------------------------
| Login and registration
|--------------------------------------------------------------------------
*/



/* --- Registration form result and view ---*/
Route::get("/my_register", [UserController::class, "DisplayRegisterView"]);
Route::post("/my_register", [UserController::class, "Register"]);

/* --- Login form result and view ---*/
Route::get("/my_login", [UserController::class, "DisplayLoginView"]);
Route::post("/logged_in ", [UserController::class, "Login"]);

/* -- After login -- */
Route::get("/logged_in", [UserController::class, "DisplayLoggedInView"]);


/* --- Confirmation email ---*/
Route::get('/send-mail', function () {
    return 'A message has been sent to Mailtrap!';
});

Route::get("/email/verify/{id}", [UserController::class, "verifyEmail"])->middleware("IdInURLIsDefined");



/* --- Home --- */
Route::get("/home/{id}", [AdController::class, 'displayProductsInHome']); // home page  
Route::get("/home/{id}/adsSearch", [AdController::class, "search"]); // search results 

/* --- Admin pages --- */
Route::get("/admin/{admin_status}/ads", [AdController::class, 'displayProductsManagement'])->middleware("CheckAdminStatus"); //access if is admin
Route::get("/admin/{admin_status}/user", [UserController::class, 'displayUsersManagement'])->middleware("CheckAdminStatus"); //access if is admin
Route::get("/admin/{admin_status}", [AdController::class, 'DisplayAdminView'])->middleware("CheckAdminStatus"); // /admin redirects to user or ads management if is admin
Route::post("/admin/{admin_status}", [AdController::class, 'displayProductsManagement'])->middleware("CheckAdminStatus");

/* --- Updating and deleting users --- */
Route::get("/users/delete/{id}", [UserController::class, 'deleteUser']); // redirection page where user with specific id is deleted
Route::get("/users/update/{id}", [UserController::class, 'displayUpdateUser']); // redirection page where user with specific id is update
Route::post("/users/update/{id}", [UserController::class, 'updateUser']); // redirection page where user with specific id is update

/* --- Updating and deleting ads --- */
Route::get("/ads/delete/{id}", [AdController::class, 'deleteAd']); // redirection page where Ad with specific id is deleted
Route::get("/ads/update/{id}", [AdController::class, 'displayUpdateAd']); // redirection page where Ad with specific id is update
Route::post("/ads/update/{id}", [AdController::class, 'updateAd']); // redirection page where Ad with specific id is update


/* --- User Profile --- */
Route::get("/profile/{id}", [UserController::class, 'displayUserProfileView']);//display user profile
Route::post("/profile/{id}", [UserController::class, 'updateMyProfile']); // update user profile

/* --- User Advert Posting --- */
Route::get("/postYourAd/{id}", [AdController::class, 'displayPostAdView']);
Route::post("/postYourAd/{id}", [AdController::class, 'addAnAdvert']);