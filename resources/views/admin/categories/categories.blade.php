@extends('admin.layout')

@section('content')

    <div class="container">
        <h2>Categories</h2>
        <a href="{{route('categories.create')}}" class="btn btn-default">New Category</a>
        <br>
        <br>
        <table class="table">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id  }}</td>
                    <td>{{ $category->name  }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{route('categories.edit', ['id'=>$category->id])}}">Edit</a> |
                        <a href="{{route('categories.delete', ['id'=>$category->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection