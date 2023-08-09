<?php

namespace App\Http\Requests\joueur;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'joueur.email' => 'required|email|unique:joueurs,email,' . $this->id,
            'joueur.poste' => 'required|in:DC,DLD,DLG,MC,MD,MG,MO,MOC,AG,AD,AP,G',
            'joueur.nomJoueur' => 'required',
            'joueur.prenomJoueur' => 'required',
            'joueur.adresseJoueur' => 'required',
            'joueur.lieuNaissance' => 'required',
            'joueur.dateNaissance' => 'required|date',
            'joueur.estGardien' => 'required|boolean',
            'joueur.password' => 'required|min:8',
            'joueur.centre_formation_id' => 'nullable|exists:centre_formations,id',


            'critere.vitesse' => 'required_if:estGardien,false|numeric|min:0|max:100',
            'critere.puissance' => 'required_if:estGardien,false|numeric|min:0|max:100',
            'critere.endurance' => 'required_if:estGardien,false|numeric|min:0|max:100',
            'critere.taille' => 'required_if:estGardien,false|numeric|min:0|max:300', // Par exemple, en centimètres
            'critere.controle' => 'required_if:estGardien,false|numeric|min:0|max:100',
            'critere.passe' => 'required_if:estGardien,false|numeric|min:0|max:100',
            'critere.tir' => 'required_if:estGardien,false|numeric|min:0|max:100',
            'critere.dribble' => 'required_if:estGardien,false|numeric|min:0|max:100',
            'critere.tete' => 'required_if:estGardien,false|numeric|min:0|max:100',
            'critere.piedFort' => 'required_if:estGardien,false|in:Gauche,Droit',
            'critere.piedGauche' => 'required_if:estGardien,false|numeric|min:0|max:100',
            'critere.piedDroit' => 'required_if:estGardien,false|numeric|min:0|max:100',


            'critere.saut' => 'required_if:estGardien,true|numeric|min:0|max:100',
            'critere.plongeon' => 'required_if:estGardien,true|numeric|min:0|max:100',
            'critere.arret' => 'required_if:estGardien,true|numeric|min:0|max:100',
            'critere.degageemnt' => 'required_if:estGardien,true|numeric|min:0|max:100',
            'critere.placement' => 'required_if:estGardien,true|numeric|min:0|max:100',
            'critere.reflex' => 'required_if:estGardien,true|numeric|min:0|max:100',

        ];
    }

    public function messages()
    {
        return [
            'joueur.email.required' => 'L\'adresse e-mail est requise.',
            'joueur.email.email' => 'L\'adresse e-mail doit être une adresse valide.',
            'joueur.email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'joueur.poste.required' => 'Le champ poste est requis.',
            'joueur.poste.in' => 'Le champ poste doit avoir une valeur valide.',
            'joueur.nomJoueur.required' => 'Le champ nom du joueur est requis.',
            'joueur.prenomJoueur.required' => 'Le champ prénom du joueur est requis.',
            'joueur.adresseJoueur.required' => 'Le champ adresse du joueur est requis.',
            'joueur.lieuNaissance.required' => 'Le champ lieu de naissance est requis.',
            'joueur.dateNaissance.required' => 'Le champ date de naissance est requis.',
            'joueur.dateNaissance.date' => 'Le champ date de naissance doit être une date valide.',
            'joueur.estGardien.required' => 'Le champ estGardien est requis.',
            'joueur.estGardien.boolean' => 'Le champ estGardien doit être soit vrai soit faux.',
            'joueur.password.required' => 'Le mot de passe est requis.',
            'joueur.password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'joueur.centre_formation_id.exists' => 'Le centre de formation sélectionné n\'existe pas.',


            'critere.saut.required_if' => 'Le champ saut est requis pour les gardiens.',
            'critere.plongeon.required_if' => 'Le champ plongeon est requis pour les gardiens.',
            'critere.arret.required_if' => 'Le champ arrêt est requis pour les gardiens.',
            'critere.degageemnt.required_if' => 'Le champ dégagement est requis pour les gardiens.',


            'critere.vitesse.required_if' => 'Le champ vitesse est requis pour les joueurs.',
            'critere.puissance.required_if' => 'Le champ puissance est requis pour les joueurs.',
            'critere.endurance.required_if' => 'Le champ endurance est requis pour les joueurs.',
            'critere.taille.required_if' => 'Le champ taille est requis pour les joueurs.',
            'critere.controle.required_if' => 'Le champ contrôle est requis pour les joueurs.',
            'critere.passe.required_if' => 'Le champ passe est requis pour les joueurs.',
            'critere.tir.required_if' => 'Le champ tir est requis pour les joueurs.',
            'critere.dribble.required_if' => 'Le champ dribble est requis pour les joueurs.',
            'critere.tete.required_if' => 'Le champ tête est requis pour les joueurs.',
            'critere.piedFort.required_if' => 'Le champ pied fort est requis pour les joueurs.',
            'critere.piedGauche.required_if' => 'Le champ pied gauche est requis pour les joueurs.',
            'critere.piedDroit.required_if' => 'Le champ pied droit est requis pour les joueurs.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));

    }

}
