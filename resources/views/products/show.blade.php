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
                                <input type="radio" name="size" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">black (20)</label>
                                <input type="radio" name="size" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">black (10)</label>
                                <input type="radio" name="size" class="custom-control-input" id="customCheck3">
                                <label class="custom-control-label" for="customCheck3">black (30)</label>
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
{{--                                        <div class="col-sm-6 col-12 custom-checkbox-image">--}}
{{--                                            <input type="checkbox" name="dop" value="1217" id="test">--}}
{{--                                            <label class="checkbox-div pay-checkbox" for="test">--}}
{{--                                                <img alt="" src="https://cvetyastana.kz//upload/iblock/b6c/33.jpg">--}}
{{--                                                <br>--}}
{{--                                                <span> Шоколад ручной работы</span>--}}
{{--                                                <br>--}}
{{--                                                <span class="font-weight-bold"> 2500 ₸</span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-12">--}}
{{--                                            <label class="checkbox-div pay-checkbox"><img--}}
{{--                                                    src="https://cvetyastana.kz//upload/iblock/388/vaza-dlya-cvetov-ikea-vasen-vysota-20sm-d-14-sm-50371734.jpg">--}}
{{--                                                4&nbsp;000 ₸<br>Ваза из стекла "Рона" <input type="checkbox" name="dop"--}}
{{--                                                                                             value="1218"--}}
{{--                                                                                             data-price="4000"--}}
{{--                                                                                             data-price2="4,000.00">--}}
{{--                                                <span class="checkmark"></span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-12">--}}
{{--                                            <label class="checkbox-div pay-checkbox"><img--}}
{{--                                                    src="https://cvetyastana.kz//upload/iblock/9a7/2860d709.jpg"> 12&nbsp;000--}}
{{--                                                ₸<br>Мишка 80см <input type="checkbox" name="dop" value="1512"--}}
{{--                                                                       data-price="12000" data-price2="12,000.00">--}}
{{--                                                <span class="checkmark"></span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-12">--}}
{{--                                            <label class="checkbox-div pay-checkbox"><img--}}
{{--                                                    src="https://cvetyastana.kz//upload/iblock/ec7/9800012701_1_default_default.jpg">--}}
{{--                                                3&nbsp;500 ₸<br>Ferrero Rocher <input type="checkbox" name="dop"--}}
{{--                                                                                      value="1520" data-price="3500"--}}
{{--                                                                                      data-price2="3,500.00">--}}
{{--                                                <span class="checkmark"></span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-12">--}}
{{--                                            <label class="checkbox-div pay-checkbox"><img--}}
{{--                                                    src="https://cvetyastana.kz//upload/iblock/10a/31_03_2018_15_40_54_8430mQO1.jpg">--}}
{{--                                                5&nbsp;500 ₸<br>Фонтан из шаров "Розовое золото" <input type="checkbox"--}}
{{--                                                                                                        name="dop"--}}
{{--                                                                                                        value="1522"--}}
{{--                                                                                                        data-price="5500"--}}
{{--                                                                                                        data-price2="5,500.00">--}}
{{--                                                <span class="checkmark"></span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-12">--}}
{{--                                            <label class="checkbox-div pay-checkbox"><img--}}
{{--                                                    src="https://cvetyastana.kz//upload/iblock/e51/1181.970.jpg"> 1&nbsp;000--}}
{{--                                                ₸<br>Шар "Сердце", 1 шт. <input type="checkbox" name="dop" value="1527"--}}
{{--                                                                                data-price="1000"--}}
{{--                                                                                data-price2="1,000.00">--}}
{{--                                                <span class="checkmark"></span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="quantity-with_btn mb-5">
                            <div class="quantity">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text" id="product-{{$flower->id}}">
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
                        <span class="section-title-1">The Most Trendy</span>
                        <h3 class="section-title-3">Featured Products</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="product-slider swiper-container anime-element-multi">
                        <div class="swiper-wrapper">
                            <div class="single-item swiper-slide">
                                <!--Single Product Start-->
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="/images/product/1.jpg" alt="" class="product-image-1 w-100">
                                            <img src="/images/product/2.jpg" alt=""
                                                 class="product-image-2 position-absolute w-100">
                                        </a>
                                        <span class="onsale">Sale!</span>
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <a href="compare.html" title="Compare">
                                                <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left"
                                                   title="Compare"></i>
                                            </a>
                                            <a href="wishlist.html" title="Add To Wishlist">
                                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left"
                                                   title="Wishlist"></i>
                                            </a>
                                            <a href="#exampleModalCenter" title="Quick View" data-toggle="modal"
                                               data-target="#exampleModalCenter">
                                                <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left"
                                                   title="Quick View"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"><a href="product-details.html">Hyacinth white stick</a>
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
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <a href="cart.html" class="btn product-cart">Add to Cart</a>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
                            <div class="single-item swiper-slide">
                                <!--Single Product Start-->
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="/images/product/5.jpg" alt="" class="product-image-1 w-100">
                                            <img src="/images/product/6.jpg" alt=""
                                                 class="product-image-2 position-absolute w-100">
                                        </a>
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <a href="compare.html" title="Compare">
                                                <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left"
                                                   title="Compare"></i>
                                            </a>
                                            <a href="wishlist.html" title="Add To Wishlist">
                                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left"
                                                   title="Wishlist"></i>
                                            </a>
                                            <a href="#exampleModalCenter" title="Quick View" data-toggle="modal"
                                               data-target="#exampleModalCenter">
                                                <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left"
                                                   title="Quick View"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"><a href="product-details.html">Rose bouquet white</a>
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
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <a href="cart.html" class="btn product-cart">Add to Cart</a>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
                            <div class="single-item swiper-slide">
                                <!--Single Product Start-->
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="/images/product/7.jpg" alt="" class="product-image-1 w-100">
                                            <img src="/images/product/8.jpg" alt=""
                                                 class="product-image-2 position-absolute w-100">
                                        </a>
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <a href="compare.html" title="Compare">
                                                <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left"
                                                   title="Compare"></i>
                                            </a>
                                            <a href="wishlist.html" title="Add To Wishlist">
                                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left"
                                                   title="Wishlist"></i>
                                            </a>
                                            <a href="#exampleModalCenter" title="Quick View" data-toggle="modal"
                                               data-target="#exampleModalCenter">
                                                <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left"
                                                   title="Quick View"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"><a href="product-details.html">Orchid flower red
                                                    stick</a></h4>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <a href="cart.html" class="btn product-cart">Add to Cart</a>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
                            <div class="single-item swiper-slide">
                                <!--Single Product Start-->
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="/images/product/3.jpg" alt="" class="product-image-1 w-100">
                                            <img src="/images/product/4.jpg" alt=""
                                                 class="product-image-2 position-absolute w-100">
                                        </a>
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <a href="compare.html" title="Compare">
                                                <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left"
                                                   title="Compare"></i>
                                            </a>
                                            <a href="wishlist.html" title="Add To Wishlist">
                                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left"
                                                   title="Wishlist"></i>
                                            </a>
                                            <a href="#exampleModalCenter" title="Quick View" data-toggle="modal"
                                               data-target="#exampleModalCenter">
                                                <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left"
                                                   title="Quick View"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"><a href="product-details.html">Blossom bouquet
                                                    flower</a></h4>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <a href="cart.html" class="btn product-cart">Add to Cart</a>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
                            <div class="single-item swiper-slide">
                                <!--Single Product Start-->
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="/images/product/8.jpg" alt="" class="product-image-1 w-100">
                                            <img src="/images/product/7.jpg" alt=""
                                                 class="product-image-2 position-absolute w-100">
                                        </a>
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <a href="compare.html" title="Compare">
                                                <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left"
                                                   title="Compare"></i>
                                            </a>
                                            <a href="wishlist.html" title="Add To Wishlist">
                                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left"
                                                   title="Wishlist"></i>
                                            </a>
                                            <a href="#exampleModalCenter" title="Quick View" data-toggle="modal"
                                               data-target="#exampleModalCenter">
                                                <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left"
                                                   title="Quick View"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"><a href="product-details.html">Jasmine flowers white</a>
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
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <a href="cart.html" class="btn product-cart">Add to Cart</a>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
                            <div class="single-item swiper-slide">
                                <!--Single Product Start-->
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="/images/product/2.jpg" alt="" class="product-image-1 w-100">
                                            <img src="/images/product/1.jpg" alt=""
                                                 class="product-image-2 position-absolute w-100">
                                        </a>
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <a href="compare.html" title="Compare">
                                                <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left"
                                                   title="Compare"></i>
                                            </a>
                                            <a href="wishlist.html" title="Add To Wishlist">
                                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left"
                                                   title="Wishlist"></i>
                                            </a>
                                            <a href="#exampleModalCenter" title="Quick View" data-toggle="modal"
                                               data-target="#exampleModalCenter">
                                                <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left"
                                                   title="Quick View"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"><a href="product-details.html">Flowers daisy pink
                                                    stick</a></h4>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <a href="cart.html" class="btn product-cart">Add to Cart</a>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
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
