@extends('layouts.admin.master')
@section('title')
Add Category
@endsection
@section('contant')
<h3 class="text-dark">Add Category</h3><hr>
    <form class="mt-5" action="{{ Route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Category name</label>
                <input type="text" name="Category_name" id="" class="form-control" required>
                @error('Category_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Category photo</label>
                <input type="file" name="Category_photo" id="" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group mx-auto my-4">
                <input type="submit" value="Add" class="btn btn-info">
            </div>
        </div>
    </form>
@endsection
