<div class="col-lg-12 col-12 col-custom">
    <div class="your-order">
        <h3>{{trans('profile.order.your')}}</h3>
        <div class="your-order-table table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th class="cart-product-name">{{trans('profile.order.product')}}</th>
                    <th class="cart-product-total">{{trans('profile.order.total')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="cart_item">
                        <td class="cart-product-name">{{$product['title']}}<strong class="product-quantity">
                                × {{$product['qty']}}</strong></td>
                        <td class="cart-product-total text-center"><span class="amount">£165.00</span></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr class="order-total">
                    <th>{{trans('profile.order.total')}}</th>
                    <td class="text-center"><strong><span class="amount">£215.00</span></strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<button class="btn flosun-button secondary-btn theme-color  rounded-0" onclick="back_to_list()">
    {{trans('button.back')}}
</button>
