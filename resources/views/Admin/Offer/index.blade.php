@extends('layouts.admin.master')
@section('title')
Items Offers
@endsection
@section('contant')
@if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
    <h3 class="text-dark">Offers</h3><hr>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item</th>
                <th scope="col">Offer percent</th>
                <th scope="col">New price</th>
                <th scope="col">Opration</th>
            </tr>
            </thead>
            <tbody>
                @if (isset($items))
                    @foreach ($items as $index=>$item)
                    <tr>
                        <th scope="row">{{++$index}}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->getoffer->offer_percent }}%</td>
                        <td>{{ $item->getoffer->new_price }}$</td>
                        <td>
                            {{-- <a href="{{ Route('category.edit',$category->id) }}" class="btn btn-info">Edit</a> --}}
                            <a href="{{ Route('Delete_Offer',$item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr>No offers</tr>
                @endif
            </tbody>
        </table>
@endsection
