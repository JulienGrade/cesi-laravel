@extends('layouts.app')
@section('title')
    Ajouter un produit
@endsection

@section('content')
    <div class="card mt-5 p-5 bg-primary text-white">
        <h1>Création de produit</h1>
    </div>
    <div class="card w-75 mx-auto p-5 my-5 text-dark">
        @if(count($errors)>0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{url('/enregistrer-produit')}}" method="POST">
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="product_name">Nom du produit</label>
                <input id="product_name" type="text" name="product_name" placeholder="Nom du produit" class="form-control mt-3"/>
            </div>
            <div class="form-group">
                <label for="product_category">Catégorie du produit</label>
                <select id="product_category" name="product_category" class="form-select select-2 w-100">
                    <option selected="selected">Sélectionner</option>
                    @foreach($categories as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="product_price">Prix du produit</label>
                <input id="product_price" type="text" name="product_price" placeholder="Prix du produit" class="form-control mt-3"/>
            </div>
            <div class="form-group">
                <label for="product_description">Description du produit</label>
                <textarea id="product_description" name="product_description" class="form-control mt-3" rows="10" cols="30"></textarea>
            </div>
            <input type="submit" value="Enregistrer le produit" class="btn btn-primary mt-5" />
        </form>
    </div>
@endsection
