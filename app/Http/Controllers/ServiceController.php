<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Permet d'afficher la page des services
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::All();

        return view('services.service')->with('categories', $categories);
    }
}
