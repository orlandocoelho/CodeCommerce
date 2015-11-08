@extends('admin.layout')

@section('content')

    <div class="container">
        <h2>Upload Image</h2>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ['products.image.store', $product->id], 'method'=>'post', 'enctype'=>"multipart/form-data"]) !!}
            <div class="form-group">
                {!! Form::label('image', 'Image:') !!}
                {!! Form::file('image', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Add Image', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}

    </div>

@endsection