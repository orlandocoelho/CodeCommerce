@extends('admin.layout')

@section('content')

    <div class="container">
        <h2>Create Categories</h2>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'categories.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Add Category', ['class'=>'btn btn-primary form-control']) !!}
            </div>
        {!! Form::close() !!}

    </div>

@endsection