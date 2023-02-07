@extends('layouts.app')
@section('title')
    Homepage
@endsection

@section('content')
    <div class="card mt-5 p-5 bg-primary text-white">
        <h1>Welcome {{$name}} to the Laravel Project</h1>
    </div>
@endsection
