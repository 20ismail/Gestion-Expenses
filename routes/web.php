<?php

use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::resource('utilisateurs',UtilisateurController::class);
route::get('/verify_email/{data}',[UtilisateurController::class,'verifyEmail']);
Route::get('/', function () {
    return view('login.Register');
});
Route::get('/log', function () {
    return view('login.login');
});
Route::get('/home', function () {
    return view('welcome');
});
Route::get('/dash', function () {
    return view('dashbord.dashbord');
});
route::get('auth/google',[UtilisateurController::class,'redirectToGoogle'])->name('google');
route::get('auth/client',[UtilisateurController::class,'handleGoogleCallback']);