<?php

namespace App\Http\Requests\recruteur;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'nomRecruteur' => 'required|string|max:255',
            'prenomRecruteur' => 'required|string|max:255',
            'adresseRecruteur' => 'required|string|max:255',
            'prestige' => 'nullable|integer',
            'etat' => 'required|in:actif,inactif',
            'structure' => 'nullable|string|max:255',
            'email' => 'required|string|email|unique:recruteurs',
            'password' => 'required|string|min:5',
            'isValidated' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'nomRecruteur.required' => 'Le champ nom du recruteur est requis.',
            'prenomRecruteur.required' => 'Le champ prénom du recruteur est requis.',
            'adresseRecruteur.required' => 'Le champ adresse du recruteur est requis.',
            'etat.required' => 'Le champ état est requis.',
            'etat.in' => 'La valeur du champ état doit être "actif" ou "inactif".',
            'email.required' => 'L\'adresse e-mail est requise.',
            'email.email' => 'L\'adresse e-mail doit être une adresse valide.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.confirmed' => 'Les champs de mot de passe ne correspondent pas.',
            'isValidated.required' => 'Le champ isValidated est requis.',
            'isValidated.boolean' => 'Le champ isValidated doit être soit vrai soit faux.',
        ];
    }


}
