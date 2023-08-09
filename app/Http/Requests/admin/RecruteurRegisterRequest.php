<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class RecruteurRegisterRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'nomRecruteur' => 'required|string|max:255',
            'prenomRecruteur' => 'required|string|max:255',
            'adresseRecruteur' => 'required|string|max:255',
            'etat' => ['required', 'in:actif,inactif'],
            'email' => 'required|string|email|unique:recruteurs', // Remplacez "table_name" par le nom de votre table
            'password' => 'required|string|min:5',
            'isValidated' => 'required|boolean',
            'prestige' => 'numeric|min:1|max:10',
            'structure' => 'string|max:255'

        ];
    }

    public function messages(): array
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
            'isValidated.required' => 'Le champ isValidated est requis.',
            'isValidated.boolean' => 'Le champ isValidated doit être soit vrai soit faux.'
        ];
    }
    // 'password.confirmed' => 'Les champs de mot de passe ne correspondent pas.',
}
