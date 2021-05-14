@extends('layouts.app')
@section('content')
    <!-- Slider/Intro Section Start -->
    <div class="intro11-slider-wrap section-2 mrl-50">
        <div class="intro11-slider swiper-container">
            <div class="swiper-wrapper">
                <div class="intro11-section swiper-slide slide-4 slide-bg-2 bg-position">
                    <!-- Intro Content Start -->
                    <div class="intro11-content-2 text-center">
                        <h1 class="different-title">{{trans('page.home.welcome')}}</h1>
                        <h2 class="title text-uppercase">{{Voyager::setting('site.title')}}</h2>
                        <a href="{{route('shop')}}" class="btn flosun-button secondary-btn theme-color rounded-0">
                            {{trans('page.home.shops')}}
                        </a>
                    </div>
                    <!-- Intro Content End -->
                </div>
                <div class="intro11-section swiper-slide slide-3 slide-bg-2 bg-position">
                    <!-- Intro Content Start -->
                    <div class="intro11-content text-left">
                        <h3 class="title-slider text-uppercase">Top Trend</h3>
                        <h2 class="title">Flowers and Candle <br> Birthday Gift</h2>
                        <p class="desc-content">Lorem ipsum dolor sit amet, pri autem nemore bonorum te. Autem fierent
                            ullamcorper ius no, nec ea quodsi invenire. </p>
                        <a href="product-details.html" class="btn flosun-button secondary-btn rounded-0">Shop Now</a>
                    </div>
                    <!-- Intro Content End -->
                </div>
            </div>
            <!-- Slider Navigation -->
            <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
            <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
            <!-- Slider pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- Slider/Intro Section End -->
    <!-- Banner Area Start Here -->
    <div class="banner-area mt-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-custom">
                    <!--Single Banner Area Start-->
                    <div class="single-banner hover-style mb-30">
                        <div class="banner-img">
                            <a href="#">
                                <img src="images/banner/1-1.jpg" alt="">
                                <div class="overlay-1"></div>
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
                <div class="col-md-4 col-custom">
                    <!--Single Banner Area Start-->
                    <div class="single-banner hover-style mb-30">
                        <div class="banner-img">
                            <a href="#">
                                <img src="images/banner/1-2.jpg" alt="">
                                <div class="overlay-1"></div>
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
                <div class="col-md-4 col-custom">
                    <!--Single Banner Area Start-->
                    <div class="single-banner hover-style mb-30">
                        <div class="banner-img">
                            <a href="#">
                                <img src="images/banner/1-3.jpg" alt="">
                                <div class="overlay-1"></div>
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End Here -->
    <!--Product Area Start-->
    <div class="product-area mt-text-2 mb-text-3">
        <div class="container custom-area-2 overflow-hidden">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30">
                        <span class="section-title-1">{{trans('page.home.gift')}}</span>
                        <h3 class="section-title-3">{{trans('page.home.featured')}}</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="product-slider swiper-container anime-element-multi">
                        <div class="swiper-wrapper">
                            @foreach($featured_flowers as $flowers)
                                <div class="single-item swiper-slide">
                                @foreach($flowers as $flower)
                                    <!--Single Product Start-->
                                        <div class="single-product position-relative mb-30">
                                            <div class="product-image">
                                                <a class="d-block" href="{{route('product_show', $flower['slug'])}}">
                                                    @foreach(json_decode($flower['images']) as $image)
                                                        @if($loop->index < 2)
                                                            <img alt="{{$flower['title']}}"
                                                                 src="{{ Voyager::image($image) }}"
                                                                 class="product-image-{{$loop->iteration}} {{ $loop->iteration == 2 ? 'position-absolute' : '' }} w-100"/>
                                                        @endif
                                                    @endforeach
                                                </a>
                                                <span class="onsale">Sale!</span>
                                                <div class="add-action d-flex flex-column position-absolute">
                                                    <a onclick="update_wish_list({{$flower['id']}}, 'add');"
                                                       title="{{trans('page.home.add_to_wish')}}">
                                                        <i class="lnr lnr-heart" data-toggle="tooltip"
                                                           data-placement="left"
                                                           title="{{trans('button.wishlist')}}"></i>
                                                    </a>
                                                    <a onclick="quick_view_product({{$flower['id']}})">
                                                        <i class="lnr lnr-eye" data-toggle="tooltip"
                                                           data-placement="left"
                                                           title="{{trans('button.quick_view')}}"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-title">
                                                    <h4 class="title-2">
                                                        <a href="{{route('product_show', $flower['slug'])}}">{{$flower['title']}}</a>
                                                    </h4>
                                                </div>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="price-box">
                                                    <span class="regular-price ">{{$flower['price']}} ₸</span>
                                                </div>
                                                <a onclick="update_cart('{{$flower['id']}}', 1); $(this).addClass('text-success')"
                                                   class="btn product-cart">{{trans('button.add_to_cart')}}</a>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <!-- Slider pagination -->
                        <div class="swiper-pagination default-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Product Area End-->
    <!-- Product Countdown Area Start Here -->
    <div class="product-countdown-area product-countdown-style pb-text-4">
        <div class="container custom-area">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center">
                        <h3 class="section-title-3">{{ trans('page.home.sale') }}</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row">
                <!--Countdown Start-->
                <div class="col-12 col-custom">
                    <div class="countdown-area">
                        <div class="countdown-wrapper d-flex justify-content-center" data-countdown="2021/05/24"></div>
                    </div>
                </div>
                <!--Countdown End-->
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="item-carousel-2 swiper-container anime-element-multi product-area">
                        <div class="swiper-wrapper">
                            @foreach($sale_flowers as $flower)
                                <div class="single-item swiper-slide">
                                    <!--Single Product Start-->
                                    <div class="single-product position-relative mb-30">
                                        <div class="product-image">
                                            <a class="d-block" href="{{route('product_show', $flower['slug'])}}">
                                                @foreach(json_decode($flower['images']) as $image)
                                                    @if($loop->index < 2)
                                                        <img alt="{{$flower['title']}}"
                                                             src="{{ Voyager::image($image) }}"
                                                             class="product-image-{{$loop->iteration}} {{ $loop->iteration == 2 ? 'position-absolute' : '' }} w-100"/>
                                                    @endif
                                                @endforeach
                                            </a>
                                            <div class="add-action d-flex flex-column position-absolute">
                                                <a onclick="update_wish_list({{$flower['id']}}, 'add');"
                                                   title="{{trans('page.home.add_to_wish')}}">
                                                    <i class="lnr lnr-heart" data-toggle="tooltip"
                                                       data-placement="left" title="{{trans('button.wishlist')}}"></i>
                                                </a>
                                                <a onclick="quick_view_product({{$flower['id']}})">
                                                    <i class="lnr lnr-eye" data-toggle="tooltip"
                                                       data-placement="left" title="{{trans('button.quick_view')}}"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2"><a
                                                        href="{{route('product_show', $flower['slug'])}}">{{$flower['title']}}</a>
                                                </h4>
                                            </div>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price ">{{$flower['price']}} ₸</span>
                                            </div>
                                            <a onclick="update_cart('{{$flower['id']}}', 1); $(this).addClass('text-success')"
                                               class="btn product-cart">{{trans('button.add_to_cart')}}</a>
                                        </div>
                                    </div>
                                    <!--Single Product End-->
                                </div>
                            @endforeach
                        </div>
                        <!-- Slider pagination -->
                        <div class="swiper-pagination default-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Countdown Area End Here -->
    <!--Categories Area Start-->
    <div class="categories-area mt-no-text">
        <div class="container custom-area">
            <div class="row">
                <div class="cat-1 col-md-4 col-sm-12 col-custom">
                    <div class="categories-img mb-30">
                        <a href="{{route('shop')}}"><img src="{{asset('images/category/home1-category-1.jpg')}}" alt=""></a>
                        <div class="categories-content">
                            <h3>{{trans('header.category.all')}}</h3>
                            <h4>{{trans('page.home.category_item_count', ['count'=> $product_count])}}</h4>
                        </div>
                    </div>
                </div>
                <div class="cat-2 col-md-8 col-sm-12 col-custom">
                    <div class="row elements-grid">
                        @foreach($categories as $category)
                            <div class="cat-{{3 + $loop->iteration}} col-md-4 col-custom column-win">
                                <div class="categories-img mb-30">
                                    <a href="{{route('shop')}}?categories[]={{$category->id}}">
                                        <img src="{{Voyager::image($category->image)}}"
                                             alt="{{$category->title}}"></a>
                                    <div class="categories-content">
                                        <h3>{{$category->name}}</h3>
                                        <h4>{{trans('page.home.category_item_count', ['count'=> ($category->products()->count())])}}</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Categories Area End-->
    <!-- Testimonial Area Start Here -->
    <div class="testimonial-area mt-text-2">
        <div class="container custom-area">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center">
                        <span class="section-title-1">{{trans('page.home.love_client')}}</span>
                        <h3 class="section-title-3">{{trans('page.home.reviews')}}</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row">
                <div class="testimonial-carousel swiper-container intro11-carousel-wrap col-12 col-custom">
                    <div class="swiper-wrapper">
                        @foreach($comments as $comment)
                            <div class="single-item swiper-slide">
                                <!--Single Testimonial Start-->
                                <div class="single-testimonial text-center">
                                    <div class="testimonial-content">
                                        <p>{{$comment->body}}</p>
                                        <div class="testimonial-author">
                                            <h6>{{$comment->full_name}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <!--Single Testimonial End-->
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Slider Navigation -->
                <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i>
                </div>
                <div class="home1-slider-next swiper-button-next main-slider-nav"><i
                        class="lnr lnr-arrow-right"></i></div>
                <!-- Slider pagination -->
                <div class="swiper-pagination default-pagination"></div>
            </div>
        </div>
    </div>
    </div>
    <!-- Testimonial Area End Here -->
    @push('scripts')
        <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
        <script>
            function masonry_grid() {
                $('.elements-grid').masonry({
                    // options
                    itemSelector: '.column-win',
                    horizontalOrder: true
                });
            }

            $(document).ready(function () {
                masonry_grid()
            });
        </script>
    @endpush
@endsection
