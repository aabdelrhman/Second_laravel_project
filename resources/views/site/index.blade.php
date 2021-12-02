@extends('layouts.site.master')
@section('title')
    Home
@endsection
@section('main')
    <!--MAIN SLIDE-->
			<div class="wrap-main-slide">
				<div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
					<div class="item-slide">
						<img src="assets/images/main-slider-1-1.jpg" alt="" class="img-slide">
						<div class="slide-info slide-1">
							<h2 class="f-title">Kid Smart <b>Watches</b></h2>
							<span class="subtitle">Compra todos tus productos Smart por internet.</span>
							<p class="sale-info">Only price: <span class="price">$59.99</span></p>
							<a href="{{ Route('shop') }}" class="btn-link">Shop Now</a>
						</div>
					</div>
					<div class="item-slide">
						<img src="assets/images/main-slider-1-2.jpg" alt="" class="img-slide">
						<div class="slide-info slide-2">
							<h2 class="f-title">Extra 25% Off</h2>
							<span class="f-subtitle">On online payments</span>
							<p class="discount-code">Use Code: #FA6868</p>
							<h4 class="s-title">Get Free</h4>
							<p class="s-subtitle">TRansparent Bra Straps</p>
						</div>
					</div>
					<div class="item-slide">
						<img src="assets/images/main-slider-1-3.jpg" alt="" class="img-slide">
						<div class="slide-info slide-3">
							<h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
							<span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
							<p class="sale-info">Stating at: <b class="price">$225.00</b></p>
							<a href="{{ Route('shop') }}" class="btn-link">Shop Now</a>
						</div>
					</div>
				</div>
			</div>

			<!--BANNER-->
			<div class="wrap-banner style-twin-default">
				<div class="banner-item">
					<a href="{{ Route('shop') }}" class="link-banner banner-effect-1">
						<figure><img src="assets/images/home-1-banner-1.jpg" alt="" width="580" height="190"></figure>
					</a>
				</div>
				<div class="banner-item">
					<a href="{{ Route('shop') }}" class="link-banner banner-effect-1">
						<figure><img src="assets/images/home-1-banner-2.jpg" alt="" width="580" height="190"></figure>
					</a>
				</div>
			</div>

			<!--On Offer-->
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">Offers</h3>
				<div class="wrap-countdown mercado-countdown" data-expire="2021-09-29 09:09:44"></div>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    <div class="product product-style-2 equal-elem ">
                    @foreach ($offers as $offer)
						<div class="product-thumnail">
							<a href="{{ Route('detail' , $offer->id) }}" title="{{ $offer->short_description }}">
								<figure><img src="{{ asset('images/item/'.$offer->images[0]->image) }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">Offer</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="{{ Route('detail' , $offer->id) }}" class="product-name"><span>{{ $offer->short_description }}</span></a>
							<div class="wrap-price"><span class="product-price">${{ $offer->getoffer->new_price }}</span></div>
						</div>
                    @endforeach
					</div>

				</div>
			</div>

			<!--Latest Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Latest Products</h3>
				<div class="wrap-top-banner">
					<a href="{{ Route('shop') }}" class="link-banner banner-effect-2">
						<figure><img src="assets/images/digital-electronic-banner.jpg" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                    @foreach ($oldest as $item)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{ Route('detail' , $item->id) }}" title="{{ $item->short_description }}">
                                                    <figure><img src="{{ asset('images/item/'.$item->images[0]->image) }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ Route('detail' , $item->id) }}" class="product-name"><span>{{ $item->short_description }}</span></a>
                                                @if ($item->offer != NULL)
                                                <div class="wrap-price"><ins><p class="product-price">${{ $item->getoffer->new_price }}</p></ins> <del><p class="product-price">${{ $item->price }}</p></del></div>
                                                @else
                                                <div class="wrap-price"><span class="product-price">${{ $item->price }}</span></div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--Product Categories-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Product Categories</h3>
				<div class="wrap-top-banner">
					<a href="{{ Route('shop') }}" class="link-banner banner-effect-2">
						<figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-control">
                            @foreach ($categorys as $category)
                            <a href="#fashion_1{{ $category->id }}" class="tab-control-item">{{ $category->name }}</a>
                            @endforeach
						</div>
						<div class="tab-contents">

                            @foreach ( $categorys as $category )
                                <div class="tab-content-item active" id="fashion_1{{ $category->id }}">
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                            @foreach ( $category->item as $item )
                                                <div class="product product-style-2 equal-elem ">
                                                    @php
                                                        $image = App\Models\item_images::where('item_id' , $item->id)->first();
                                                    @endphp
                                                    <div class="product-thumnail">
                                                        <a href="{{ Route('detail' , $item->id) }}" title="{{ $item->short_description }}">
                                                            <figure><img src="{{ asset('images/item/'.$image->image) }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                                        </a>
                                                        <div class="group-flash">
                                                            <span class="flash-item new-label">new</span>
                                                        </div>
                                                        <div class="wrap-btn">
                                                            <a href="#" class="function-link">quick view</a>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{ Route('detail' , $item->id) }}" class="product-name"><span>{{ $item->name }}</span></a>
                                                        @if ($item->offer != NULL)
                                                        @php
                                                            $offer = App\Models\Offer::where('id' , $item->offer)->first();
                                                        @endphp
                                                            <div class="wrap-price"><ins><p class="product-price">${{ $offer->new_price }}</p></ins> <del><p class="product-price">${{ $item->price }}</p></del></div>
                                                            @else
                                                            <div class="wrap-price"><span class="product-price">${{ $item->price }}</span></div>
                                                            @endif
                                                    </div>
                                                </div>
                                            @endforeach

                                    </div>
                                </div>
                            @endforeach
						</div>
					</div>
				</div>
			</div>
@endsection
