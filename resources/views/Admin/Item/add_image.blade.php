@extends('layouts.admin.master')
@section('title')
Add Item Image
@endsection
@section('contant')
<h3 class="text-dark">Add Item Image</h3><hr>
    <form class="mt-5" action="{{ Route('store_image' , $item_id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-12 form-group my-4">
                <img src="{{ asset('images/images.png') }}" onclick="triggerclick()" class="" width="300px" id="prodis">
                <input type="file" name="item_photo" onchange="displayimage(this)" id="profileimage" style="display:none;">
            </div>
        </div>
        <div class="row">
            <div class="form-group mx-auto my-4">
                <input type="submit" value="Add" class="btn btn-info">
            </div>
        </div>
    </form>
@endsection
