@extends('frontend.v-2.master')

@section('title')
    Home
@endsection

@section('content-v2')
    <section class="home-slider-section container">
        <div class="slider-items-wrapper">
            @foreach($sliders as $slider)
            <div class="slider-item-outer">
                <img src="{{ asset('/setting/'.$slider->image) }}" alt="image">
            </div>
            @endforeach
        </div>
    </section>
    <!-- /Home Slider -->

    <!-- Categoris Slider -->
    <section class="categoris-slider-section">
        <div class="container">
            <div class="section-title-outer">
                <h1 class="title">
                    Categories
                </h1>
            </div>
            <div class="categoris-items-wrapper owl-carousel">
                @foreach ($categories as $category)
                    <a href="{{ url('/products/'.$category->slug) }}" class="categoris-item">
                        <img src="{{ asset('/category/'.$category->image) }}" alt="category" />
                        <h6 class="categoris-name">{{ $category->name }}</h6>
                        <span class="items-number">{{ count($category->products) }} items</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Categoris Slider -->

    <!-- Banner -->
    <section class="banner-section">
        <div class="container">
            <div class="row">
                @foreach($topBanners as $topBanner)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="banner-item-outer">
                            <img src="{{ asset('/setting/'.$topBanner->image) }}" alt="banner image" />
                            <div class="banner-content">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Banner -->
    <!-- Popular Product -->
    @if(count($hot_products) > 0)
    <section class="product-section">
        <div class="container">
            <div class="section-title-outer">
                <h1 class="title">
                    Hot Products
                </h1>
            </div>
            <div class="row">
                @foreach ($hot_products as $product)
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="product-item-wrapper">
                        <div class="product-image-outer">
                            @if ($product->is_variable == true)
                            <a href="{{url('variable-product/'.$product->slug)}}" class="product-imgae">
                            @else
                            <a href="{{url('product/'.$product->slug)}}" class="product-imgae">
                            @endif
                                <img src="{{asset('product/images/'.$product->image)}}" class="main-image" alt="product image">
                            </a>
                            <div class="product-badges hot">
                                <span style="text-transform: capitalize">{{$product->product_type}}</span>
                            </div>
                        </div>
                        <div class="product-content-outer">
                            @if ($product->is_variable == true)
                            <a href="{{url('variable-product/'.$product->slug)}}" class="product-name">
                            @else
                            <a href="{{url('product/'.$product->slug)}}" class="product-name">
                            @endif
                                {{mb_strlen($product->name, 'UTF-8') > 50 ? mb_substr($product->name, 0, 50, 'UTF-8') . '....' : $product->name}}
                            </a>
                            <div class="product-item-bottom">
                                <div class="product-price">
                                    @if ($product->discount_price != null)
                                    <span>{{$product->discount_price}} Tk.</span>
                                    @else
                                    <span>{{$product->regular_price}} Tk.</span>
                                    @endif
                                </div>
                                <div class="add-cart">
                                    <a href="{{url('/add/to/cart/'.$product->id.'/add_cart')}}" class="add-cart-btn">
                                        <i class="fas fa-shopping-cart"></i>
                                        Add
                                    </a>
                                </div>
                            </div>
                            <a href="{{url('/add/to/cart/'.$product->id.'/quick_order')}}" class="quick-order-btn-inner">Quick Order</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Popular Product -->
    @endif
    @if(count($new_products) > 0)
    <!-- Popular Product -->
    <section class="product-section">
        <div class="container">
            <div class="section-title-outer">
                <h1 class="title">
                    New Arrival
                </h1>
            </div>
            <!-- <new-arrival-products></new-arrival-products> -->
            <div class="row">
                @foreach ($new_products as $product)
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="product-item-wrapper">
                        <div class="product-image-outer">
                            @if ($product->is_variable == true)
                            <a href="{{url('variable-product/'.$product->slug)}}" class="product-imgae">
                            @else
                            <a href="{{url('product/'.$product->slug)}}" class="product-imgae">
                            @endif
                                <img src="{{asset('product/images/'.$product->image)}}" class="main-image" alt="product image">
                            </a>
                            <div class="product-badges hot">
                                <span style="text-transform: capitalize">{{$product->product_type}}</span>
                            </div>
                        </div>
                        <div class="product-content-outer">
                            @if ($product->is_variable == true)
                            <a href="{{url('variable-product/'.$product->slug)}}" class="product-name">
                            @else
                            <a href="{{url('product/'.$product->slug)}}" class="product-name">
                            @endif
                                {{mb_strlen($product->name, 'UTF-8') > 50 ? mb_substr($product->name, 0, 50, 'UTF-8') . '....' : $product->name}}
                            </a>
                            <div class="product-item-bottom">
                                <div class="product-price">
                                    @if ($product->discount_price != null)
                                    <span>{{$product->discount_price}} Tk.</span>
                                    @else
                                    <span>{{$product->regular_price}} Tk.</span>
                                    @endif
                                </div>
                                <div class="add-cart">
                                    <a href="{{url('/add/to/cart/'.$product->id.'/add_cart')}}" class="add-cart-btn">
                                        <i class="fas fa-shopping-cart"></i>
                                        Add
                                    </a>
                                </div>
                            </div>
                            <a href="{{url('/add/to/cart/'.$product->id.'/quick_order')}}" class="quick-order-btn-inner">Quick Order</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Popular Product -->
    @endif
    @if(count($regular_products) > 0)
    <!-- Popular Product -->
    <section class="product-section">
        <div class="container">
            <div class="section-title-outer">
                <h1 class="title">
                    Regular Products
                </h1>
            </div>
            <!-- <feature-products></feature-products> -->
            <div class="row">
                @foreach ($regular_products as $product)
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="product-item-wrapper">
                        <div class="product-image-outer">
                            @if ($product->is_variable == true)
                            <a href="{{url('variable-product/'.$product->slug)}}" class="product-imgae">
                            @else
                            <a href="{{url('product/'.$product->slug)}}" class="product-imgae">
                            @endif
                                <img src="{{asset('product/images/'.$product->image)}}" class="main-image" alt="product image">
                            </a>
                            <div class="product-badges hot">
                                <span style="text-transform: capitalize">{{$product->product_type}}</span>
                            </div>
                        </div>
                        <div class="product-content-outer">
                            @if ($product->is_variable == true)
                            <a href="{{url('variable-product/'.$product->slug)}}" class="product-name">
                            @else
                            <a href="{{url('product/'.$product->slug)}}" class="product-name">
                            @endif
                                {{mb_strlen($product->name, 'UTF-8') > 50 ? mb_substr($product->name, 0, 50, 'UTF-8') . '....' : $product->name}}
                            </a>
                            <div class="product-item-bottom">
                                <div class="product-price">
                                    @if ($product->discount_price != null)
                                    <span>{{$product->discount_price}} Tk.</span>
                                    @else
                                    <span>{{$product->regular_price}} Tk.</span>
                                    @endif
                                </div>
                                <div class="add-cart">
                                    <a href="{{url('/add/to/cart/'.$product->id.'/add_cart')}}" class="add-cart-btn">
                                        <i class="fas fa-shopping-cart"></i>
                                        Add
                                    </a>
                                </div>
                            </div>
                            <a href="{{url('/add/to/cart/'.$product->id.'/quick_order')}}" class="quick-order-btn-inner">Quick Order</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Popular Product -->
    @endif
    @if(count($discount_products) > 0)
     <!-- Popular Product -->
    <section class="product-section">
        <div class="container">
            <div class="section-title-outer">
                <h1 class="title">
                    Discount Products
                </h1>
            </div>
            <!-- <discount-products></discount-products> -->
            <div class="row">
                @foreach ($discount_products as $product)
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="product-item-wrapper">
                        <div class="product-image-outer">
                            @if ($product->is_variable == true)
                            <a href="{{url('variable-product/'.$product->slug)}}" class="product-imgae">
                            @else
                            <a href="{{url('product/'.$product->slug)}}" class="product-imgae">
                            @endif
                                <img src="{{asset('product/images/'.$product->image)}}" class="main-image" alt="product image">
                            </a>
                            <div class="product-badges hot">
                                <span style="text-transform: capitalize">{{$product->product_type}}</span>
                            </div>
                        </div>
                        <div class="product-content-outer">
                            @if ($product->is_variable == true)
                            <a href="{{url('variable-product/'.$product->slug)}}" class="product-name">
                            @else
                            <a href="{{url('product/'.$product->slug)}}" class="product-name">
                            @endif
                                {{mb_strlen($product->name, 'UTF-8') > 50 ? mb_substr($product->name, 0, 50, 'UTF-8') . '....' : $product->name}}
                            </a>
                            <div class="product-item-bottom">
                                <div class="product-price">
                                    @if ($product->discount_price != null)
                                    <span>{{$product->discount_price}} Tk.</span>
                                    @else
                                    <span>{{$product->regular_price}} Tk.</span>
                                    @endif
                                </div>
                                <div class="add-cart">
                                    <a href="{{url('/add/to/cart/'.$product->id.'/add_cart')}}" class="add-cart-btn">
                                        <i class="fas fa-shopping-cart"></i>
                                        Add
                                    </a>
                                </div>
                            </div>
                            <a href="{{url('/add/to/cart/'.$product->id.'/quick_order')}}" class="quick-order-btn-inner">Quick Order</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Popular Product -->
    @endif
@endsection
