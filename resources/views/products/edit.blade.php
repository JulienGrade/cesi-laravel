@extends('layouts.app')
@section('title')
    Modifier un produit
@endsection

@section('content')
    <div class="card mt-5 p-5 bg-primary text-white">
        <h1>Modifier le produit : {{$product->product_name}}</h1>
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
        <form action="{{url('/edition-produit', [$product->id])}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="product_name">Nom du produit</label>
                <input id="product_name" type="text" name="product_name" value="{{$product->product_name}}" placeholder="Nom du produit" class="form-control mt-3"/>
            </div>
            <div class="form-group">
                <label for="product_price">Prix du produit</label>
                <input id="product_price" type="text" name="product_price" value="{{$product->product_price}}" placeholder="Prix du produit" class="form-control mt-3"/>
            </div>
            <div class="form-group">
                <label for="product_description">Description du produit</label>
                <textarea id="product_description" name="product_description" class="form-control mt-3" rows="10" cols="30">{{$product->product_description}}</textarea>
            </div>
            <input type="submit" value="Enregistrer le produit" class="btn btn-primary mt-5" />
        </form>
    </div>
@endsection
