@extends('layouts.admin.master')
@section('title')
Edit Category
@endsection
@section('contant')
<h3 class="text-dark">Edit Category</h3><hr>
@if (isset($category))
    <form class="mt-5" action="{{ Route('category.update' , $category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Category Name</label>
                <input type="text" name="Category_name" id="" class="form-control" value="{{ $category->name }}" required>
                @error('Category_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="profileimage">Category Photo</label>
                <img src="{{ asset($category->image) }}" onclick="triggerclick()" class="w-100" id="prodis">
                <input type="file" name="Category_photo" onchange="displayimage(this)" id="profileimage" style="display:none;">
            </div>
        </div>
        <div class="row">
            <div class="form-group mx-auto my-4">
                <input type="submit" value="Update" class="btn btn-info">
            </div>
        </div>
    </form>
@endif
@endsection
