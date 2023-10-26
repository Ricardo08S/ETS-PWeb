@extends('layouts.master')
@section('title')
    Add News Page
@endsection

@section('content')
    <form action="/news" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category_id">
                <option value="">~~~ Select Category ~~~</option>
                @forelse ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @empty
                    <option value="">There is no category</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label>News Title</label>
            <input type="text" name="title" class="@error('title') is-invalid @enderror form-control"
                placeholder="Enter News Title">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>News Content</label>
            <textarea class="@error('content') is-invalid @enderror form-control" name="content" cols="30" rows="10"
                placeholder="Enter News Content"></textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>News Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="/news" class="btn btn-secondary my-2">Back To News</a>
@endsection
