<header class="header-section">
    <div class="container">
        <div class="header-top-wrapper">
            <a href="{{ url('/') }}" class="brand-logo-outer">
                <img src="{{asset('setting/'.$setting->logo)}}">
            </a>
            <div class="search-form-outer">
                <form action="{{url('/view/product/search')}}" method="GET" class="form-group search-form">
                    @csrf
                    <input type="text" name="search" class="form-control" placeholder="Search for items...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="header-top-right-outer">
                <div class="res-search-icon-outer">
                    <i class="fas fa-search"></i>
                </div>
                <div id="cart">
                    <div class="header-top-right-item dropdown">
                        <div class="header-top-right-item-link">
                            <span class="icon-outer">
                                <i class="fas fa-cart-plus"></i>
                                <span class="count-number">{{$carts->count()}}</span>
                            </span>
                            Cart
                        </div>
                        <div class="cart-items-wrapper">
                            <div class="cart-items-outer">
                                @foreach ($carts as $cart)
                                <div class="cart-item-outer">
                                    <a href="#" class="cart-product-image">
                                        <img src="{{asset('product/images/'.$cart->product->image)}}" alt="product">
                                    </a>
                                    <div class="cart-product-name-price">
                                        <a href="#" class="product-name">
                                            {{$cart->product->name}}
                                        </a>
                                        <span class="product-price">
                                            ৳ {{$cart->price}}
                                        </span>
                                    </div>
                                    <div class="cart-item-delete">
                                        <a href="{{url('product/delete/form/cart/'.$cart->id)}}" class="delete-btn">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="shopping-cart-footer">
                                <div class="shopping-cart-total">
                                    <h4>
                                        Total <span>৳ {{$carts->sum('price')}}</span>
                                    </h4>
                                </div>
                                <div class="shopping-cart-button">
                                    <a href="{{url('/user/cart/products')}}" class="view-cart-link">View cart</a>
                                    <a href="{{url('/checkout')}}" class="checkout-link">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-top-right-item dropdown account">
                    {{-- <div class="header-top-right-item-link">
                        @if (auth()->check())
                        <i class="fas fa-user"></i> {{ auth()->user()->name }}
                        @else
                        <i class="fas fa-user"></i> <a href="{{url('/customer/login-form')}}" class="account-list-item-link">Login</a>
                        @endif
                    </div> --}}
                    <ul class="account-list">
                        <li class="account-list-item">
                            @if (auth()->check())
                            {{-- <a href="{{url('customer/dashboard')}}" class="account-list-item-link">
                                <i class="fas fa-user"></i> My Account
                            </a> --}}
                            <a href="{{ route('logout') }}" class="account-list-item-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-user"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                             </form>
                            @endif
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom-wrapper">
            <div class="category-items-wrapper">
                <div class="category-icon-outer">
                    <i class="fas fa-th-large"></i> <span>All Category</span>
                </div>
                <div class="category-items-outer">
                    <ul class="category-list">
                        @foreach ($categories as $category)
                            <li class="category-list-item item-has-submenu">
                                <a href="{{ url('/products/'.$category->slug) }}" class="category-list-item-link">
                                    <img src="{{ asset('/category/'.$category->image) }}" alt="category">
                                    {{ $category->name }}
                                </a>
                                <ul class="nav-item-category-submenu">
                                    @foreach($category->subcategories as $subcategory)
                                        <li class="category-submenu-item">
                                            <a href="{{ url('/subcategory/products/'.$subcategory->slug) }}" class="category-submenu-item-link">
                                                {{ $subcategory->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="manu-wrapper">
                <!-- Nav Toggle Button -->
				<div class="nav-toggle-btn">
					<div class="btn-inner"></div>
				</div>
                <ul class="manu-list">
                    <li class="manu-list-item">
                        <a href="{{ url('/shops') }}" class="manu-list-item-link">
                            Shop
                        </a>
                    </li>
                    @foreach ($allPages as $page)
                       <li class="manu-list-item">
                          <a href="{{ url('/page/products/'. \Illuminate\Support\Str::slug($page->name)) }}" target="_blank" class="manu-list-item-link">
                              {{ ucfirst($page?->name) }}
                          </a>
                       </li>
                    @endforeach
                    <li class="manu-list-item">
                        <a href="{{ url('/return/process') }}" class="manu-list-item-link">
                            Return Process
                        </a>
                    </li>
{{--                  <li class="manu-list-item">--}}
{{--                      <a href="#" class="manu-list-item-link">--}}
{{--                          Order Tracking--}}
{{--                      </a>--}}
{{--                  </li>--}}
                </ul>
            </div>
        </div>
    </div>
</header>
