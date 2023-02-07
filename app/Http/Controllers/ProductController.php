<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
        $categories = Category::orderBy('category_name', 'asc')->get();
        return view('products.new')->with('categories', $categories);
    }

    /**
     * Permet d'enregistrer un nouveau produit en base de données
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'product_price' => 'required|numeric|integer|min:1',
            'product_description' => 'required|min:20',
            'product_category' => 'required'
        ]);

        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        $product->product_description = $request->input('product_description');


        $product->save();

        return redirect('/')->with('add_product_success', 'Le produit '.$request->input('product_name').' a bien été ajouté');
    }

    /**
     * Permet de supprimer un produit
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        //DB::table('products')->where('id', $id)->delete();

        return redirect('/')->with('delete_product_success', 'Le produit a bien été supprimé');
    }

    /**
     * Permet d'afficher la vue de modification d'un produit
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit')->with('product', $product);
    }

    /**
     * Permet d'enregistrer les modifications d'un produit
     * @param $id
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function saveEdit($id, Request $request)
    {
        $product = Product::find($id);
        $request->validate([
            'product_name' => ['required',Rule::unique('products')->ignore($product->id),'max:255'],
            'product_price' => 'required|numeric|integer|min:1',
            'product_description' => 'required|min:20',
        ]);
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_description = $request->input('product_description');

        $product->update();

        return redirect('/')->with('edit_product_success', 'Le produit a bien été modifié');
    }
}
