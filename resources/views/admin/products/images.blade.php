@extends('admin.layout')

@section('content')

    <div class="container">
        <h2>Images of {{$product->name}}</h2>
        <a href="{{ route('products.image.create', ['id' => $product->id]) }}" class="btn btn-default">New Images</a>
        <br>
        <br>
        <table class="table">
            <tr>
                <td>ID</td>
                <td>Image</td>
                <td>Extension</td>
                <td>Action</td>
            </tr>
            @foreach($product->images as $image)
                <tr>
                    <td>{{ $image->id  }}</td>
                    <td>
                        <img src="{{ url('uploads/',$image->id.'.'.$image->extension) }}" width="80" alt="">
                    </td>
                    <td>{{ $image->extension }}</td>
                    <td>
                        <a href="{{route('products.image.destroy', ['id'=>$image->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

        <a href="{{ route('products.list') }}" class="btn btn-default">Voltar</a>

    </div>

@endsection