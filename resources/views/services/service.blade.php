@extends('layouts.app')
@section('title')
    Services
@endsection
@section('content')
    <div class="card mt-5 p-5 bg-primary text-white">
        <h1>Welcome to the Services page</h1>
    </div>
    <div class="d-flex justify-content-around align-items-center">
        <div>
            <a class="btn btn-primary btn-lg" href="{{url('/ajout/produit')}}">Ajouter un produit</a>
        </div>
    </div>
@endsection
