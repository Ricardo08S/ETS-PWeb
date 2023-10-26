@extends('layouts.master')
@section('title')
    View News Page
@endsection

@section('content')
    <div class="row">
        @forelse ($news as $item)
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>{{ $item->title }}</h5>
                        <p class="card-text">{{ Str::limit($item->content, 50) }}</p>
                        <a href="/news/{{ $item->id }}" class="btn btn-primary btn-block">Read More</a>
                        <div class="row my-2">
                            <div class="col">
                                <a href="/news/{{ $item->id }}/edit" class="btn btn-warning btn-block">Edit News</a>
                            </div>
                            <div class="col">
                                <form action="/news/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="delete" class="btn btn-danger btn-block">
                                </form>
                                {{-- <a href="/news/{{ $item->id }}/edit" class="btn btn-danger btn-block">Delete News</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-4">
                <h3>There is no News</h3>
            </div>
        @endforelse
    </div>
    <div class="row">
        <div class="col-4">
            @auth
            <a href="/news/create" class="btn btn-secondary my-2 bg-info">Add News</a>
            @endauth
            <a href="/" class="btn btn-secondary my-2">Back To Dashboard</a>
        </div>
    </div>
@endsection
