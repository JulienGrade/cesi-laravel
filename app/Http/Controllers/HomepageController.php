<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Permet d'afficher la page d'accueil du site
     * @return Application|Factory|View
     */
    public function index()
    {
        $name = "John";

        return view('homepage.home', ['name' => $name]);
    }
}
