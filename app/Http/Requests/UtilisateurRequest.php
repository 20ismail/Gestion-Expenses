<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array

{

    // Add email validation rule conditionally for registration
    if ($this->isMethod('post') && $this->route()->getName() == 'utilisateurs.store') {
        $rules['nom_complet'] = 'required|min:3';
        $rules['email'] = 'required|email|unique:utilisateurs';
        $rules['password'] = 'required|min:8|confirmed';
    } else {
        // Validation for sign-in form
        $rules['email'] = 'required|email';
        $rules['password'] = 'required';

    }

    return $rules;
}

}
