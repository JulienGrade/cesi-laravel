@extends('layouts.app')
@section('title')
    Création catégorie
@endsection

@section('content')
    <div class="card mt-5 p-5 bg-primary text-white">
        <h1>Création de catégorie</h1>
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
        <form action="{{url('/enregistrer-categorie')}}" method="POST">
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="category_name">Nom de la catégorie</label>
                <input id="category_name" type="text" name="category_name" placeholder="Nom de la catégorie" class="form-control mt-3"/>
            </div>
            <input type="submit" value="Enregistrer la catégorie" class="btn btn-primary mt-5" />
        </form>
    </div>
    <div>
        <a href="{{url('/services')}}">Retour aux services</a>
    </div>
@endsection
