<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    /**
     * Permet d'afficher la page d'accueil du site
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Product::orderBy('product_price', 'desc')->paginate(1);

        return view('homepage.home')->with('products', $products);
    }

    /**
     * Permet d'afficher la page de détail d'un produit
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $product = Product::where(['id' => $id])->first();

        return view('homepage.show')->with('product', $product);
    }
}
