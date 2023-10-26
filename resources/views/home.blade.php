@extends('layouts.master')
@section('title')
    News Portal
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Our Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/news/create">Create a New Post</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="/news">See Other People's Posts</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/category/create">Add New Category</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">Welcome to Our Website</h1>
            <p class="lead">Discover and share amazing posts from around the world.</p>
        </div>
    @endsection
