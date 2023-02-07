<?php

namespace App\Http\Controllers;

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
        return view('services.service');
    }
}
