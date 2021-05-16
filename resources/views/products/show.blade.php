@extends('layouts.app')
@section('title', $flower->title)
@section('description', $flower->meta_description)
@section('keywords', $flower->meta_keywords)
@section('content')
    <!-- Single Product Main Area Start -->
    <div class="single-product-main-area">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">
                    <div class="product-details-img">
                        <div class="single-product-img swiper-container gallery-top popup-gallery">
                            <div class="swiper-wrapper">
                                @foreach(json_decode($flower->images) as $image)
                                    <div class="swiper-slide">
                                        <a class="w-100" href="{{ Voyager::image($image) }}">
                                            <img class="w-100" src="{{ Voyager::image($image) }}"
                                                 alt="{{$flower->title}}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="single-product-thumb swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach(json_decode($flower->images) as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ Voyager::image($image) }}" alt="{{$flower->title}}">
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white"><i class="lnr lnr-arrow-right"></i>
                            </div>
                            <div class="swiper-button-prev swiper-button-white"><i class="lnr lnr-arrow-left"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-custom">
                    <div class="product-summery position-relative">
                        <div class="product-head mb-4">
                            <h2 class="product-title">{{$flower->title}}</h2>
                        </div>
                        <div class="price-box mb-4">
                            <h4 class=""><b>{{trans('page.product.price')}}:</b> {{$flower->price}} ₸</h4>
                        </div>
                        <div class="product-meta mt-3">
                            <div class="product-material custom-radio mb-4">
                                <h4 class="mb-3"><b>{{trans('page.product.size')}}:</b></h4>
                                @foreach($flower->sizes as $size)
                                    <input type="radio" name="size" class="custom-control-input"
                                           id="size_checkbox-{{$size->id}}"
                                           @if(count($flower->sizes) == 1) checked @endif>
                                    <label class="custom-control-label"
                                           for="size_checkbox-{{$size->id}}">{{$size->title}}</label>
                                @endforeach
                            </div>
                            <div class="product-material mb-4">
                                <h4><b>{{trans('page.product.extra_product')}}:</b></h4>
                                <div class="custom-control mt-3 ">
                                    <div class="row">
                                        <div class="col-md-4 mr-3 custom-checkbox-image">
                                            <input type="checkbox" name="dop" value="1217" id="test">
                                            <label class="checkbox-div pay-checkbox" for="test">
                                                <div class="sidebar-product align-items-center">
                                                    <img class="image"
                                                         src="https://cvetyastana.kz//upload/iblock/b6c/33.jpg"
                                                         alt="product">
                                                    <div class="product-content">
                                                        <div class="product-title">
                                                            <h5 class="font-weight-bold">Шоколад ручной работы</h5>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="font-weight-bold">2500 ₸</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="quantity-with_btn mb-5">
                            <div class="quantity">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text"
                                           id="product-{{$flower->id}}">
                                    <div class="dec qtybutton">-</div>
                                    <div class="inc qtybutton">+</div>
                                </div>
                            </div>
                            <div class="add-to_cart">
                                <a class="btn product-cart button-icon flosun-button dark-btn"
                                   onclick="$(this).addClass('bg-success'); update_cart({{$flower->id}}, $('.cart-plus-minus-box').val());">
                                    {{trans('button.add_to_cart')}}
                                </a>
                                <a class="btn flosun-button secondary-btn  secondary-border rounded-0"
                                   onclick="update_wish_list({{$flower['id']}}, 'add'); $(this).addClass('active-btn')">{{trans('button.wishlist')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-no-text">
                <div class="col-lg-12 col-custom">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#connect-1"
                               role="tab" aria-selected="true">{{trans('page.product.description')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab" href="#connect-2"
                               role="tab" aria-selected="false">{{trans('page.product.reviews')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="contact-tab" data-toggle="tab" href="#connect-3"
                               role="tab" aria-selected="false">{{trans('page.product.shipping_policy')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="review-tab" data-toggle="tab" href="#connect-4"
                               role="tab" aria-selected="false">{{trans('page.product.delivery')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        <div class="tab-pane fade show active" id="connect-1" role="tabpanel"
                             aria-labelledby="home-tab">
                            <div class="desc-content">
                                {!! $flower->description !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- Start Single Content -->
                            <div class="product_tab_content  border p-3">
                                <div class="review_address_inner">
                                    <!-- Start Single Review -->
                                    <div class="pro_review mb-5">
                                        <div class="review_thumb">
                                            <img alt="review images" src="/images/review/1.jpg">
                                        </div>
                                        <div class="review_details">
                                            <div class="review_info mb-2">
                                                <div class="product-rating mb-2">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <h5>Admin - <span> December 19, 2020</span></h5>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in viverra
                                                ex, vitae vestibulum arcu. Duis sollicitudin metus sed lorem commodo, eu
                                                dapibus libero interdum. Morbi convallis viverra erat, et aliquet orci
                                                congue vel. Integer in odio enim. Pellentesque in dignissim leo. Vivamus
                                                varius ex sit amet quam tincidunt iaculis.</p>
                                        </div>
                                    </div>
                                    <!-- End Single Review -->
                                </div>
                                <!-- Start RAting Area -->
                                <div class="rating_wrap">
                                    <h5 class="rating-title-1 font-weight-bold mb-2">Add a review </h5>
                                    <p class="mb-2">Your email address will not be published. Required fields are marked
                                        *</p>
                                    <h6 class="rating-title-2 mb-2">Your Rating</h6>
                                    <div class="rating_list mb-4">
                                        <div class="review_info">
                                            <div class="product-rating mb-3">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End RAting Area -->
                                <div class="comments-area comments-reply-area">
                                    <div class="row">
                                        <div class="col-lg-12 col-custom">
                                            <form action="#" class="comment-form-area">
                                                <div class="row comment-input">
                                                    <div class="col-md-6 col-custom comment-form-author mb-3">
                                                        <label>Name <span class="required">*</span></label>
                                                        <input type="text" required="required" name="Name">
                                                    </div>
                                                    <div class="col-md-6 col-custom comment-form-emai mb-3">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input type="text" required="required" name="email">
                                                    </div>
                                                </div>
                                                <div class="comment-form-comment mb-3">
                                                    <label>Comment</label>
                                                    <textarea class="comment-notes" required="required"></textarea>
                                                </div>
                                                <div class="comment-form-submit">
                                                    <button class="btn flosun-button secondary-btn rounded-0">Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                        <div class="tab-pane fade" id="connect-3" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="shipping-policy">
                                {!! Voyager::setting('site.shipping_policy') !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
                            <div class="size-tab table-responsive-lg">
                                <div class="shipping-policy">
                                    {!! Voyager::setting('site.delivery') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product Main Area End -->
    <!--Product Area Start-->
    <div class="product-area mt-text-3">
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
                            @foreach($featured_flowers as $flower)
                                <div class="single-item swiper-slide">
                                    <!--Single Product Start-->
                                    <div class="single-product position-relative mb-30">
                                        <div class="product-image">
                                            <a class="d-block" href="{{route('product_show', $flower->slug)}}">
                                                @foreach(json_decode($flower->images) as $image)
                                                    @if($loop->index < 2)
                                                        <img alt="{{$flower->title}}" src="{{ Voyager::image($image) }}"
                                                             class="product-image-{{$loop->iteration}} {{ $loop->iteration == 2 ? 'position-absolute' : '' }} w-100"/>
                                                    @endif
                                                @endforeach
                                            </a>
                                            <span class="onsale">Sale!</span>
                                            <div class="add-action d-flex flex-column position-absolute">
                                                <a onclick="update_wish_list({{$flower->id}}, 'add');"
                                                   title="{{trans('page.home.add_to_wish')}}">
                                                    <i class="lnr lnr-heart" data-toggle="tooltip"
                                                       data-placement="left" title="{{trans('button.wishlist')}}"></i>
                                                </a>
                                                <a onclick="quick_view_product({{$flower->id}})">
                                                    <i class="lnr lnr-eye" data-toggle="tooltip"
                                                       data-placement="left" title="{{trans('button.quick_view')}}"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2">
                                                    <a href="{{route('product_show', $flower->slug)}}">
                                                        {{$flower->title}}
                                                    </a>
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
    <!--Product Area End-->
@endsection
