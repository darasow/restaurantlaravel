<?php

namespace App\Http\Controllers\Element;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Categorie;
use App\Models\Element;
use App\Http\Requests\Element\ElementRequest;
use Illuminate\Support\Facades\Storage;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllCategoriesRestaurant()
    {
        $restaurant = Session::get('restaurant');
        $categories = $restaurant->categories()->get();
        return $categories;
    }
    public function index()
    {
        return View("partenaire.element.element",['restaurant' => Session::get('restaurant'), 'categories' => $this->getAllCategoriesRestaurant()]);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ElementRequest $request)
    {

        $data = $request->validated();
        $image = $request->validated('image');
        $imagePath = $image->store('elements', 'public');
        $data['image'] = $imagePath;
        $categorie = Element::create($data);
        return to_route("partenaires.element.index")->with("success", 'Element ajouter avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Element $element)
    {
        $categoriesWithElements = Categorie::with('elements')->get();
        return View("partenaire.element.element",['elementedit' => $element,'restaurant' => Session::get('restaurant'), 'categories' => $this->getAllCategoriesRestaurant()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ElementRequest $request, Element $element)
    {
        if ($request->hasFile('image')) {
            // si oui
            if ($element->image) {
                // on supprime l'ancienne image
                Storage::disk('public')->delete($element->image);
            }
            // on enregistre la nouvelle image
            $imagePath = $request->file('image')->store('elements', 'public'); 
            $element->update(['image' => $imagePath]);
        }

        $element->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix,
            'categorie_id' => $request->categorie_id,
        ]);
        return to_route("partenaires.element.index")->with("success", 'Element modifier avec succes');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Element $element)
    {
        $image = $element->image;
    
            if ($image) {
                Storage::disk('public')->delete($image);
            }
        $element->delete();
        return to_route("partenaires.element.index")->with("success", 'Element supprimer avec succes');

    }
}
