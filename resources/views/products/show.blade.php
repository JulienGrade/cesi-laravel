@extends('layouts.app')
@section('title')
    Détail produit
@endsection

@section('content')
    <div class="card my-5 p-5 bg-primary text-white">
        <h1>Vue de détail d'un produit</h1>
    </div>
    <div class="card w-50 mx-auto my-5 text-dark">
        <div class="card-header">
            <h1 class="text-center">{{$product->product_name}}</h1>
        </div>
        <div class="card-body">
            <p class="text-center fs-3">{{$product->product_description}}</p>
            <hr />
            <div class="d-flex justify-content-between">
                <a class="btn btn-primary btn-lg" href="{{url('/modifier-produit', [$product->id])}}">Éditer</a>
                <form action="{{url('supprimer-produit', [$product->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="confirm('Supprimer le produit ?')" type="submit" class="btn btn-warning">Supprimer</button>
                </form>
            </div>
        </div>
        <div class="card-footer">
            <p class="text-end text-primary text-bolder fs-2 fw-bold">{{$product->product_price}} €</p>
        </div>
    </div>
    <div>
        <a href="{{url('/')}}">Retour à l'accueil</a>
    </div>
@endsection
