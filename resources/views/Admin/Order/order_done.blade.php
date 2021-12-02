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
    <h3 class="text-dark">Orders</h3><hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Date order</th>
                <th scope="col">Opration</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index=>$order)
                    <tr>
                        <th scope="row">{{++$index}}</th>
                        <td>{{ $order->fname }}</td>
                        <td>{{ $order->lname }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a href="{{ Route('order_show' , $order->id) }}" class="btn btn-info">Show</a>
                            <a href="" class="btn btn-danger">done</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
