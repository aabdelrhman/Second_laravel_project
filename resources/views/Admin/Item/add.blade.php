@extends('layouts.admin.master')
@section('title')
Add Item
@endsection
@section('contant')
<h3 class="text-dark">Add Item</h3><hr>
    <form class="mt-5" action="{{ Route('item.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Item name</label>
                <input type="text" name="Item_name" id="" class="form-control" required>
                @error('Item_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Item Category</label>
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Item price</label>
                <input type="text" name="Item_price" id="" class="form-control" required>
                @error('Item_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Item short description</label>
                <input type="text" name="Item_sdescrioption" id="" class="form-control" required>
                @error('Item_sdescrioption')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Item photo</label>
                <input type="file" name="Item_photo[]" id="" class="form-control" multiple>
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Item descrption</label>br
                <textarea name="item_descrption" id="" cols="" rows="" class="form-control"></textarea>
                @error('item_descrption')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group mx-auto my-4">
                <input type="submit" value="Add" class="btn btn-info">
            </div>
        </div>
    </form>
@endsection
