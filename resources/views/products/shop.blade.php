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
                                    <select name="sort" form="filter_form" class="form-control nice-select w-100">
                                        <option value="3" {{(array_key_exists('sort', $filters) and $filters['sort'] == 3) ? 'selected'  : ''}}>{{trans('shop.sort.price.low')}}</option>
                                        <option value="4" {{(array_key_exists('sort', $filters) and $filters['sort'] == 4) ? 'selected'  : ''}}>{{trans('shop.sort.price.high')}}</option>
                                        <option value="1" {{(array_key_exists('sort', $filters) and $filters['sort'] == 1) ? 'selected'  : ''}}>
                                            {{trans('shop.sort.alphabetically')}}</option>
                                        <option value="2" {{(array_key_exists('sort', $filters) and $filters['sort'] == 2) ? 'selected'  : ''}}>{{trans('shop.sort.newness')}}</option>
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
                            <div class="widget-list">
                                <h3 class="widget-title">{{trans('shop.search')}}</h3>
                                <div class="search-box">
                                    <div class="input-group">
                                        <input form="filter_form" value="{{array_key_exists('title', $filters) ? $filters['title'] : ''}}" name="title" id="search-main" type="text"
                                               class="form-control" placeholder="{{trans('shop.search')}}"
                                               aria-label="{{trans('shop.search')}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-list">
                                <h3 class="widget-title">{{trans('shop.filter.price')}}</h3>
                                <!-- Widget Menu Start -->
                                <form action="#" name="filter_form" id="filter_form">
                                    <div id="slider-range"></div>
                                    <label for="amount"></label>
                                    <input type="text" class="text-center w-100"
                                           name="price[]" value="{{array_key_exists('price', $filters) ? $filters['price'][0] : ''}}" id="amount"/>
                                </form>
                                <!-- Widget Menu End -->
                            </div>
                            <div class="widget-list">
                                <h3 class="widget-title">{{trans('shop.filter.color')}}</h3>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container colors-list">
                                        @foreach($colors as $color)
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input form="filter_form" name="colors[]" type="checkbox"
                                                           value="{{$color->id}}"
                                                           class="custom-control-input form-check-input"
                                                           id="color_checkbox_{{$color->id}}"
                                                    @if(array_key_exists('colors', $filters) and in_array($color->id, $filters['colors']))
                                                        checked
                                                        @endif
                                                    >
                                                    <label class="custom-control-label"
                                                           for="color_checkbox_{{$color->id}}">{{$color->title}}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            <div class="widget-list">
                                <h3 class="widget-title">{{trans('shop.filter.size')}}</h3>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container colors-list">
                                        @foreach($sizes as $size)
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input form="filter_form" name="sizes[]" type="checkbox"
                                                           value="{{$size->id}}"
                                                           class="custom-control-input form-check-input"
                                                           id="size_checkbox_{{$size->id}}"
                                                           @if(array_key_exists('sizes', $filters) and in_array($size->id, $filters['sizes']))
                                                           checked
                                                        @endif
                                                    >
                                                    <label class="custom-control-label"
                                                           for="size_checkbox_{{$size->id}}">{{$size->title}}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            <div class="widget-list">
                                <h3 class="widget-title">{{trans('shop.filter.categories')}}</h3>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        @foreach($categories as $category)
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input form="filter_form" name="categories[]" type="checkbox"
                                                           value="{{$category->id}}"
                                                           class="custom-control-input form-check-input"
                                                           id="category_checkbox_{{$category->id}}"
                                                           @if(array_key_exists('categories', $filters) and in_array($category->id, $filters['categories']))
                                                           checked
                                                        @endif
                                                    >
                                                    <label class="custom-control-label"
                                                           for="category_checkbox_{{$category->id}}">{{$category->name}}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
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
    @push('scripts')
        <script src="{{asset('js/filter.js')}}"></script>
    @endpush
@endsection
