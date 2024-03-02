<?php

namespace App\Http\Controllers\Partenaire;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
  


    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();
        $restaurant = Session::get('restaurant');

        // Vérifier si l'utilisateur connecté a un restaurant associé
        if ($restaurant) {
            // Si oui, rediriger vers le tableau de bord du partenaire
            return view("partenaire.dashboardPartenaire.dashboard", ['partenaire' => $this->getUserLogin(), 'restaurant' => $restaurant]); 
        } else {
            // Si non, rediriger vers la page d'accueil
            return view('partenaire.acceuil', ['restaurants' => $user->restaurants()->get()]);
        }
    }
    

    public function getUserLogin()
    {
     return Auth::user();
    }

}
