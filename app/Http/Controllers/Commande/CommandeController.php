<?php

namespace App\Http\Controllers\Commande;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PanierClient;
use App\Models\Restaurant;
use App\Models\Commande;
use App\Models\Table;
use Illuminate\Support\Facades\Session;


class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $table = Session::get('table');
        $restaurant = Session::get('restaurant');

        $restaurantWithTable = Restaurant::where('reference', $restaurant->reference)
        ->join('tables', 'restaurants.id', '=', 'tables.restaurant_id')
        ->where('tables.id', $table->id)
        ->select('restaurants.*', 'tables.*')
        ->first();

        $elementsPanierClientCommander = PanierClient::join('elements', 'panier_clients.element_id', '=', 'elements.id')
        ->select('elements.*', 'panier_clients.montant as montant_panier')
        ->where('panier_clients.table_id', $table->id)
        ->where('panier_clients.estCommander', true)
        ->get();

    // dd($elementsPanierClientCommander);
        
        return View("partenaire.commande.commande", ['elements' => $elementsPanierClientCommander, 'restaurant' => Session::get('restaurant')]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $restaurantWithTable = Session::get('restaurantWithTable');
        $id_table = $restaurantWithTable->id;

        $panierClientsNonCommandes = PanierClient::where('table_id', $id_table)
                                        ->where('estCommander', false)
                                        ->get();

        foreach ($panierClientsNonCommandes as $panierClient) {
            // Insérer un nouvel enregistrement dans la table commandes
            $commande = new Commande();
            $commande->panier_client_id = $panierClient->id;
            $commande->table_id = $id_table; // Utiliser la même table_id
            $commande->save();
        
            // Mettre à jour le champ estCommander de la table panier_clients à true
            $panierClient->estCommander = true;
            $panierClient->save();
            
        }
        return redirect()->back()->with("success", 'Element ajouté au panier avec succès');;

    }
    

    /**
     * Store a newly created resource in storage.
     */
      public function store(Request $request)
    {
        $id = $request->input('id');
        $table = Table::find($id);

            if($table)
            {
                Session::put('table', $table);
                return to_route("partenaires.commande.index");

            }else{
                return redirect()->back()->with("errors", 'Table non trouver');;
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        $restaurant = Session::get('restaurant');
         $tables = $restaurant->tables()->get();
         return View("partenaire.commande.table", ['tables' => $tables, 'restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $restaurantWithTable = Session::get('restaurantWithTable');
        $id_table = $restaurantWithTable->id;
        $panierClient = PanierClient::where('id', $id)->first();
        
            $commande = new Commande();
            $commande->panier_client_id = $panierClient->id;
            $commande->table_id = $id_table;
            $commande->save();
        
            $panierClient->estCommander = true;
            $panierClient->save();
        
        return redirect()->back()->with("success", 'Element ajouté au panier avec succès');;

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
