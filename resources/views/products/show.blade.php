@extends('layouts.app')
@section('title', $flower->title)
@section('description', $flower->meta_description)
@section('keywords', $flower->meta_keywords)
@section('page_title', trans('shop.page_title'))
@section('link_title', $flower->getTranslatedAttribute('title', $locale, 'fallbackLocale'))
@push('css')
    <link rel="stylesheet" href="{{asset('css/rating_star.css')}}">
@endpush
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
                                                 alt="{{$flower->getTranslatedAttribute('title', $locale, 'fallbackLocale')}}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="single-product-thumb swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach(json_decode($flower->images) as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ Voyager::image($image) }}" alt="{{$flower->getTranslatedAttribute('title', $locale, 'fallbackLocale')}}">
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
                            <h2 class="product-title">{{$flower->getTranslatedAttribute('title', $locale, 'fallbackLocale')}}</h2>
                        </div>
                        <div class="price-box mb-4">
                            <h4 class=""><b>{{trans('page.product.price')}}:</b>
                                <span id="product_price">
                                    @if($main_currency->left_icon)
                                        {{$main_currency->left_icon}}
                                    @endif
                                    {{ $flower->updated_price * $main_currency->value}}
                                    @if($main_currency->right_icon)
                                        {{$main_currency->right_icon}}
                                    @endif
                                </span>
                            </h4>
                            <input name="product_price" type="hidden"
                                   value="{{$flower->updated_price * $main_currency->value}}">

                        </div>
                        <div class="product-meta mt-3">
                            <div class="product-material custom-radio mb-4">
                                <h4 class="mb-3"><b>{{trans('page.product.size')}}:</b></h4>
                                @foreach($flower->sizes as $size)
                                    <input type="radio" name="size" value="{{$size->id}}" class="custom-control-input"
                                           id="size_checkbox-{{$size->id}}" form="buy_now_form"
                                           @if(count($flower->sizes) == 1) checked @endif>
                                    <label class="custom-control-label"
                                           for="size_checkbox-{{$size->id}}">{{$size->getTranslatedAttribute('title', $locale, 'fallbackLocale')}}</label>
                                @endforeach
                            </div>
                            @if(count($flower->extra_products) > 0)
                                <div class="product-material mb-4">
                                    <h4><b>{{trans('page.product.extra_product')}}:</b></h4>
                                    <div class="custom-control mt-3 ">
                                        <div class="row">
                                            <div class="extra_hidden_input"></div>
                                            @foreach($flower->extra_products as $product)
                                                <div class="col-md-4 mr-3 custom-checkbox-image">
                                                    <input type="checkbox" name="extra" value="{{$product->updated_price * $main_currency->value}}"
                                                           id="extra_product_{{$product->id}}">

                                                    <label class="checkbox-div pay-checkbox"
                                                           for="extra_product_{{$product->id}}">
                                                        <div class="sidebar-product align-items-center">
                                                            @foreach(json_decode($product->images) as $extra_image)
                                                                <img class="image" alt="{{$product->title}}"
                                                                     src="{{Voyager::image($extra_image)}}">
                                                                @break
                                                            @endforeach
                                                            <div class="product-content">
                                                                <div class="product-title">
                                                                    <h5 class="font-weight-bold">
                                                                        {{$product->getTranslatedAttribute('title', $locale, 'fallbackLocale')}}
                                                                    </h5>
                                                                </div>
                                                                <div class="price-box">
                                                                    <span
                                                                        class="font-weight-bold">
                                                                        @if($main_currency->left_icon)
                                                                            {{$main_currency->left_icon}}
                                                                        @endif
                                                                        {{$product->updated_price * $main_currency->value}}
                                                                        @if($main_currency->right_icon)
                                                                            {{$main_currency->right_icon}}
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div id="total_extra_price" class="price-box mb-4" style="display:none;">
                            <h4><b>{{trans('page.cart.total_price')}}:</b></h4>
                            <h5 id="extra_prices"></h5>
                        </div>
                        <div class="quantity-with_btn mb-5">
                            <div class="quantity">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text"
                                           id="product-{{$flower->id}}" name="qty"  form="buy_now_form">
                                    <div class="dec qtybutton">-</div>
                                    <div class="inc qtybutton">+</div>
                                </div>
                            </div>
                            <div class="add-to_cart">
                                <a class="btn product-cart button-icon flosun-button dark-btn" id="product_add_cart_btn"
                                   onclick="product_and_extra_add({{$flower->id}}); open_modal('{{trans('cart.success.add-cart')}}');">
                                    {{trans('button.add_to_cart')}}
                                </a>
                                <a class="btn flosun-button secondary-btn  secondary-border rounded-0"
                                   onclick="update_wish_list({{$flower['id']}}, 'add');  $(this).addClass('active-btn')">
                                    {{trans('button.wishlist')}}
                                </a>
                                <button class="btn flosun-button primary-btn  secondary-border rounded-0"
                                        type="submit" form="buy_now_form">
                                    {{trans('button.buy_now')}}
                                </button>
                                <form action="{{route('buy_one_product')}}" method="post" id="buy_now_form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$flower->id}}">
                                </form>
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
                                {!! $flower->getTranslatedAttribute('description', $locale, 'fallbackLocale') !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- Start Single Content -->
                            <div class="product_tab_content  border p-3">
                                <div class="review_address_inner">
                                    <!-- Start Single Review -->
                                    @foreach($comments as $comment)
                                        <div class="pro_review mb-5">
                                            <div class="review_thumb">
                                                <img alt="review images" src="{{asset('/images/review/1.jpg')}}">
                                            </div>
                                            <div class="review_details">
                                                <div class="review_info mb-2">
                                                    <div class="product-rating mb-2">
                                                        <i class="fa fa-star{{ $comment->rating >= 1 ? '' : '-o'}}"></i>
                                                        <i class="fa fa-star{{ $comment->rating >= 2 ? '' : '-o'}}"></i>
                                                        <i class="fa fa-star{{ $comment->rating >= 3 ? '' : '-o'}}"></i>
                                                        <i class="fa fa-star{{ $comment->rating >= 4 ? '' : '-o'}}"></i>
                                                        <i class="fa fa-star{{ $comment->rating == 5 ? '' : '-o'}}"></i>
                                                    </div>
                                                    <h5>{{$comment->full_name}} - <span> {{$comment->created_at}}</span>
                                                    </h5>
                                                </div>
                                                <p>{{$comment->body}}</p>
                                            </div>
                                        </div>
                                @endforeach
                                <!-- End Single Review -->
                                </div>
                                <!-- Start RAting Area -->
                                <div class="rating_wrap">
                                    <h5 class="rating-title-1 font-weight-bold mb-2">{{trans('page.product.add_comment')}}</h5>
                                    <h6 class="rating-title-2 mb-2">{{trans('page.product.ratting')}}</h6>
                                    <div class="rating_list mb-4">
                                        <div class="review_info">
                                            <div class="product-rating mb-3">
                                                <input form="add_comment_form" value="1" type="radio" name="stars"
                                                       id="star-1"/>
                                                <input form="add_comment_form" value="2" type="radio" name="stars"
                                                       id="star-2"/>
                                                <input form="add_comment_form" value="3" type="radio" name="stars"
                                                       id="star-3"/>
                                                <input form="add_comment_form" value="4" type="radio" name="stars"
                                                       id="star-4" checked/>
                                                <input form="add_comment_form" value="5" type="radio" name="stars"
                                                       id="star-5"/>
                                                <section class="stars">
                                                    <label for="star-1">
                                                        <svg width="255" height="240" viewBox="0 0 51 48">
                                                            <path
                                                                d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                        </svg>
                                                    </label>
                                                    <label for="star-2">
                                                        <svg width="255" height="240" viewBox="0 0 51 48">
                                                            <path
                                                                d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                        </svg>
                                                    </label>
                                                    <label for="star-3">
                                                        <svg width="255" height="240" viewBox="0 0 51 48">
                                                            <path
                                                                d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                        </svg>
                                                    </label>
                                                    <label for="star-4">
                                                        <svg width="255" height="240" viewBox="0 0 51 48">
                                                            <path
                                                                d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                        </svg>
                                                    </label>
                                                    <label for="star-5">
                                                        <svg width="255" height="240" viewBox="0 0 51 48">
                                                            <path
                                                                d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                        </svg>
                                                    </label>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Rating Area -->
                                <div class="comments-area comments-reply-area">
                                    <div class="row">
                                        <div class="col-lg-12 col-custom">
                                            <form action="{{route('product_add_comment')}}" id="add_comment_form"
                                                  class="comment-form-area" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$flower->id}}" name="product_id">
                                                <div class="row comment-input">
                                                    <div class="col-md-6 col-custom comment-form-author mb-3">
                                                        <label for="name">{{trans('page.product.form.name')}} <span
                                                                class="required">*</span></label>
                                                        <input type="text" required="required" name="name" id="name">
                                                    </div>
                                                    <div class="col-md-6 col-custom comment-form-emai mb-3">
                                                        <label for="email">Email <span class="required">*</span></label>
                                                        <input type="text" required="required" name="email" id="email">
                                                    </div>
                                                </div>
                                                <div class="comment-form-comment mb-3">
                                                    <label for="comment">{{trans('page.product.form.comment')}} </label>
                                                    <textarea class="comment-notes" name="body" id='comment'
                                                              required="required"></textarea>
                                                </div>
                                                <div class="comment-form-submit">
                                                    <button type="submit"
                                                            class="btn flosun-button secondary-btn rounded-0">{{trans('button.send')}}
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
                                {!! Voyager::setting('site.shipping_policy_'.$locale) !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
                            <div class="size-tab table-responsive-lg">
                                <div class="shipping-policy">
                                    {!! Voyager::setting('site.delivery_'.$locale) !!}
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
                    <div class="products-slider swiper-container anime-element-multi">
                        <div class="swiper-wrapper">
                            @foreach($featured_flowers as $flower)
                                <div class="single-item swiper-slide">
                                    <!--Single Product Start-->
                                    <div class="single-product featured-product position-relative mb-30">
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
                                                <a onclick="quick_view_product({{$flower->id}}, '{{$locale}}')">
                                                    <i class="lnr lnr-eye" data-toggle="tooltip"
                                                       data-placement="left" title="{{trans('button.quick_view')}}"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2">
                                                    <a href="{{route('product_show', $flower->slug)}}">
                                                        {{$flower->getTranslatedAttribute('title', $locale, 'fallbackLocale')}}
                                                    </a>
                                                </h4>
                                            </div>
                                            @php $key = array_search($flower['id'], array_column($product_ratings, 'product_id')) @endphp
                                            @if($key !== false)
                                                <div class="product-rating">
                                                    <i class="fa fa-star{{ (int) $product_ratings[$key]['rating'] >= 1 ? '' : '-o'}}"></i>
                                                    <i class="fa fa-star{{ (int) $product_ratings[$key]['rating'] >= 2 ? '' : '-o'}}"></i>
                                                    <i class="fa fa-star{{ (int) $product_ratings[$key]['rating'] >= 3 ? '' : '-o'}}"></i>
                                                    <i class="fa fa-star{{ (int) $product_ratings[$key]['rating'] >= 4 ? '' : '-o'}}"></i>
                                                    <i class="fa fa-star{{ (int) $product_ratings[$key]['rating'] == 5 ? '' : '-o'}}"></i>
                                                </div>
                                            @else
                                                <div class="product-rating mb-4">

                                                </div>
                                            @endif
                                            <div class="price-box">
                                                <span class="regular-price">
                                                   @if($main_currency->left_icon)
                                                        {{$main_currency->left_icon}}
                                                    @endif
                                                    {{ $flower['updated_price'] * $main_currency->value}}
                                                    @if($main_currency->right_icon)
                                                        {{$main_currency->right_icon}}
                                                    @endif
                                                </span>
                                            </div>
                                            <a onclick="update_cart('{{$flower['id']}}', 1);
                                            open_modal('{{trans('cart.success.add-cart')}}'); $(this).addClass('text-success')"
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
    @push('scripts')
        <script src="{{asset('js/extra_product.js')}}"></script>
    @endpush
@endsection
