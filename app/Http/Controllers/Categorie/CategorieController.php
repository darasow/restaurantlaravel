<?php

namespace App\Http\Controllers\Categorie;


use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Categorie\CategorieRequest;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{

    public function getAllCategoriesRestaurant()
    {
        $restaurant = Session::get('restaurant');
        $categories = $restaurant->categories()->get();
        return $categories;
    }
    public function index()
    {
        
        return View("partenaire.categorie.categorie",['categories' => $this->getAllCategoriesRestaurant(), 'restaurant' => Session::get('restaurant')]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieRequest $request)
    {
        $data = $request->validated();
        $image = $request->validated('image');
        $imagePath = $image->store('categories', 'public');
        $data['image'] = $imagePath;
        $data['restaurant_id'] = Session::get('restaurant')->id;
        $categorie = Categorie::create($data);

        return to_route("partenaires.categorie.index")->with("success", 'Categorie ajouter avec succes');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
       
        return View("partenaire.categorie.categorie", ['categorieedit' => $categorie, 'categories' => $this->getAllCategoriesRestaurant(), 'restaurant' => Session::get('restaurant')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategorieRequest $request, Categorie $categorie)
    {
        // verifie si on a une nouvelle image
        if ($request->hasFile('image')) {
            // si oui
            if ($categorie->image) {
                // on supprime l'ancienne image
                Storage::disk('public')->delete($categorie->image);
            }
            // on enregistre la nouvelle image
            $imagePath = $request->file('image')->store('categories', 'public'); 
            $categorie->update(['image' => $imagePath]);
        }

        $categorie->update([
            'libelle' => $request->libelle,
        ]);
        return to_route("partenaires.categorie.index")->with("success", 'Categorie modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $image = $categorie->image;
    
            if ($image) {
                Storage::disk('public')->delete($image);
            }
        $categorie->delete();
        return to_route("partenaires.categorie.index")->with("success", 'Categorie supprimer avec succes');
    }
}
