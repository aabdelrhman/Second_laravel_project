@extends('layouts.admin.master')
@section('title')
Add Offer
@endsection
@section('contant')
<h3 class="text-dark">Add Offer</h3><hr>
    <form class="mt-5" action="{{ Route('offer.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Offer item</label>
                <select name="item_id" id="item_id" class="form-control">
                <option value="">-- Choose Item --</option>
                    @foreach ($items as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('item_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Offer percent</label>
                <input type="text" name="percent" id="percent" class="form-control">
                @error('percent')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">Item price</label>
                <input type="text" name="price" id="price" class="form-control">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">New price</label>
                <input type="text" name="new_price" id="new_price" class="form-control" readonly>
                @error('new_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-6 col-12 form-group my-4">
                <label for="">New price</label>
                <input type="date" name="date_expired" date-format="Y/m/d" id="date_expired" class="form-control">
                @error('date_expired')
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
@section('js')
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function() {
        $("#item_id").change(function(){
            var item_id = $("#item_id").val();
            var url = "{{URL('admin/get_price')}}";
            dltUrl = url+"/"+item_id;
            $.ajax({
                    url: dltUrl,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#price').val(data);
                    },
                });
        });
        $('#percent').keyup(function(){
            var percent = $(this).val();
            var price =$('#price').val();
            var new_price = price - (price * (percent/100)) ;
            $('#new_price').val(new_price);
        });
    });

</script>
@endsection
