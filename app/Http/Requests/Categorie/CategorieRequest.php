<?php

namespace App\Http\Requests\Categorie;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class CategorieRequest extends FormRequest
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
        $user = Auth::user();
        $userId = $user ? $user->id : null;
    
        $rules = [
            'libelle' => 'required|string',
            'restaurant_id' => 'exists:restaurants,id',
        ];
    
        // Si la méthode HTTP est PATCH ou PUT, on ajoute la règle d'unicité conditionnelle pour le libellé
        if ($this->method() === 'PATCH' || $this->method() === 'PUT') {
            $rules['libelle'] .= '|unique:categories,libelle,NULL,id,restaurant_id,' . $userId;
            // Pour l'image, elle reste facultative si aucune nouvelle image n'est fournie
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        } else {
            // Sinon, pour les autres méthodes, on applique simplement la règle d'unicité pour le libellé
            $rules['libelle'] .= '|unique:categories,libelle,NULL,id,restaurant_id,' . $userId;
            // Pour les autres méthodes que PATCH et PUT, l'image est obligatoire
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }
    
        return $rules;
    }
    
}
