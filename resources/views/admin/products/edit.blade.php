@extends('admin.layout')

@section('content')

    <div class="container">
        <h2>Edit Products: {{$product->name}}</h2>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>['products.update', $product->id], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('featured', 'Featured:') !!}
                {!! Form::select('featured', ['0' => 'No', '1' => 'Yes'], $product->featured, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('recommend', 'Recommend:') !!}
                {!! Form::select('recommend', ['0' => 'No', '1' => 'Yes'], $product->recommend, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Save Product', ['class'=>'btn btn-primary form-control']) !!}
            </div>
        {!! Form::close() !!}

    </div>

@endsection