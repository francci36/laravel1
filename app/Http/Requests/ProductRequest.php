<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //le champs nom est obligatoire
            'nom' => 'required|min:2|max:100',
            //la description du produit est obligatoire
            'description' => 'required|nullable|string|max:2000',
            // une image est obligatoire pour le produit
            'prix' => 'required|numeric|min:0|max:10000',
            // La tva est obligatoire
            'tva' => 'required|numeric|min:0|max:100'
        ];
    }
    public function messages(): array
    {
        return [
            //le champs nom est obligatoire
            'nom.required' => 'Saisir un nom',
            'nom.min' => 'le nom doit avoir plus de deux caractères',
            'nom.max' => 'le nom doit avoir au maxi 100 caractère',
            //la description du produit est obligatoire
            'description.required' => 'Décrivez le produit',
            'description.nullable' => 'Ce champs doit être rempli',
            'description.string' => 'Ce champs doit être une chaine de caractères',
            'description.max' => 'Ce champs doit avoir au maxi 2000 caractères',
            // une image est obligatoire pour le produit
            'prix.required' => 'saisir le prix',
            'prix.numeric' => 'Ce champs est destiné aux chiffres',
            'prix.min' => 'le prix doit être égal ou supérieur à 0',
            'prix.max' => 'le prix doit être au maxi 10000',
            // La tva est obligatoire
            'tva.required' => 'choisissez la tva',
            'tva.numeric' => 'Champs destiné aux numéros',
            'tva.min' => 'Valeur égal ou supérieur à 0',
            'tva.max' => 'Valeur valeur maxi 100'
        ];
    }
}
