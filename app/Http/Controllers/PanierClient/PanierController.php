<?php

namespace App\Http\Controllers\PanierClient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PanierClient;
use App\Models\Element;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurantWithTable = Session::get('restaurantWithTable');
        //  dd($restaurantWithTable->id);
        $elementPanierClientTable = DB::table('panier_clients')
        ->join('elements', 'panier_clients.element_id', '=', 'elements.id')
        ->select('panier_clients.*', 'elements.*', 'panier_clients.created_at as panier_client_created_at', 'panier_clients.updated_at as panier_client_updated_at', 'panier_clients.id as panier_client_id') // Sélectionner tous les champs des deux tables, et spécifier les champs created_at et updated_at de la table panier_clients avec des alias
        ->where('panier_clients.table_id', $restaurantWithTable->id)
        ->get()
        ->groupBy('element_id');
       
        $sommeTotalEstCommanderTrue = PanierClient::where('estCommander', true)
        ->where('table_id', $restaurantWithTable->id)
        ->sum('montant');

        $sommeTotalEstCommanderFalse = PanierClient::where('estCommander', false)
        ->where('table_id', $restaurantWithTable->id)
        ->sum('montant');


        // dd($elementPanierClientTable);
        $nbAjout = PanierClient::where('table_id', $restaurantWithTable->id)->count();
        return View('client.panier', ['sommeTotalEstCommanderFalse' => $sommeTotalEstCommanderFalse, 'sommeTotalEstCommanderTrue' => $sommeTotalEstCommanderTrue, 'nbAjout' => $nbAjout, 'restaurant' => $restaurantWithTable, 'elementPanierClientTable' => $elementPanierClientTable]);
   }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $table_id = $request->input('idTable');
        $element_id = $request->input('idElement');
        $quantite = $request->input('quantite');

        $element = Element::find($element_id);
        $table = Table::find($table_id);

        // dd($element->categorie->restaurant);


        // $elementPanierClientTable = DB::table('panier_clients')
        // ->select('id', 'element_id', 'table_id', 'montant', 'quantite', 'created_at', 'updated_at')
        // ->where('table_id', $table_id)
        // ->get();
        if ($element && $table) {

            $montant = $quantite * $element->prix; // Calculez le montant en fonction de la quantité et du prix de l'élément
    
            $panier = new PanierClient();
            $panier->element_id = $element->id;
            $panier->table_id = $table_id;
            $panier->montant = $montant;
            $panier->quantite = $quantite;
            $panier->save();
            
            return redirect()->back()->with("success", 'Element ajouté au panier avec succès');;
       }
       
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $panier = PanierClient::find($id);
        $panier->delete();
        return redirect()->back();
    }
}
