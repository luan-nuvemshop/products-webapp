@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    <div align="right">
        <a href="{{ route('product.create') }}" class="btn btn-success btn-sm">Add</a>
    </div><br>
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered table-striped">
        <tr>
            <th width="20%">Image</th>
            <th width="40%">Name</th>
            <th width="40%">Actions</th>
        </tr>
        @foreach($data as $row)
            <tr>
                <td><img src="" alt="" class="img-thumbnail" width="75"></td>
                <td>{{ $row->name }}</td>
                <td>
                    <button class="btn btn-success">Show</button>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@stop