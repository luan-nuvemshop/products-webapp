@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    <div class="jumbotron text-center">
        <div align="right">
            <a href="{{ route('product.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>
        <h3>{{ $data->name }}</h3>
        <h5>{{ $data->description }}</h5>
        <p>${{ $data->price }}</p>
        <p>{{ $data->category }}</p>
    </div>
@stop