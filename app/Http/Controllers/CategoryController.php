<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CategoryController extends Controller
{
    /**
     * Permet d'afficher la page de création d'une catégorie
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('category.new');
    }

    /**
     * Permet d'enregistrer la catégorie créée
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function save(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ]);

        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->save();

        return redirect('/services')->with('add_category_success', 'La catégorie a bien été créée');
    }

    /**
     * Permet d'effacer une catégorie
     * @return Application|Redirector|RedirectResponse
     */
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/services')->with('delete_category_success', 'La catégorie a bien été créée');
    }
}
