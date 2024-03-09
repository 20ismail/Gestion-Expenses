<?php

namespace App\Http\Controllers;
use App\Http\Requests\UtilisateurRequest;
use App\Mail\usermail;
use Exception;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\SessionGuard;
use illuminate\Validation\Validator;
class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     //afficher la form du register
    public function index()
    {
        return view('Authentification.Register');
    }

     //pour veriefier l'email dans mailtrap
    public function verifyEmail(String $data){
        [$date,$id]=explode('*',base64_decode($data));

        $user=utilisateur::findOrFail($id);

        if($user->created_at->toDateTimeString()!==$date){
            abort(403);
        }
        if($user->email_verified_at!==NULL){
            return view('emails.dejaverify');
        }
        $user->fill([
            'email_verified_at'=>now()
        ])->save();


        return view('welcome',compact('user'));
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        try{

            $user=Socialite::driver('google')->user();

             $finduser=Utilisateur::where('social_id',$user->id)->first();

            if($finduser){
                // Auth::login($finduser);
                // dd(auth()->user()->email);
                return redirect('/home');


            }else{
                $user=utilisateur::create([
                    'nom_complet'=>$user->name,
                    'email'=>$user->email,
                    'social_id'=>$user->id,
                                    ]);


                return view('welcome',compact('user'));
            }
        }catch(Exception $e){
            dd($e->getMessage());
        }

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UtilisateurRequest $request)
    {
        $user=$request->validated();
        $user['password']=hash::make($user['password']);
        $finduser=Utilisateur::where('email',$user['email'])->first();
        // dd($finduser['email_verified_at']);
        if(!$finduser){
            $utilisateur=utilisateur::create($user);
           // Mail::to('smailsmail@gmail.com')->send(new usermail($utilisateur));
            Mail::to('mohamedelaassal42@gmail.com')->send(new usermail($utilisateur));
        }

        return view('emails.verifieremail',compact('finduser'));
    }

    /**
     * Display the specified resource.
     */
    public function show(utilisateur $utilisateur)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(utilisateur $utilisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, utilisateur $utilisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(utilisateur $utilisateur)
    {
        //
    }
}
