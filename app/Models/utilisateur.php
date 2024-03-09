<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Utilisateur extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $fillable = [
        'nom_complet',
        'metier',
        'email',
        'password',
        'image',
        'social_id',
        'datenaissance',
        'addresse',
        'email_verified_at',
    ];
    public static function test(){
        return view('welcome');
    }
}



