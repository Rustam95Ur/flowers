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
                                <h3 class="widget-title">Menu Categories</h3>
                                <!-- Widget Menu Start -->
                                <nav>
                                    <ul class="mobile-menu p-0 m-0">
                                        <li class="menu-item-has-children"><a href="#">Birthday Boqutets</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Aster</a></li>
                                                <li><a href="#">Aubrieta</a></li>
                                                <li><a href="#">Basket of Gold</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Funeral Flowers</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Cleome</a></li>
                                                <li><a href="#">Columbine</a></li>
                                                <li><a href="#">Coneflower</a></li>
                                                <li><a href="#">Corepsis</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Interior Decor</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Calendula</a></li>
                                                <li><a href="#">Castor Bean</a></li>
                                                <li><a href="#">Catmint</a></li>
                                                <li><a href="#">Chives</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Custom Orders</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Lily</a></li>
                                                <li><a href="#">Rose</a></li>
                                                <li><a href="#">Sunflower</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- Widget Menu End -->
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Price Filter</h3>
                                <!-- Widget Menu Start -->
                                <form action="#">
                                    <div id="slider-range"></div>
                                    <button type="submit">Filter</button>
                                    <input type="text" name="text" id="amount"/>
                                </form>
                                <!-- Widget Menu End -->
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Categories</h3>
                                <div class="sidebar-body">
                                    <ul class="sidebar-list">
                                        <li><a href="#">All Product</a></li>
                                        <li><a href="#">Best Seller (5)</a></li>
                                        <li><a href="#">Featured (4)</a></li>
                                        <li><a href="#">New Products (6)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget-list widget-mb-2">
                                <h3 class="widget-title">Color</h3>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                <label class="custom-control-label" for="customCheck12">black
                                                    (20)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                <label class="custom-control-label" for="customCheck13">red (6)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                <label class="custom-control-label" for="customCheck14">blue (8)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                <label class="custom-control-label" for="customCheck11">green
                                                    (5)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                <label class="custom-control-label" for="customCheck15">pink (4)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget-list widget-mb-3">
                                <h3 class="widget-title">Tags</h3>
                                <div class="sidebar-body">
                                    <ul class="tags">
                                        <li><a href="#">Rose</a></li>
                                        <li><a href="#">Sunflower</a></li>
                                        <li><a href="#">Tulip</a></li>
                                        <li><a href="#">Lily</a></li>
                                        <li><a href="#">Smart</a></li>
                                        <li><a href="#">Modern</a></li>
                                        <li><a href="#">Gift</a></li>
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