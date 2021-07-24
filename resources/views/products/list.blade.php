<!--shop toolbar end-->
<!-- Shop Wrapper Start -->
<div class="row shop_wrapper grid_3">
    @foreach($products as $product)
        <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
            <div class="product-item">
                <div class="single-product position-relative mr-0 ml-0">
                    <div class="product-image">
                        <a class="d-block" href="{{route('product_show', $product->slug)}}">
                            @foreach(json_decode($product->images) as $image)
                                @if($loop->index < 2)
                                    <img alt="{{$product->title}}" src="{{ Voyager::image($image) }}"
                                         class="product-image-{{$loop->iteration}} {{ $loop->iteration == 2 ? 'position-absolute' : '' }} w-100"/>
                                @endif
                            @endforeach
                        </a>
                        @if($product->is_sale)
                            <span class="onsale">Sale!</span>
                        @endif
                        <div class="add-action d-flex flex-column position-absolute">
                            <a onclick="update_wish_list({{$product->id}}, 'add');"
                               title="{{trans('page.home.add_to_wish')}}">
                                <i class="lnr lnr-heart" data-toggle="tooltip"
                                   data-placement="left" title="{{trans('button.wishlist')}}"></i>
                            </a>
                            <a onclick="quick_view_product({{$product->id}})">
                                <i class="lnr lnr-eye" data-toggle="tooltip"
                                   data-placement="left" title="{{trans('button.quick_view')}}"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="product-title">
                            <h4 class="title-2">
                                <a href="{{route('product_show', $product->slug)}}">
                                    {{$product->title}}
                                </a>
                            </h4>
                        </div>
                        @php $key = array_search($product->id, array_column($product_ratings, 'product_id')) @endphp
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
                            <span class="regular-price ">
                               @if($main_currency->left_icon)
                                    {{$main_currency->left_icon}}
                                @endif
                                {{ $product->updated_price * $main_currency->value}}
                                @if($main_currency->right_icon)
                                    {{$main_currency->right_icon}}
                                @endif
                            </span>
                        </div>
                        <a onclick="update_cart('{{$product->id}}', 1); $(this).addClass('text-success')"
                           class="btn product-cart">
                            {{trans('button.add_to_cart')}}
                        </a>
                    </div>
                    <div class="product-content-listview">
                        <div class="product-title">
                            <h4 class="title-2">
                                <a href="{{route('product_show', $product->slug)}}">
                                    {{$product->title}}
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
                            <span class="regular-price ">
                             @if($main_currency->left_icon)
                                    {{$main_currency->left_icon}}
                            @endif
                            {{ $product->updated_price * $main_currency->value}}
                            @if($main_currency->right_icon)
                                {{$main_currency->right_icon}}
                            @endif
                            </span>
                        </div>
                        <p class="desc-content">{!! substr($product->description, 0, 300) !!}</p>
                        <div class="button-listview">
                            <a onclick="update_cart('{{$product->id}}', 1); $(this).addClass('text-white bg-success ')"
                               class="btn product-cart button-icon flosun-button dark-btn"
                               data-toggle="tooltip" data-placement="top" title="{{trans('button.add_to_cart')}}">
                                <span>
                                    {{trans('button.add_to_cart')}}
                                </span>
                            </a>
                            <a class="list-icon"
                               onclick="update_wish_list({{$product->id}}, 'add'); $(this).addClass('text-pink')"
                               title="{{trans('button.wishlist')}}">
                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="top"
                                   title="{{trans('button.wishlist')}}"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if(count($products) == 0)
        <h3 class="section-title-3 font-weight-bold mt-4 text-center">{{trans('shop.filter.no_result')}}</h3>
    @endif
</div>
<!-- Shop Wrapper End -->
<!-- Bottom Toolbar Start -->
@if(count($products) > 0 and $products->hasPages())
    <div class="row">
        <div class="col-sm-12 col-custom">
            <div class="toolbar-bottom">
                {{$products->appends(request()->input())->links('vendor.pagination.custom')}}
            </div>
        </div>
    </div>
@endif

<!-- Bottom Toolbar End -->
