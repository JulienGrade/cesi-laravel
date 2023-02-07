@extends('layouts.app')
@section('title')
    Homepage
@endsection

@section('content')
    <div class="card mt-5 p-5 bg-primary text-white">
        <h1>Welcome to the Laravel Project</h1>
    </div>
    @if(Session::has('add_product_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{Session::get('add_product_success')}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::has('delete_product_success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{Session::get('delete_product_success')}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @foreach($products as $product)
        <div class="card w-50 mx-auto my-5 text-dark">
            <div class="card-header">
                <h1 class="text-center">{{$product->product_name}}</h1>
            </div>
            <div class="card-body">
                <p class="text-center fs-3">{{$product->product_description}}</p>
                <a href="/produit/{{$product->id}}">Voir en détail</a>
            </div>
            <div class="card-footer">
                <p class="text-end text-primary text-bolder fs-2 fw-bold">{{$product->product_price}} €</p>
            </div>
        </div>
    @endforeach
    {{$products->links()}}
@endsection
