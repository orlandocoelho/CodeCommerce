@extends('admin.layout')

@section('content')

    <div class="container">
        <h2>Products</h2>
        <a href="{{route('products.create')}}" class="btn btn-default">New Product</a>
        <br>
        <br>
        <table class="table">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>Featured</td>
                <td>Recommend</td>
                <td>Action</td>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id  }}</td>
                    <td>{{ $product->name  }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->featured }}</td>
                    <td>{{ $product->recommend }}</td>
                    <td>
                        <a href="{{route('products.edit', ['id'=>$product->id])}}">Edit</a> |
                        <a href="{{route('products.delete', ['id'=>$product->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection