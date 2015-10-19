@extends('admin.layout')

@section('content')

    <div class="container">
        <h2>Edit Categories: {{ $category->name }}</h2>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>['categories.update', $category->id], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Save Category', ['class'=>'btn btn-primary form-control']) !!}
            </div>
        {!! Form::close() !!}

    </div>

@endsection