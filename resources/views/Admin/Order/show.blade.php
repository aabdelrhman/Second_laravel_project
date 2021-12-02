@extends('layouts.admin.master')
@section('title')
Order
@endsection
@section('contant')
@if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
    <h3 class="text-dark">Orders Items</h3><hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item Name</th>
                <th scope="col">Category</th>
                <th scope="col">Short Description</th>
                <th scope="col">Amount</th>
                <th scope="col">price</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($items as $index=>$item)
                    <tr>
                        @php
                            $category = App\Models\Item::with('category')->find($item->items->id);
                        @endphp
                        <th scope="row">{{++$index}}</th>
                        <td>{{ $item->items->name }}</td>
                        <td>{{ $category->category->name }}</td>
                        <td>{{ $item->items->short_description }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table><hr>

        <h3 class="text-dark">Client Information</h3><hr>
        <form action="" method="get">
            <div class="row">
                <div class="form-group col-lg-6 col-12">
                    <label for="">First name</label>
                    <input type="text" name="" id="" value="{{ $items[0]->order->fname }}" readonly class="form-control">
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="">last name</label>
                    <input type="text" name="" id="" value="{{ $items[0]->order->lname }}" readonly class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-12">
                    <label for="">Email</label>
                    <input type="text" name="" id="" value="{{ $items[0]->order->email }}" readonly class="form-control">
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="">Phone</label>
                    <input type="text" name="" id="" value="{{ $items[0]->order->phone }}" readonly class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-12">
                    <label for="">Address</label>
                    <input type="text" name="" id="" value="{{ $items[0]->order->addres }}" readonly class="form-control">
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="">City</label>
                    <input type="text" name="" id="" value="{{ $items[0]->order->city }}" readonly class="form-control">
                </div>
            </div>
        </form>
@endsection
