@extends('layouts.site.master')
@section('title')
    Checkout
@endsection
@section('main')
<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="#" class="link">home</a></li>
        <li class="item-link"><span>Checkout</span></li>
    </ul>
</div>
<div class=" main-content-area">
    <div class="wrap-address-billing">
        <h3 class="box-title">Billing Address</h3>
        <form action="{{ Route('StoreOrder') }}" method="post" name="frm-billing">
            @csrf
            <p class="row-in-form">
                <label for="fname">first name<span>*</span></label>
                <input id="fname" type="text" name="fname" value="{{ Auth::user()->name }}" placeholder="Your name" required>
                @error('fname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </p>
            <p class="row-in-form">
                <label for="lname">last name<span>*</span></label>
                <input id="lname" type="text" name="lname" value="" placeholder="Your last name" required>
                @error('lname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </p>
            <p class="row-in-form">
                <label for="email">Email Addreess:</label>
                <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" placeholder="Type your email" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </p>
            <p class="row-in-form">
                <label for="phone">Phone number<span>*</span></label>
                <input id="phone" type="text" name="phone" value="" placeholder="10 digits format" required>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </p>
            <p class="row-in-form">
                <label for="add">Address:</label>
                <input id="add" type="text" name="add" value="" placeholder="Street at apartment number" required>
                @error('add')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </p>
            <p class="row-in-form">
                <label for="city">Town / City<span>*</span></label>
                <input id="city" type="text" name="city" value="" placeholder="City name" required>
                @error('city')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </p>
            <p class="form-group text-center">
                <input type="submit" value="Order Now" class="btn btn-danger">
            </p>
        </form>
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
