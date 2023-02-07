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
    @if(auth()->user())
        @forelse($product->comments as $comment)
            <figure class="card p-5">
                <blockquote class="fs-6 text-primary">
                    {{$comment->user->name}}<br />
                    <span class="fs-5 text-black">{{$comment->content}}</span>
                </blockquote>
                <figcaption>le {{$comment->created_at->format('d / m / Y')}}</figcaption>
            </figure>
        @empty
            <h3>Pas encore de commentaire</h3>
        @endforelse
        <div class="mb-5">

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
            <form method="POST" action="{{url('/commenter/produit', [$product->id])}}">
                @csrf
                @method("POST")
                <div class="form-group mt-3">
                    <label for="content">Votre commentaire</label>
                    <textarea class="form-control mt-3" id="content" name="content" cols="30" rows="10"></textarea>
                </div>
                <input type="submit" value="Commenter" class="btn btn-primary mt-5" />
            </form>
        </div>
    @endif
    <div>
        <a href="{{url('/')}}">Retour à l'accueil</a>
    </div>
@endsection
