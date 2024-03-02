<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Template;
use App\Http\Requests\Restaurant\RestaurantRequest;
use Illuminate\Support\Facades\Auth;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('partenaire.restaurant.create');
    }

    public function getUserLogin()
    {
     return Auth::user();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(RestaurantRequest $request)
    {
        $user = $this->getUserLogin();

        $data = $request->validated();
        $image = $request->validated('avatar');
        $imagePath = $image->store('avatars', 'public');
        $data['avatar'] = $imagePath;
        $data['user_id'] = $user->id;
        $restaurant = Restaurant::create($data);

            $template = Template::create([
                'restaurant_id' => $restaurant->id,
            ]);

        return to_route("partenaires.index")->with("success", 'Restaurant ajouter avec succes');
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
