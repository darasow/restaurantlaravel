<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Restaurant;
use App\Models\Categorie;
use App\Models\Template;

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
            $template = Template::where('restaurant_id',  $restaurantWithTable->restaurant_id)->first();
            $vue = ($template->libelle == "template1")? "client.template1" : "client.template2";
            return View($vue,['categories' => $categories, 'restaurant' => $restaurantWithTable]);
        }else {
            return View("404.404");
        }
      
    }

}
