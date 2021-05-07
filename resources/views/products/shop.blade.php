@extends('layouts.app')
@section('content')
    <!-- Shop Main Area Start Here -->
    <div class="shop-main-area">
        <div class="container container-default custom-area">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-12 col-custom widget-mt">
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper mb-30">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-3" title="Grid"><i
                                    class="fa fa-th"></i></button>
                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i
                                    class="fa fa-th-list"></i></button>
                        </div>
                        <div class="shop-select">
                            <form class="d-flex flex-column w-100" action="#">
                                <div class="form-group">
                                    <select class="form-control nice-select w-100">
                                        <option selected value="1">{{trans('shop.sort.alphabetically')}}</option>
                                        <option value="2">{{trans('shop.sort.newness')}}</option>
                                        <option value="3">{{trans('shop.sort.price.low')}}</option>
                                        <option value="4">{{trans('shop.sort.price.high')}}</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="product_list">
                        @include('products.list')
                    </div>
                </div>
                <div class="col-lg-3 col-12 col-custom">
                    <!-- Sidebar Widget Start -->
                    <aside class="sidebar_widget widget-mt">
                        <div class="widget_inner">
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">{{trans('shop.search')}}</h3>
                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="{{trans('shop.search')}}"
                                               aria-label="Search Our Store">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">{{trans('shop.filter.price')}}</h3>
                                <!-- Widget Menu Start -->
                                <form action="#">
                                    <div id="slider-range"></div>
                                    <input type="text" class="text-center w-100" name="text" id="amount"/>
                                </form>
                                <!-- Widget Menu End -->
                            </div>
                            <div class="widget-list widget-mb-2">
                                <h3 class="widget-title">{{trans('shop.filter.color')}}</h3>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container colors-list">
                                        @foreach($colors as $color)
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="{{$color->id}}"
                                                           class="custom-control-input"
                                                           id="color_checkbox_{{$color->id}}">
                                                    <label class="custom-control-label"
                                                           for="color_checkbox_{{$color->id}}">{{$color->title}}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            <div class="widget-list widget-mb-2">
                                <h3 class="widget-title">{{trans('shop.filter.size')}}</h3>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container colors-list">
                                        @foreach($sizes as $size)
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="{{$size->id}}"
                                                           class="custom-control-input"
                                                           id="size_checkbox_{{$size->id}}">
                                                    <label class="custom-control-label"
                                                           for="size_checkbox_{{$size->id}}">{{$size->title}}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            <div class="widget-list widget-mb-2">
                                <h3 class="widget-title">{{trans('shop.filter.categories')}}</h3>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                    @foreach($categories as $category)
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" value="{{$category->id}}"
                                                       class="custom-control-input"
                                                       id="category_checkbox_{{$category->id}}">
                                                <label class="custom-control-label"
                                                       for="category_checkbox_{{$category->id}}">{{$category->name}}</label>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="widget-list mb-0">
                                <h3 class="widget-title">Recent Products</h3>
                                <div class="sidebar-body">
                                    <div class="sidebar-product align-items-center">
                                        <a href="product-details.html" class="image">
                                            <img src="/images/cart/1.jpg" alt="product">
                                        </a>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2"><a href="product-details.html">Glory of the Snow</a>
                                                </h4>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price ">$80.00</span>
                                                <span class="old-price"><del>$90.00</del></span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sidebar-product align-items-center">
                                        <a href="product-details.html" class="image">
                                            <img src="/images/cart/2.jpg" alt="product">
                                        </a>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2"><a href="product-details.html">Pearly
                                                        Everlasting</a></h4>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price ">$50.00</span>
                                                <span class="old-price"><del>$60.00</del></span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sidebar-product align-items-center">
                                        <a href="product-details.html" class="image">
                                            <img src="/images/cart/3.jpg" alt="product">
                                        </a>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2"><a href="product-details.html">Jack in the
                                                        Pulpit</a></h4>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price ">$40.00</span>
                                                <span class="old-price"><del>$50.00</del></span>
                                            </div>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- Sidebar Widget End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Main Area End Here -->
@endsection
