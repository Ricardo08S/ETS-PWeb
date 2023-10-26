@extends('layouts.master')
@section('title')
    News Detail Page
@endsection

@section('content')

<img src="{{asset('images/'. $news->image)}}" width="100%" height="400px">
<h1 class="text-info">{{$news->title}}</h1>
<p>{{$news->content}}</p>

<a href="/news" class="btn btn-secondary my-2">Back</a>
@endsection