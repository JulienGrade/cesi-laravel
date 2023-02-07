<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
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

/* GESTION DE LA PAGE ACCUEIL */

// Route de la page d'accueil en GET
Route::get('/', [HomepageController::class, 'index']);

/* GESTION DES PRODUITS */

// Route de la page de vue détaillée d'un produit
Route::get('/produit/{id}', [ProductController::class, 'show']);

// Route de la page de création d'un produit
Route::get('/ajout/produit', [ProductController::class, 'create'])->middleware('auth');

// Route d'enregistrement d'un produit
Route::post('/enregistrer-produit', [ProductController::class, 'save'])->middleware('auth');

// Route permettant de supprimer un produit
Route::delete('/supprimer-produit/{id}', [ProductController::class, 'delete']);

// Route permettant d'afficher le formulaire d'édition d'un produit
Route::get('/modifier-produit/{id}', [ProductController::class, 'edit']);

// Route permettant d'enregistrer les modifications d'un produit
Route::put('/edition-produit/{id}', [ProductController::class, 'saveEdit']);

/* GESTION DES CATEGORIES */

// Route permettant d'afficher la page de création d'une catégorie
Route::get('/ajout/categorie', [CategoryController::class, 'create']);

// Route permettant d'enregistrer une catégorie
Route::post('/enregistrer-categorie', [CategoryController::class, 'save']);

// Route permettant de supprimer une catégorie
Route::delete('/supprimer-categorie/{id}', [CategoryController::class, 'delete']);

/* GESTION DES COMMENTAIRES */

// Route permettant d'enregistrer un commentaire
Route::post('commenter/produit/{id}', [CommentController::class, 'new']);

/* GESTION DE LA PAGE SERVICES */

// Route de la page des services
Route::get('/services', [ServiceController::class, 'index'])->middleware('auth');

/* GESTION DE L'AUTHENTIFICATION */

// Route de la page de connexion
Route::get('/connexion', [AuthController::class, 'login']);

// Route pour s'authentifier
Route::post('/connexion', [AuthController::class, 'authenticate'])->name('connexion');

// Route pour se déconnecter
Route::post('/deconnexion', [AuthController::class, 'logout']);


