@extends('layouts.site.master')
@section('title')
    Cart
@endsection
@section('main')
<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="#" class="link">home</a></li>
        <li class="item-link"><span>login</span></li>
    </ul>
</div>
<div class=" main-content-area">

    <div class="wrap-iten-in-cart">
        <h3 class="box-title">Products Name</h3>
        <ul class="products-cart">
            @if(isset($cart_items))
                @foreach ($cart_items as $cart)
                @php
                    $image = App\Models\item_images::where('item_id' ,$cart->item_id)->select('image')->first();
                @endphp
                    <li class="pr-cart-item">
                        <div class="product-image" id="product-image">
                            <figure><img src="{{asset('images/item/'.$image->image)}}" alt=""></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="#">{{ $cart->item->name }}</a>
                        </div>
                        <div class="price-field produtc-price"><p class="price">{{ $cart->item->price }}$</p></div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" class="quatity" value="{{ $cart->amount }}" data-max="120" pattern="[0-9]*" >
                                <a class="btn btn-increase quatity_increase" id="quatity_increase" href="#"></a>
                                <a class="quatity_reduce btn btn-reduce" href="#"></a>
                            </div>
                        </div>
                        <div class="price-field sub-total"><p class="price_totel">{{ $cart->item->price*$cart->amount }}$</p></div>
                        <div class="delete">
                            <a href="{{ Route('CartDelete', $cart->id) }}" class="btn delete">
                            <span>Delete from your cart</span>
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>

                            </a>
                            <form action="{{ Route('CartUpdate',$cart->id )}}" class="form_amount" method="post">
                                @csrf
                                <input type="hidden" name="amount" value="" class="amount">
                                <button type="submit" class="btn btn-update update" style="display: none;" title="">
                                    <span>Update your cart</span>
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="pr-cart-item">
                    <div class="product-name">
                        <h1 class="link-to-product" href="">No Items on Your Cart</h1>
                    </div>

                </li>
            @endif
        </ul>
    </div>

    <div class="summary">
        <div class="order-summary">
            <h4 class="title-box">Order Summary</h4>
            <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{$subtutle}}$</b></p>
            <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
            <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{$subtutle}}$</b></p>
        </div>
        <div class="checkout-info">
            <label class="checkbox-field">
                <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
            </label>
            <a class="btn btn-checkout" href="{{ Route('checkout') }}">Check out</a>
            <a class="link-to-shop" href="{{ Route('shop') }}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
        </div>
        <div class="update-clear">
            <a class="btn btn-clear" href="{{ Route('deleteCartItems' , Auth::user()->id) }}">Clear Shopping Cart</a>
            <a class="btn btn-update" href="{{ Route('shop') }}">Update Shopping Cart</a>
        </div>
    </div>

    <div class="wrap-show-advance-info-box style-1 box-in-site">
        <h3 class="title-box">Most Viewed Products</h3>
        <div class="wrap-products">
            <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                            <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item new-label">new</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="#" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                    </div>
                </div>

                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                            <figure><img src="assets/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item sale-label">sale</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="#" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                        <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                    </div>
                </div>

                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                            <figure><img src="assets/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item new-label">new</span>
                            <span class="flash-item sale-label">sale</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="#" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                        <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                    </div>
                </div>

                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                            <figure><img src="assets/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item bestseller-label">Bestseller</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="#" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                    </div>
                </div>

                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                            <figure><img src="assets/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                        </a>
                        <div class="wrap-btn">
                            <a href="#" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                    </div>
                </div>

                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                            <figure><img src="assets/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item sale-label">sale</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="#" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                        <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                    </div>
                </div>

                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                            <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item new-label">new</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="#" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                    </div>
                </div>

                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                            <figure><img src="assets/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item bestseller-label">Bestseller</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="#" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                        <div class="wrap-price"><span class="product-price">$250.00</span></div>
                    </div>
                </div>
            </div>
        </div><!--End wrap-products-->
    </div>

</div><!--end main content area-->
@endsection
