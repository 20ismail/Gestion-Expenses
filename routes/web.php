<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\UtilisateurController;

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

/*Route::get('/', function () {
    return view('login.Register');
});


Route::get('/log', function () {
    return view('login.login');
});

Route::get('/dash', function () {
    return view('dashbord.dashbord');
});*/
Route::get('/home', function () {
    return view('dashbord.dashbord');
});
Route::get('/SignUp', [UtilisateurController::class, 'index'])->name('SignUp.index');
Route::post('/SignUp', [UtilisateurController::class, 'store'])->name('SignUp.register');

Route::get('/SignIn', [SignInController::class, 'show'])->name('SignIn.show');
Route::post('/SignIn', [SignInController::class, 'signIn'])->name('SignIn.Login');


route::get('auth/client',[UtilisateurController::class,'handleGoogleCallback']);


route::get('auth/google',[SignInController::class,'redirectToGoogle'])->name('google');

route::get('auth/client',[SignInController::class,'handleGoogleCallback']);

