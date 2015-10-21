@extends('admin.layout')

@section('content')

    <div class="container">
        <h2>Create Products</h2>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'products.store']) !!}
            <div class="form-group">
                {!! Form::label('category', 'Category:') !!}
                {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('featured', 'Featured:') !!}
                {!! Form::select('featured', ['0' => 'No', '1' => 'Yes'], '0', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('recommend', 'Recommend:') !!}
                {!! Form::select('recommend', ['0' => 'No', '1' => 'Yes'], '0', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Add Product', ['class'=>'btn btn-primary form-control']) !!}
            </div>
        {!! Form::close() !!}

    </div>

@endsection