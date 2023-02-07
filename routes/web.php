<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
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
Route::get('/produit/{id}', [ProductController::class, 'show']);

// Route de la page de création d'un produit
Route::get('/ajout/produit', [ProductController::class, 'create']);

// Route d'enregistrement d'un produit
Route::post('/enregistrer-produit', [ProductController::class, 'save']);

// Route de la page des services
Route::get('/services', [ServiceController::class, 'index']);
