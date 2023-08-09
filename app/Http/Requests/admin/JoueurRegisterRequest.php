<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class JoueurRegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:joueurs,email,' . $this->id,
            'poste' => 'required|in:DC,DLD,DLG,MC,MD,MG,MO,MOC,AG,AD,AP,G',
            'nomJoueur' => 'required',
            'prenomJoueur' => 'required',
            'adresseJoueur' => 'required',
            'lieuNaissance' => 'required',
            'dateNaissance' => 'required|date',
            'estGardien' => 'required|boolean',
            'password' => 'required|min:8',
            'isValidated' => 'required|boolean',
            'centre_formation_id' => 'nullable|exists:centre_formations,id',
        ];
    }

    public function messages()
{
    return [
        'email.required' => 'L\'adresse e-mail est requise.',
        'email.email' => 'L\'adresse e-mail doit être une adresse valide.',
        'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
        'poste.required' => 'Le champ poste est requis.',
        'poste.in' => 'Le champ poste doit avoir une valeur valide.',
        'nomJoueur.required' => 'Le champ nom du joueur est requis.',
        'prenomJoueur.required' => 'Le champ prénom du joueur est requis.',
        'adresseJoueur.required' => 'Le champ adresse du joueur est requis.',
        'lieuNaissance.required' => 'Le champ lieu de naissance est requis.',
        'dateNaissance.required' => 'Le champ date de naissance est requis.',
        'dateNaissance.date' => 'Le champ date de naissance doit être une date valide.',
        'estGardien.required' => 'Le champ estGardien est requis.',
        'estGardien.boolean' => 'Le champ estGardien doit être soit vrai soit faux.',
        'password.required' => 'Le mot de passe est requis.',
        'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
        'isValidated.required' => 'Le champ isValidated est requis.',
        'isValidated.boolean' => 'Le champ isValidated doit être soit vrai soit faux.',
        'centre_formation_id.exists' => 'Le centre de formation sélectionné n\'existe pas.',
    ];
}

}
