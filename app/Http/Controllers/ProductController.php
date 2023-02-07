<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{
    /**
     * Permet d'afficher la page de détail d'un produit
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show')->with('product', $product);
    }

    /**
     * Permet d'afficher la page de création d'un produit
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('products.new');
    }

    /**
     * Permet d'enregistrer un produit en base de données
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;

        $product->save();

        return back();
    }
}
