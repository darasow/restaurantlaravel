<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
            return [
                'reference' => 'required|string|unique:restaurants,reference', // unique dans la table restaurants
                'nom' => 'required|string',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image avec des extensions autorisées et une taille maximale de 2 Mo
                'user_id' => 'exists:users,id', // L'utilisateur associé doit exister dans la table users
            ];
    }
}
