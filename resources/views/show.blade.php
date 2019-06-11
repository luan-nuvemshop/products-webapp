@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    <div class="jumbotron text-center">
        <div align="right">
            <a href="{{ route('product.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>
        @foreach($data as $row)
        <img src="/storage/images/{{$row->image}}" class="img-thumbnail" width="300">
        <h3>Name: {{ $row->name }}</h3>
        <h5>Description: {{ $row->description }}</h5>
        <p>${{ $row->price }}</p>
        <p>{{ $row->category == "0"  ? 'Clothing' : '' }}</p>
        <p>{{ $row->category == "1"  ? 'Shirts' : '' }}</p>
        <p>{{ $row->category == "2"  ? 'T-shirts' : '' }}</p>
        @endforeach
    </div>
@stop