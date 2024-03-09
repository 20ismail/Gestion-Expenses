<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\UtilisateurRequest;
use App\Models\Utilisateur;

class SignInController extends Controller
{
    public function show(){
        return view('Authentification.SignInForm');
     }


    public function signIn(UtilisateurRequest $request){
          $email = $request->email;
          $password = $request->password;
         $both = ['email' => $email, 'password' => $password];

            if(Auth::attempt($both)){
              $request->session()->regenerate();
            }
            else{
                 return redirect()->route('SignIn.show')->withErrors([
                    'password' => 'Email or Password incorrect !'
                    ]);
           }
    }




    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }




    public function handleGoogleCallback(){
        try {
            $user = Socialite::driver('google')->user();
            $findUser = Utilisateur::where('social_id', $user->id)->first();

            if ($findUser) {
                // Auth::login($findUser);
                // dd(auth()->user()->email);
                return redirect('/home');
            } else {
                return redirect()->route('SignIn.show')->withErrors([
                    'password' => 'Email not found!',
                ]);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }



}
