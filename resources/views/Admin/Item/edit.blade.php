@extends('layouts.admin.master')
@section('title')
Edit Item
@endsection
@section('contant')
<h3 class="text-dark">Edit Item</h3><hr>
@if (isset($item))
    <form class="mt-5" action="{{ Route('item.update' , $item->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Item Name</label>
                <input type="text" name="Item_name" id="" class="form-control" value="{{ $item->name }}" required>
                @error('Item_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Item category</label>
                <select name="category" id="" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if ($item->category->id == $category->id)
                                selected
                            @endif
                            >{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Item price</label>
                <input type="text" name="Item_price" id="" class="form-control" required value="{{ $item->price }}">
                @error('Item_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Item short description</label>
                <input type="text" name="Item_sdescrioption" id="" class="form-control" value="{{ $item->short_description }}" required>
                @error('Item_sdescrioption')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Item descrption</label>br
                <textarea name="item_descrption" id="" cols="" rows="" class="form-control">{{ $item->description }}</textarea>
                @error('item_descrption')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <a href="{{ Route('show_image' , $item->id) }}" class="btn btn-info"> Show and Edit Item Images</a>
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
