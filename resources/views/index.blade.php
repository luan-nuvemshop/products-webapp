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
                <td><img src="/storage/images/{{$row->image}}" class="img-thumbnail" width="150"></td>
                <td>{{ $row->name }}</td>
                <td>
                    <a href="{{ route('product.show', $row->id) }}" class="btn btn-primary btn-sm">Show</a>
                    <a href="{{ route('product.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('product.destroy', $row->id) }}" method="post" style="display: contents;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@stop