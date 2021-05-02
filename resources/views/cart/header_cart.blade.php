<li class="minicart-wrap">
    <a href="{{route('cart')}}" class="minicart-btn toolbar-btn">
        <i class="fa fa-shopping-cart"></i>
        <span class="cart-item_count">{{ $product_cart }}</span>
    </a>
    <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
        <div class="single-cart-item">
            <div class="cart-img">
                <a href="cart.html"><img src="images/cart/1.jpg" alt=""></a>
            </div>
            <div class="cart-text">
                <h5 class="title"><a href="cart.html">Odio tortor consequat</a></h5>
                <div class="cart-text-btn">
                    <div class="cart-qty">
                        <span>1×</span>
                        <span class="cart-price">$98.00</span>
                    </div>
                    <button type="button"><i class="ion-trash-b"></i></button>
                </div>
            </div>
        </div>
        <div class="single-cart-item">
            <div class="cart-img">
                <a href="cart.html"><img src="images/cart/2.jpg" alt=""></a>
            </div>
            <div class="cart-text">
                <h5 class="title"><a href="cart.html">Integer eget augue</a></h5>
                <div class="cart-text-btn">
                    <div class="cart-qty">
                        <span>1×</span>
                        <span class="cart-price">$98.00</span>
                    </div>
                    <button type="button"><i class="ion-trash-b"></i></button>
                </div>
            </div>
        </div>
        <div class="single-cart-item">
            <div class="cart-img">
                <a href="cart.html"><img src="images/cart/3.jpg" alt=""></a>
            </div>
            <div class="cart-text">
                <h5 class="title"><a href="cart.html">Eleifend quam</a></h5>
                <div class="cart-text-btn">
                    <div class="cart-qty">
                        <span>1×</span>
                        <span class="cart-price">$98.00</span>
                    </div>
                    <button type="button"><i class="ion-trash-b"></i></button>
                </div>
            </div>
        </div>
        <div class="cart-price-total d-flex justify-content-between">
            <h5>Total :</h5>
            <h5>$166.00</h5>
        </div>
        <div class="cart-links d-flex justify-content-between">
            <a class="btn product-cart button-icon flosun-button dark-btn" href="{{route('cart')}}">{{trans('button.view_cart')}}</a>
            <a class="btn flosun-button secondary-btn rounded-0" href="{{route('checkout')}}">{{trans('button.checkout')}}</a>
        </div>
    </div>
</li>

