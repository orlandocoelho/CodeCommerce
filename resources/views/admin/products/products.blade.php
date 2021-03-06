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
                <td>Category</td>
                <td>Action</td>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id  }}</td>
                    <td>
                        {{ $product->name  }}
                        <br />
                        <span>{{ $product->tagList }}</span>
                    </td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->featured == 1 ? 'Yes' : 'No' }}</td>
                    <td>{{ $product->recommend == 1 ? 'Yes' : 'No' }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{route('products.edit', ['id'=>$product->id])}}">Edit</a> |
                        <a href="{{route('products.images', ['id'=>$product->id])}}">Images</a> |
                        <a href="{{route('products.delete', ['id'=>$product->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $products->render() !!}
    </div>

@endsection