@extends('layouts.admin.master')
@section('title')
Item Images
@endsection
@section('contant')
@if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
<div class="row">
    <div class="col-lg-6 col-12 text-left">
        <h3 class="text-dark">Item Images</h3>
    </div>
    <div class="col-lg-6 col-12 text-right">
        <form action="" method="post">
            <a href="{{ Route('add_image' , $item_id) }}" class="btn btn-success">Add Image</a>
             </form>
    </div>
</div>
    <hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Opration</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($images as $index=>$image)
                    <tr>
                        <th scope="row">{{++$index}}</th>
                        <td class="text-center"><a href="{{ asset('images/item/'.$image->image) }}"><img src="{{ asset('images/item/'.$image->image) }}" alt="{{$image->image}}" class="rounded-circle" width="200px"></a></td>
                        <td>
                            <a href="{{ Route('delete_image',$image->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
