@extends('layouts.app')
@section('title')
    Services
@endsection
@section('content')
    <div class="card mt-5 p-5 bg-primary text-white">
        <h1>Welcome to the Services page</h1>
    </div>
    @if(Session::has('add_category_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{Session::get('add_category_success')}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::has('delete_category_success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{Session::get('delete_category_success')}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-around align-items-center">
        <div>
            <a class="btn btn-primary btn-lg" href="{{url('/ajout/categorie')}}">Ajouter une catégorie</a>
        </div>
        <div>
            <a class="btn btn-primary btn-lg" href="{{url('/ajout/produit')}}">Ajouter un produit</a>
        </div>
    </div>
    <h1>Liste des catégories</h1>
    <ul>
        @if(count($categories)<1)
            <h3>Vous n'avez pas encore de catégorie de créée.</h3>
        @else
            @foreach($categories as $category)
                <li class="d-flex my-2 justify-content-center align-items-center">
                    <span class="fs-3">{{$category->category_name}}</span>
                    <form action="{{url('supprimer-categorie', [$category->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="confirm('Supprimer la catégorie ?')" type="submit" class="btn btn-warning btn-lg">Supprimer</button>
                    </form>
                </li>
            @endforeach
        @endif
    </ul>
@endsection
