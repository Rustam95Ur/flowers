<header class="main-header-area mb-1">
    <!-- Main Header Area Start -->
    <div class="d-none d-lg-flex mb-3">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4  mt-3 col-xs-12">
                    <h4 class="text-pink mb-0 text-uppercase">
                        <a href="#select_city_modal" title="select_city" data-toggle="modal"
                           data-target="#select_city_modal">
                            @if ($selected_city)
                                <i class="lnr lnr-map-marker"></i>{{$selected_city_name->title}}

                            @else
                                <i class="lnr lnr-map-marker"></i>Ваш город
                            @endif
                        </a>
                    </h4>
                </div>
                <div class="col-md-4 mt-1 col-xs-12">
                    <div class="header-logo d-flex justify-content-center">
                        <a href="{{route('home')}}">
                            <img class="img-full" src="{{ Voyager::image(setting('site.logo'))}}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mt-3 col-xs-12">
                    <h4 class="text-pink mb-3"><i class="lnr lnr-smartphone"></i>
                        <a href="tel:{{Voyager::setting('site.phone')}}">{{Voyager::setting('site.phone')}}</a>
                    </h4>
                    <h4 class="text-pink mb-0"><i class="lnr lnr-envelope"></i>
                        <a href="mailto:{{Voyager::setting('site.email')}}">{{Voyager::setting('site.email')}}</a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header header-sticky">
        <div class="container-fluid header-block">
            <div class="row align-items-center">
                <div class="col-lg-2 col-xl-2 col-md-6 col-6 col-custom d-block d-sm-none">
                    <div class="header-logo d-flex align-items-center">
                        <a href="{{route('home')}}">
                            <img class="img-full" src="{{ Voyager::image(setting('site.logo'))}}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 d-none d-lg-flex justify-content-center col-custom">

                    <nav class="main-nav mr-5 d-none d-lg-flex">
                        <ul class="nav">
                            <li>
                                <a>
                                    <span class="menu-text"> {{trans('header.flowers')}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-submenu dropdown-hover">
                                    <li><a href="{{route('shop')}}">{{trans('header.category.all')}}</a></li>
                                    @foreach($categories as $category)
                                        @if(!$category->parent_id)
                                            <li>
                                                <a href="{{route('shop')}}?categories[]={{$category->id}}">{{$category->name}}
                                                    @foreach($categories as $chill_category)
                                                        @if($chill_category->parent_id == $category->id)
                                                            <span class="fa fa-angle-down"></span>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </a>
                                                @foreach($categories as $chill_category)
                                                    @if($chill_category->parent_id == $category->id)
                                                        <ul class="dropdown-submenu-v2">
                                                            <li>
                                                                <a href="{{route('shop')}}?categories[]={{$chill_category->id}}">{{$chill_category->name}} </a>
                                                            </li>
                                                        </ul>
                                                    @endif
                                                @endforeach
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('home')}}">
                                    <span class="menu-text"> {{trans('header.type_bouquet')}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-submenu dropdown-hover">
                                    @foreach($types as $type)
                                        @if(!$type->parent_id)
                                            <li>
                                                <a href="{{route('shop')}}?types[]={{$type->id}}">{{$type->title}}
                                                    @foreach($types as $chill_type)
                                                        @if($chill_type->parent_id == $type->id)
                                                            <span class="fa fa-angle-down"></span>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </a>
                                                <ul class="dropdown-submenu-v2">
                                                    @foreach($types as $chill_type)
                                                        @if($chill_type->parent_id and $chill_type->parent_id == $type->id)
                                                            <li>
                                                                <a href="{{route('shop')}}?types[]={{$chill_type->id}}">{{$chill_type->title}} </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('home')}}">
                                    <span class="menu-text"> {{trans('header.intendeds')}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-submenu dropdown-hover">
                                    @foreach($intendeds as $intended)
                                        <li>
                                            <a href="{{route('shop')}}?intendeds[]={{$intended->id}}">{{$intended->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="menu-text"> {{trans('header.price')}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-submenu dropdown-hover">
                                    <li>
                                        <a href="{{route('shop')}}?price[]=0-10000">
                                            {{trans('header.price_to', ['price'=>10000])}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('shop')}}?price[]=10000-25000">
                                            {{trans('header.price_from_to', ['from_price'=>10000, 'to_price' => 25000])}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('shop')}}?price[]=25000-50000">
                                            {{trans('header.price_from_to', ['from_price'=>25000, 'to_price' => 50000])}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('shop')}}?price[]=50000-200000">
                                            {{trans('header.price_from', ['price' => 50000])}}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="menu-text"> {{trans('header.information')}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-submenu dropdown-hover">
                                    @foreach($pages as $page )
                                        <li><a href="{{route('information_page', $page->slug)}}">{{$page->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li>
                                <a href="{{route('calculator')}}">
                                    <span class="menu-text">{{trans('header.calculator')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">
                                    <span class="menu-text">{{trans('header.contact')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('galleries')}}">
                                    <span class="menu-text">{{trans('header.gallery')}}</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-6 col-6 col-custom justify-content-end">
                    <div class="header-right-area main-nav">
                        <ul class="nav">
                            <li class="minicart-wrap">
                                <a href="{{route('wishlists')}}" class="minicart-btn toolbar-btn">
                                    <i class="fa fa-heart"></i>
                                    <span class="cart-item_count" id="wish_count">{{ $wish_count }}</span>
                                </a>
                            </li>
                            <li class="minicart-wrap" id="mini_cart">
                                @include('cart.header_cart')
                            </li>
                            <li class="sidemenu-wrap">
                                <a href="#"><i class="fa fa-search"></i> </a>
                                <ul class="dropdown-sidemenu dropdown-hover-2 dropdown-search">
                                    <li>
                                        <form action="{{route('shop')}}">
                                            <label for="search" class="d-none"></label>
                                            <input name="title" id="search" placeholder="Поиск" type="text">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="account-menu-wrap d-none d-lg-flex">
                                <a href="#" class="off-canvas-menu-btn">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                            <li class="mobile-menu-btn d-lg-none">
                                <a class="off-canvas-btn" href="#">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header Area End -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper" id="mobileMenu">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="fa fa-times"></i>
            </div>
            <div class="off-canvas-inner">
                <div class="search-box-offcanvas">
                    <form action="{{route('shop')}}">
                        <label for="search_product" class="d-none"></label><input id="search_product" type="text"
                                                                                  name="title" placeholder="Поиск...">
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- mobile menu start -->
                <div class="mobile-navigation">
                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a href="#">{{trans('header.flowers')}}</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('shop')}}">{{trans('header.category.all')}}</a></li>
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{route('shop')}}?categories[]={{$category->id}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="#">{{trans('header.type_bouquet')}}</a>
                                <ul class="dropdown">
                                    @foreach($types as $type)
                                        @if(!$type->parent_id)
                                            <li>
                                                <a href="{{route('shop')}}?types[]={{$type->id}}">{{$type->title}}
                                                    @foreach($types as $chill_type)
                                                        @if($chill_type->parent_id == $type->id)
                                                            <span class="fa fa-angle-down"></span>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </a>
                                                <ul class="dropdown-submenu-v2">
                                                    @foreach($types as $chill_type)
                                                        @if($chill_type->parent_id and $chill_type->parent_id == $type->id)
                                                            <li>
                                                                <a href="{{route('shop')}}?types[]={{$chill_type->id}}">{{$chill_type->title}} </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="#"> {{trans('header.intendeds')}}</a>
                                <ul class="dropdown">
                                    @foreach($intendeds as $intended)
                                        <li>
                                            <a href="{{route('shop')}}?intendeds[]={{$intended->id}}">{{$intended->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="#"> {{trans('header.price')}}</a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="{{route('shop')}}?price[]=0-10000">
                                            {{trans('header.price_to', ['price'=>10000])}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('shop')}}?price[]=10000-25000">
                                            {{trans('header.price_from_to', ['from_price'=>10000, 'to_price' => 25000])}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('shop')}}?price[]=25000-50000">
                                            {{trans('header.price_from_to', ['from_price'=>25000, 'to_price' => 50000])}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('shop')}}?price[]=50000-200000">
                                            {{trans('header.price_from', ['price' => 50000])}}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="#"> {{trans('header.information')}}</a>
                                <ul class="dropdown">
                                    @foreach($pages as $page )
                                        <li><a href="{{route('information_page', $page->slug)}}">{{$page->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{route('calculator')}}">{{trans('header.calculator')}}</a></li>
                            <li><a href="{{route('contact')}}">{{trans('header.contact')}}</a></li>
                            <li><a href="{{route('galleries')}}">{{trans('header.gallery')}}</a></li>

                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->
                <div class="offcanvas-widget-area">
                    <div class="switcher">
                        <div class="language">
                            <span class="switcher-title">{{trans('header.language')}}: </span>
                            <div class="switcher-menu">
                                <ul>
                                    <li><a href="#">{{trans('header.languages.'.$locale)}}</a>
                                        <ul class="switcher-dropdown">
                                            @foreach(trans('header.languages') as $key => $language)
                                                @if (config()->get('route_prefix'))
                                                    <li>
                                                        <a href="{{str_replace($locale, $key, request()->url())}}">{{$language}}</a>
                                                    </li>
                                                @else
                                                    @if(request()->route()->getName() == 'home')
                                                        <li>
                                                            <a href="{{url($key, stristr(request()->url(), $key, false))}}">{{$language}}</a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ url($key.'/'.request()->route()->getName()) }}">{{$language}}</a>
                                                        </li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="top-info-wrap text-left text-black">
                        <ul class="address-info">
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="tel:{{Voyager::setting('site.phone')}}">{{Voyager::setting('site.phone')}}</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:{{Voyager::setting('site.email')}}">{{Voyager::setting('site.email')}}</a>
                            </li>
                        </ul>
                        <div class="widget-social">
                            <a class="facebook-color-bg" title="Facebook-f" href="#"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="twitter-color-bg" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="linkedin-color-bg" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                            <a class="youtube-color-bg" title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                            <a class="vimeo-color-bg" title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-menu-wrapper" id="sideMenu">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="off-canvas-inner">
                <div class="btn-close-off-canvas">
                    <i class="fa fa-times"></i>
                </div>
                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <ul class="menu-top-menu">
                        <li><a>{{trans('header.about_us')}}</a></li>
                    </ul>
                    <p class="desc-content">{{Voyager::setting('site.description')}}</p>
                    <div class="switcher">
                        <div class="language">
                            <span class="switcher-title">{{trans('header.language')}}: </span>
                            <div class="switcher-menu">
                                <ul>
                                    <li>
                                        <a href="#">{{trans('header.languages.'.$locale)}}</a>
                                        <ul class="switcher-dropdown">
                                            @foreach(trans('header.languages') as $key => $language)
                                                @if (config()->get('route_prefix'))
                                                    <li>
                                                        <a href="{{str_replace($locale, $key, request()->url())}}">{{$language}}</a>
                                                    </li>
                                                @else
                                                    @if(request()->route()->getName() == 'home')
                                                        <li>
                                                            <a href="{{url($key, stristr(request()->url(), $key, false))}}">{{$language}}</a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ url($key.'/'.request()->route()->getName()) }}">{{$language}}</a>
                                                        </li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{--                        <div class="currency">--}}
                        {{--                            <span class="switcher-title">Currency: </span>--}}
                        {{--                            <div class="switcher-menu">--}}
                        {{--                                <ul>--}}
                        {{--                                    <li><a href="#">$ USD</a>--}}
                        {{--                                        <ul class="switcher-dropdown">--}}
                        {{--                                            <li><a href="#">€ EUR</a></li>--}}
                        {{--                                        </ul>--}}
                        {{--                                    </li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="top-info-wrap text-left text-black">
                        <ul class="address-info">
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="tel:{{Voyager::setting('site.phone')}}">{{Voyager::setting('site.phone')}}</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:{{Voyager::setting('site.email')}}">{{Voyager::setting('site.email')}}</a>
                            </li>
                        </ul>
                        <div class="widget-social">
                            <a class="facebook-color-bg" title="Facebook-f" href="#"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="twitter-color-bg" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="linkedin-color-bg" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                            <a class="youtube-color-bg" title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                            <a class="vimeo-color-bg" title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                        </div>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
</header>
