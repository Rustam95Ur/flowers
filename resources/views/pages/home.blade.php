@extends('layouts.app')
@section('content')
<!-- Slider/Intro Section Start -->
<div class="intro11-slider-wrap section-2 mrl-50">
    <div class="intro11-slider swiper-container">
        <div class="swiper-wrapper">
            <div class="intro11-section swiper-slide slide-4 slide-bg-2 bg-position">
                <!-- Intro Content Start -->
                <div class="intro11-content-2 text-center">
                    <h1 class="different-title">Welcome</h1>
                    <h2 class="title">2020 Flower Trend</h2>
                    <a href="product-details.html" class="btn flosun-button secondary-btn theme-color rounded-0">Shop Now</a>
                </div>
                <!-- Intro Content End -->
            </div>
            <div class="intro11-section swiper-slide slide-3 slide-bg-2 bg-position">
                <!-- Intro Content Start -->
                <div class="intro11-content text-left">
                    <h3 class="title-slider text-uppercase">Top Trend</h3>
                    <h2 class="title">Flowers and Candle <br> Birthday Gift</h2>
                    <p class="desc-content">Lorem ipsum dolor sit amet, pri autem nemore bonorum te. Autem fierent ullamcorper ius no, nec ea quodsi invenire. </p>
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
                    <span class="section-title-1">Wonderful gift</span>
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
                                        <img src="images/product/1.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/2.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <span class="onsale">Sale!</span>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Flowers daisy pink stick</a></h4>
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
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="images/product/3.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/4.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Jasmine flowers white</a></h4>
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
                                        <img src="images/product/5.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/6.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Blossom bouquet flower</a></h4>
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
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="images/product/2.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/1.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Orchid flower red stick</a></h4>
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
                                        <img src="images/product/7.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/8.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Rose bouquet white</a></h4>
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
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="images/product/9.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/2.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Hyacinth white stick</a></h4>
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
                                        <img src="images/product/3.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/4.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Glory of the Snow</a></h4>
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
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="images/product/6.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/5.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Jack in the Pulpit</a></h4>
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
                                        <img src="images/product/8.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/7.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Pearly Everlasting</a></h4>
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
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="images/product/9.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/8.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Flowers daisy pink stick</a></h4>
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
                                        <img src="images/product/2.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/1.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Flowers white</a></h4>
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
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="images/product/9.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/3.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Flower red stick</a></h4>
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
<!-- Product Countdown Area Start Here -->
<div class="product-countdown-area product-countdown-style pb-text-4">
    <div class="container custom-area">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12 col-custom">
                <div class="section-title text-center">
                    <h3 class="section-title-3">Deal of The Day</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row">
            <!--Countdown Start-->
            <div class="col-12 col-custom">
                <div class="countdown-area">
                    <div class="countdown-wrapper d-flex justify-content-center" data-countdown="2022/12/24"></div>
                </div>
            </div>
            <!--Countdown End-->
        </div>
        <div class="row product-row">
            <div class="col-12 col-custom">
                <div class="item-carousel-2 swiper-container anime-element-multi product-area">
                    <div class="swiper-wrapper">
                        <div class="single-item swiper-slide">
                            <!--Single Product Start-->
                            <div class="single-product position-relative mb-30">
                                <div class="product-image">
                                    <a class="d-block" href="product-details.html">
                                        <img src="images/product/1.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/2.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <span class="onsale">Sale!</span>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Hyacinth white stick</a></h4>
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
                                        <img src="images/product/5.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/6.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Glory of the Snow</a></h4>
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
                                        <img src="images/product/7.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/8.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Jack in the Pulpit</a></h4>
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
                                        <img src="images/product/3.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/4.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Pearly Everlasting</a></h4>
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
                                        <img src="images/product/8.jpg" alt="" class="product-image-1 w-100">
                                        <img src="images/product/7.jpg" alt="" class="product-image-2 position-absolute w-100">
                                    </a>
                                    <div class="add-action d-flex flex-column position-absolute">
                                        <a href="compare.html" title="Compare">
                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                        </a>
                                        <a href="wishlist.html" title="Add To Wishlist">
                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                        </a>
                                        <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="product-details.html">Product dummy name</a></h4>
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
<!-- Product Countdown Area End Here -->
<!--Categories Area Start-->
<div class="categories-area mt-no-text">
    <div class="container custom-area">
        <div class="row">
            <div class="cat-1 col-md-4 col-sm-12 col-custom">
                <div class="categories-img mb-30">
                    <a href="#"><img src="images/category/home1-category-1.jpg" alt=""></a>
                    <div class="categories-content">
                        <h3>Potted Plant</h3>
                        <h4>18 items</h4>
                    </div>
                </div>
            </div>
            <div class="cat-2 col-md-8 col-sm-12 col-custom">
                <div class="row">
                    <div class="cat-3 col-md-7 col-custom">
                        <div class="categories-img mb-30">
                            <a href="#"><img src="images/category/home1-category-2.jpg" alt=""></a>
                            <div class="categories-content">
                                <h3>Potted Plant</h3>
                                <h4>18 items</h4>
                            </div>
                        </div>
                    </div>
                    <div class="cat-4 col-md-5 col-custom">
                        <div class="categories-img mb-30">
                            <a href="#"><img src="images/category/home1-category-3.jpg" alt=""></a>
                            <div class="categories-content">
                                <h3>Potted Plant</h3>
                                <h4>18 items</h4>
                            </div>
                        </div>
                    </div>
                    <div class="cat-5 col-md-4 col-custom">
                        <div class="categories-img mb-30">
                            <a href="#"><img src="images/category/home1-category-4.jpg" alt=""></a>
                            <div class="categories-content">
                                <h3>Potted Plant</h3>
                                <h4>18 items</h4>
                            </div>
                        </div>
                    </div>
                    <div class="cat-6 col-md-8 col-custom">
                        <div class="categories-img mb-30">
                            <a href="#"><img src="images/category/home1-category-5.jpg" alt=""></a>
                            <div class="categories-content">
                                <h3>Potted Plant</h3>
                                <h4>18 items</h4>
                            </div>
                        </div>
                    </div>
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
                    <span class="section-title-1">We love our clients</span>
                    <h3 class="section-title-3">What They’re Saying</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row">
            <div class="testimonial-carousel swiper-container intro11-carousel-wrap col-12 col-custom">
                <div class="swiper-wrapper">
                    <div class="single-item swiper-slide">
                        <!--Single Testimonial Start-->
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <img src="images/testimonial/testimonial1.jpg" alt="">
                            </div>
                            <div class="testimonial-content">
                                <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
                                <div class="testimonial-author">
                                    <h6>Katherine Sullivan <span>Customer</span></h6>
                                </div>
                            </div>
                        </div>
                        <!--Single Testimonial End-->
                    </div>
                    <div class="single-item swiper-slide">
                        <!--Single Testimonial Start-->
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <img src="images/testimonial/testimonial2.jpg" alt="">
                            </div>
                            <div class="testimonial-content">
                                <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
                                <div class="testimonial-author">
                                    <h6>Katherine Sullivan <span>Customer</span></h6>
                                </div>
                            </div>
                        </div>
                        <!--Single Testimonial End-->
                    </div>
                </div>
                <!-- Slider Navigation -->
                <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
                <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
                <!-- Slider pagination -->
                <div class="swiper-pagination default-pagination"></div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Area End Here -->
