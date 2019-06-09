@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div align="right">
        <a href="{{ route('product.index') }}" class="btn btn-info">Back</a>
    </div>

    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="" class="col-md-4 tex-right">Name</label>
            <div class="col-md-8">
                <input type="text" name="name" class="form-control input-lg" autocomplete="off">
            </div>
            
            <label for="" class="col-md-4 tex-right">Description</label>
            <div class="col-md-8">
                <input type="text" name="description" class="form-control input-lg" autocomplete="off">
            </div>

            <label for="" class="col-md-4 tex-right">Price</label>
            <div class="col-md-8">
                <input type="text" name="price" class="form-control input-lg" autocomplete="off">
            </div>
            <label for="" class="col-md-4 tex-right">Category</label>
            <div class="col-md-8">
                <input type="text" name="category" class="form-control input-lg" autocomplete="off">
            </div>
            <br>
            <div class="col-md-8">
                <input type="submit" name="Add" value="Add" class="btn btn-primary">
            </div>
        </div>
    </form>
@stop