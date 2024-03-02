<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Restaurant;
use App\Models\Categorie;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $reference = $request->query('refRestaurant');
        $idTable = $request->query('idTable');

        $restaurantWithTable = Restaurant::where('reference', $reference)
        ->join('tables', 'restaurants.id', '=', 'tables.restaurant_id')
        ->where('tables.id', $idTable)
        ->select('restaurants.*', 'tables.*')
        ->first();

        if($restaurantWithTable)
        {
            $categories = Categorie::where('restaurant_id', $restaurantWithTable->restaurant_id)->get();
            return View("client.template2",['categories' => $categories, 'restaurant' => $restaurantWithTable]);
        }else {
            dd("Restaurant non trouver");
        }
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
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
