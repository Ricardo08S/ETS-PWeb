@extends('layouts.master')
@section('title')
    View Category Page
@endsection
@section('content')
    <a href="/category/create" class="btn btn-secondary bg-info my-2">Add Category</a>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $key => $item)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $item->name }}</td>
                    <td>
                        <form action="/category/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="/category/{{ $item->id }}" class="btn btn-sm btn-info">Detail</a>
                            <a href="/category/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>There Is No Catergories</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="/" class="btn btn-secondary my-2">Back To Dashboard</a>
@endsection
