@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    <div align="right">
        <a href="{{ route('product.index') }}" class="btn btn-secondary btn-sm">Back</a>
    </div>

    <form action="{{ route('product.update', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH') 
        <div class="form-group">
            <label for="" class="col-md-4 tex-right">Name</label>
            <div class="col-md-8">
                <input type="text" name="name" class="form-control input-lg" value="{{ $data->name }}">
            </div>
            
            <label for="" class="col-md-4 tex-right">Description</label>
            <div class="col-md-8">
                <input type="text" name="description" class="form-control input-lg" value="{{ $data->description }}">
            </div>

            <label for="" class="col-md-4 tex-right">Price</label>
            <div class="col-md-8">
                <input type="text" name="price" class="form-control input-lg" value="{{ $data->price }}">
            </div>
            <label for="" class="col-md-4 tex-right">Category</label>
            <div class="col-md-8">
                <input type="text" name="category" class="form-control input-lg" value="{{ $data->category }}">
            </div>
            <br>
            <div class="col-md-8">
                <input type="submit" name="Update" value="Update" class="btn btn-primary btn-sm">
            </div>
        </div>     
    </form>
@stop