    <a class="minicart-btn toolbar-btn">
        <i class="fa fa-shopping-cart"></i>
        <span class="cart-item_count" id="cart_count">{{ $qty_cart }}</span>
    </a>
    <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
        <div class="cart-items">
            @foreach($mini_cart_products as $product)
                <div class="single-cart-item">
                    <div class="cart-img">
                        <a href="{{route('product_show', $product['slug'])}}">
                            @foreach(json_decode($product['images']) as $image)
                                <img alt="{{$product['title']}}" src="{{ Voyager::image($image) }}"/>
                                @break
                            @endforeach
                        </a>
                    </div>
                    <div class="cart-text">
                        <h5 class="title"><a href="{{route('product_show', $product['slug'])}}">
                                {{ $product['title']}} {{$product['size_title']}}
                            </a>
                        </h5>
                        <div class="cart-text-btn">
                            <div class="cart-qty">
                                <span>{{ $product['qty']}}×</span>
                                <span class="cart-price">
                                    {{ $product['price'] * $main_currency->value}}
                                </span>
                            </div>
                            <button type="button"><i class="ion-trash-b"></i></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="cart-price-total d-flex justify-content-between">
            <h5>{{trans('page.cart.total')}} :</h5>
            <h5>
                @if($main_currency->left_icon)
                    {{$main_currency->left_icon}}
                @endif
                {{ $mini_cart_total_price * $main_currency->value}}
                @if($main_currency->right_icon)
                    {{$main_currency->right_icon}}
                @endif
            </h5>
        </div>
        <div class="cart-links d-flex justify-content-between">
            <a class="btn product-cart button-icon flosun-button dark-btn"
               href="{{route('cart')}}">{{trans('button.view_cart')}}</a>
            <a class="btn flosun-button secondary-btn rounded-0"
               href="{{route('buy_all_product')}}">{{trans('button.checkout')}}</a>
        </div>
    </div>


