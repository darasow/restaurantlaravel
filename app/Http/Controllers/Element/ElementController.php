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
        $categoriesWithElements = Categorie::with('elements')->get();
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
