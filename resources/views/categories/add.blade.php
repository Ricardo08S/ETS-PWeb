@extends('layouts.master')
@section('title')
    Add Categories Page
@endsection

@section('content')
    <form action="/category" method="POST">
        @csrf
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="name" class="@error('name') is-invalid @enderror form-control"
                placeholder="Enter Category Name">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="@error('description') is-invalid @enderror form-control" name="description" cols="30"
                rows="10" placeholder="Enter Description"></textarea>
        </div>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="/category" class="btn btn-secondary my-2">Back To Category</a>
@endsection
