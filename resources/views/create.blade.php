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
        <a href="{{ route('product.index') }}" class="btn btn-secondary btn-sm">Back</a>
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
                <select name="category" class="form-control">
                    <option value="0">Clothing</option>
                    <option value="1">Shirts</option>
                    <option value="2">T-shirts</option>
                </select>
            </div>
            <label for="" class="col-md-4 tex-right">Image</label>
            <div class="col-md-8">
                <label for="files" class="btn btn-dark btn-sm">Choose Image</label>
                <input id="files" type="file" style="visibility:hidden;" name="image">
            </div>
            <br>
            <div class="col-md-8">
                <input type="submit" name="Add" value="Add" class="btn btn-primary btn-sm">
            </div>
        </div>
    </form>
@stop