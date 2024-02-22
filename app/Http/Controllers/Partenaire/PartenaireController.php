<?php

namespace App\Http\Controllers\Partenaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    public function index()
    {
        $user = $this->getUserLogin();
        $restaurants = $user->restaurants()->get();
        return view('partenaire.acceuil', ['restaurants' => $restaurants]);
    }

    public function getUserLogin()
    {
     return Auth::user();
    }

    public function store(Request $request)
    {
        $id = $request->input('id');
        $restaurant = Restaurant::find($id);

            if($restaurant)
            {
                Session::put('restaurant', $restaurant);
                return to_route("partenaires.dashboard.index");


            }else{
                return to_route("partenaires.index")->with("errors", 'Restaurant non trouver');
            }
       
    }

   
}
