@extends('admin.layout')

@section('content')
    <ul>
        @foreach($categories as $category)
            <li>{{  $category->name }}</li>
        @endforeach
    </ul>
@endsection