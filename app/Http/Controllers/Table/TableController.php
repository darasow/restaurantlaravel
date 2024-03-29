<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use Illuminate\Support\Facades\Session;
use App\Models\Restaurant;
use App\Http\Requests\Table\TableRequest;


class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllTablesRestaurant()
    {
        $restaurant = Session::get('restaurant');
        $tables = $restaurant->tables()->get();
        return $tables;
    }

    public function index()
    {
      
        return View("partenaire.table.table",['restaurant' => Session::get('restaurant'), 'tables' => $this->getAllTablesRestaurant()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        $data = $request->validated();
        $data['restaurant_id'] = Session::get('restaurant')->id;
        $table = Table::create($data);
        
        return to_route("partenaires.table.index")->with("success", 'Table ajouter avec succes');
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
    public function edit(Table $table)
    {

        return View("partenaire.table.table", ['tableedit' => $table, 'restaurant' => Session::get('restaurant'), 'tables' => $this->getAllTablesRestaurant()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, Table $table)
    {
        $table->update([
            'nbPlace' => $request->nbPlace,
        ]);
        return to_route("partenaires.table.index")->with("success", 'Table modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->delete();
        return to_route("partenaires.table.index")->with("success", 'Table supprimer avec succes');
    }
}
