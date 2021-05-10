<div class="col-md-6 col-custom">
    <div class="modal-product-img">
        <a class="w-100" href="#">
            @foreach(json_decode($quick_product->images) as $image)
                <img alt="{{$quick_product->title}}" src="{{ Voyager::image($image) }}"
                     class="w-100"/>
                @break
            @endforeach
        </a>
    </div>
</div>
<div class="col-md-6 col-custom">
    <div class="modal-product">
        <div class="product-content">
            <div class="product-title">
                <h4 class="title">{{$quick_product->title}}</h4>
            </div>
            <div class="price-box">
                <span class="regular-price ">{{$quick_product->price}} ₸</span>
            </div>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p class="desc-content">{!! $quick_product->description !!}</p>
            <div class="quantity-with-btn">
                <div class="quantity">

                    <div class="cart-plus-minus">
                        <input class="cart-plus-minus-box" id="product-{{$quick_product->id}}"
                               value="1"
                               type="text">
                        <div class="dec qtybutton">-</div>
                        <div class="inc qtybutton">+</div>
                        <div class="dec qtybutton"
                             onclick="plus_minus({{$quick_product->id}}, 'dec');">
                            <i class="fa fa-minus"></i>
                        </div>
                        <div class="inc qtybutton"
                             onclick="plus_minus({{$quick_product->id}}, 'inc');">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="add-to_btn">
                    <a class="btn product-cart button-icon flosun-button dark-btn"
                       onclick="$(this).addClass('bg-success'); update_cart({{$quick_product->id}}, $('.cart-plus-minus-box').val());">
                        {{trans('button.add_to_cart')}}
                    </a>
                    <a  onclick="update_wish_list({{$quick_product->id}}, 'add'); $(this).addClass('active-btn')"
                        class="btn flosun-button secondary-btn rounded-0">
                        {{trans('button.wishlist')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
