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
                            @if ($order->accepted == 0)
                                <a href="{{ Route('order_accepted' , $order->id) }}" class="btn btn-success">done</a>
                            @elseif ($order->accepted == 1)
                                <a href="{{ Route('order_refused' , $order->id) }}" class="btn btn-danger">Archif</a>
                            @elseif ($order->accepted == 2)
                                <a href="{{ Route('delete_order' , $order->id) }}" class="btn btn-danger">Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
