<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View("partenaire.template.template",['restaurant' => Session::get('restaurant')]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $restaurant = Session::get('restaurant');
        $template = Template::where('restaurant_id', $restaurant->id);
        $template->update([
            'libelle' => $request->template,
        ]);
        return to_route("partenaires.template.index")->with("success", 'Template modifier avec succes');


    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


}
