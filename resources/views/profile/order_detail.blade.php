<div class="col-lg-12 col-12 col-custom">
    <div class="your-order">
        <h3>{{trans('profile.order.your')}}</h3>
        <div class="your-order-table table-responsive mb-2">
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
                        <td class="cart-product-total text-center"><span class="amount">{{$product['price']}}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr class="order-total">
                    <th>{{trans('profile.order.total')}}</th>
                    <td class="text-center"><strong><span class="amount">{{$order_total_sum}}</span></strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
        <h4 class="text-left mb-3"><b>{{trans('cart.checkout.payment_type')}}:</b> {{trans('cart.checkout.payment.' . $order->payment_type)}}</h4>
        @foreach(trans('cart.checkout.shipping') as $key => $type)
            @if($order->shipping_type == $key)
                <h4 class="text-left mb-3"><b>{{trans('cart.checkout.shipping_type')}}:</b> {{$type}}</h4>
            @endif
        @endforeach
        <h4 class="text-left mb-3"><b>{{trans('cart.checkout.receiver_name')}}:</b> {{$order->receiver_name}}</h4>
        <h4 class="text-left mb-3"><b>{{trans('cart.checkout.receiver_phone')}}:</b> {{$order->receiver_phone}}</h4>
        <h4 class="text-left mb-3"><b>{{trans('cart.checkout.receiver_address')}}:</b> {{$order->address}}</h4>
        <h4 class="text-left mb-3"><b>{{trans('cart.checkout.date')}}:</b> {{$order->date}}</h4>
        <h4 class="text-left mb-3"><b>{{trans('cart.checkout.time')}}:</b> {{$order->time}}</h4>
        <h4 class="text-left mb-3">
            <b>{{trans('cart.checkout.surprise')}}:</b>
            {{$order->surprise ? trans('page.calculator.yes') : trans('page.calculator.no')}}
        </h4>
        <h4 class="text-left mb-3">
            <b>{{trans('cart.checkout.photo')}}:</b>
            {{$order->add_photo ? trans('page.calculator.yes') : trans('page.calculator.no')}}
        </h4>


        <h3 class="text-left mt-4"><b>{{trans('profile.order.status')}}</b>:
            @foreach(trans('profile.payment_status') as $key => $status)
                @if($order->status == $key)
                <span class="text-info">{{$status}}</span>
                @endif
            @endforeach
        </h3>
    </div>
</div>
<button class="btn flosun-button secondary-btn theme-color  rounded-0" onclick="back_to_list()">
    {{trans('button.back')}}
</button>
