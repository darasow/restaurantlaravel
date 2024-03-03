<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Partenaire\PartenaireController;
use App\Http\Controllers\Partenaire\DashboardController;
use App\Http\Controllers\Categorie\CategorieController;
use App\Http\Controllers\Restaurant\RestaurantController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Element\ElementController;
use App\Http\Controllers\Table\TableController;
use App\Http\Controllers\Template\TemplateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {

    $user = Auth::user();
    $restaurants = $user->restaurants()->get();
    return view('partenaire.acceuil', ['restaurants' => $restaurants]);
})->middleware(['auth', 'verified'])->name('partenaire');


Route::prefix('partenaires')->middleware('auth')->name('partenaires.')->group(function () {

    Route::resource("/", PartenaireController::class);
    Route::resource("reference", PartenaireController::class);
    Route::resource("dashboard", DashboardController::class);
    Route::resource("categorie", CategorieController::class);
    Route::resource("restaurant", RestaurantController::class);
    Route::resource("element", ElementController::class);
    Route::resource("table", TableController::class);
    Route::resource("template", TemplateController::class);
});

Route::get('/restaurant', [ClientController::class, 'index'])->name('restaurant.index');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
