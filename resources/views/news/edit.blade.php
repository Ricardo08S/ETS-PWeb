@extends('layouts.master')
@section('title')
    Edit News Page
@endsection

@section('content')
    <form action="/news/{{ $news->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category_id">
                <option value="">~~~ Select Category ~~~</option>
                @forelse ($categories as $item)
                    @if ($item->id === $news->category_id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @empty
                    <option value="">There is no category</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label>News Title</label>
            <input type="text" name="title" value="{{ $news->title }}"
                class="@error('title') is-invalid @enderror form-control" placeholder="Enter News Title">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>News Content</label>
            <textarea class="@error('content') is-invalid @enderror form-control" name="content" cols="30" rows="10"
                placeholder="Enter News Content">{{ $news->content }}</textarea>
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
    <a href="/news" class="btn btn-secondary my-2">Back</a>
@endsection
