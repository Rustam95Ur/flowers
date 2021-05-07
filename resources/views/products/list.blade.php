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
                        <span class="onsale">Sale!</span>
                        <div class="add-action d-flex flex-column position-absolute">
                            <a onclick="update_wish_list({{$product->id}}, 'add');"
                               title="{{trans('page.home.add_to_wish')}}">
                                <i class="lnr lnr-heart" data-toggle="tooltip"
                                   data-placement="left" title="{{trans('button.wishlist')}}"></i>
                            </a>
                            <a href="#exampleModalCenter" title="Quick View" data-toggle="modal"
                               data-target="#exampleModalCenter">
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
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="price-box">
                            <span class="regular-price ">{{$product->price}} ₸</span>
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
                            <span class="regular-price ">{{$product->price}} ₸</span>
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
                            <a class="list-icon" onclick="update_wish_list({{$product->id}}, 'add'); $(this).addClass('text-pink')"
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
</div>
<!-- Shop Wrapper End -->
<!-- Bottom Toolbar Start -->
<div class="row">
    <div class="col-sm-12 col-custom">
        <div class="toolbar-bottom">
            <div class="pagination">
                <ul>
                    <li class="current">1</li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#">next</a></li>
                    <li><a href="#">&gt;&gt;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Toolbar End -->