<!-- Newsletter Area Start Here -->
<div class="news-letter-area gray-bg pt-no-text pb-no-text mt-text-3">
    <div class="container custom-area">
        <div class="row align-items-center">
            <!--Section Title Start-->
            <div class="col-md-6 col-custom">
                <div class="section-title text-left mb-35">
                    <h3 class="section-title-3">Send Newsletter</h3>
                    <p class="desc-content mb-0">Enter Your Email Address For Our Mailing List To Keep Your Self Update</p>
                </div>
            </div>
            <!--Section Title End-->
            <div class="col-md-6 col-custom">
                <div class="news-latter-box">
                    <div class="newsletter-form-wrap text-center">
                        <form id="mc-form" class="mc-form">
                            <input type="email" id="mc-email" class="form-control email-box" placeholder="email@example.com" name="EMAIL">
                            <button id="mc-submit" class="btn rounded-0" type="submit">Subscribe</button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                        </div>
                        <!-- mailchimp-alerts end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter Area End Here -->
<!-- Blog Area Start Here -->
<div class="blog-post-area mt-text-3">
    <div class="container custom-area">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">From The Blogs</span>
                    <h3 class="section-title-3">Our Latest Posts</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 col-custom mb-30">
                <div class="blog-lst">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a class="d-block" href="blog-details-fullwidth.html">
                                <img src="images/blog/blog1.jpg" alt="Blog Image" class="w-100">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-text">
                                <h4><a href="blog-details-fullwidth.html">Standard blog post one</a></h4>
                                <div class="blog-post-info">
                                    <span><a href="#">By admin</a></span>
                                    <span>December 18, 2020</span>
                                </div>
                                <p>Lorem ipsu dolor sit amet cons elits cumque adipisicing, sed do incid eiusmod tempor ut labore et dolore eveniet .</p>
                                <a href="blog-details-fullwidth.html" class="readmore">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 col-custom mb-30">
                <div class="blog-lst">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a class="d-block" href="blog-details-fullwidth.html">
                                <img src="images/blog/blog3.jpg" alt="Blog Image" class="w-100">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-text">
                                <h4><a href="blog-details-fullwidth.html">Standard blog post two</a></h4>
                                <div class="blog-post-info">
                                    <span><a href="#">By admin</a></span>
                                    <span>December 18, 2020</span>
                                </div>
                                <p>Lorem ipsu dolor sit amet cons elits cumque adipisicing, sed do incid eiusmod tempor ut labore et dolore eveniet .</p>
                                <a href="blog-details-fullwidth.html" class="readmore">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 col-custom mb-30">
                <div class="blog-lst">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a class="d-block" href="blog-details-fullwidth.html">
                                <img src="images/blog/blog2.jpg" alt="Blog Image" class="w-100">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-text">
                                <h4><a href="blog-details-fullwidth.html">Standard blog post three</a></h4>
                                <div class="blog-post-info">
                                    <span><a href="#">By admin</a></span>
                                    <span>December 18, 2020</span>
                                </div>
                                <p>Lorem ipsu dolor sit amet cons elits cumque adipisicing, sed do incid eiusmod tempor ut labore et dolore eveniet .</p>
                                <a href="blog-details-fullwidth.html" class="readmore">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Area End Here -->
<!-- Brand Logo Area Start Here -->
<div class="brand-logo-area gray-bg pt-no-text pb-no-text mt-text-5">
    <div class="container custom-area">
        <div class="row">
            <div class="col-12 col-custom">
                <div class="brand-logo-carousel swiper-container intro11-carousel-wrap arrow-style-3">
                    <div class="swiper-wrapper">
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="images/brand/1.png" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="images/brand/2.png" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="images/brand/3.png" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="images/brand/4.png" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide">
                            <a href="#">
                                <img src="images/brand/5.png" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <!-- Slider Navigation -->
                    <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
                    <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand Logo Area End Here -->
@endsection
