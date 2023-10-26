@extends('layouts.master')
@section('title')
    Edit category Page
@endsection
@section('content')
    <form action="/category/{{ $categories->id }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" value="{{ $categories->name }}" name="name"
                class="@error('name') is-invalid @enderror form-control" placeholder="Enter Category Name">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="@error('description') is-invalid @enderror form-control" name="description" cols="30"
                rows="10" placeholder="Enter Category Description">{{ $categories->description }}</textarea>
        </div>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="/category" class="btn btn-sm my-3 btn-secondary">Back</a>
@endsection
