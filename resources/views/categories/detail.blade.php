@extends('layouts.master')
@section('title')
    Category Detail Page
@endsection
@section('content')
    <h1>{{ $categories->name }}</h1>
    <p>{{ $categories->description }}</p>

    <a href="/category" class="btn btn-sm my-3 btn-secondary">Back</a>
@endsection
