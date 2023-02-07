<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route de la page d'accueil en GET
Route::get('/', [HomepageController::class, 'index']);

// Route de la page de vue détaillée d'un produit
Route::get('/produit/{id}', [HomepageController::class, 'show']);
