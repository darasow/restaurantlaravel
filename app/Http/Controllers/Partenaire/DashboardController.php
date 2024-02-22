<?php

namespace App\Http\Controllers\Partenaire;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  

    public function index()
    {

        return view("partenaire.dashboardPartenaire.dashboard", ['partenaire' => $this->getUserLogin()]);   
    }

    public function getUserLogin()
    {
     return Auth::user();
    }

}
