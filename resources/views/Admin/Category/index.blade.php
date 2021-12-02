@extends('layouts.admin.master')
@section('title')
Categories
@endsection
@section('contant')
@if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
    <h3 class="text-dark">Categories</h3><hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Opration</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index=>$category)
                    <tr>
                        <th scope="row">{{++$index}}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ Route('category.edit',$category->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ Route('DeleteCategory',$category->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
