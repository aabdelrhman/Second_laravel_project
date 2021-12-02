@extends('layouts.admin.master')
@section('title')
Items
@endsection
@section('contant')
@if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
    <h3 class="text-dark">Items</h3><hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Opration</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($items as $index=>$item)
                    <tr>
                        <th scope="row">{{++$index}}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="{{ Route('item.edit',$item->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ Route('deleteitem',$item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
