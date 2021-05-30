@extends('layouts.app')
@section('page_title', trans('header.cart'))
@section('link_title', trans('header.cart'))
@section('content')
    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper mt-no-text">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="pro-thumbnail">{{trans('page.cart.image')}}</th>
                                <th class="pro-title">{{trans('page.cart.product')}}</th>
                                <th class="pro-price">{{trans('page.cart.price')}}</th>
                                <th class="pro-quantity">{{trans('page.cart.quantity')}}</th>
                                <th class="pro-subtotal">{{trans('page.cart.total')}}</th>
                                <th class="pro-remove">{{trans('page.cart.remove')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr id="cart-product-{{$product['id']}}">
                                    <td class="pro-thumbnail">
                                        <a href="{{route('product_show', $product['slug'])}}">
                                            @foreach(json_decode($product['images']) as $image)
                                                <img alt="{{$product['title']}}" src="{{ Voyager::image($image) }}"
                                                     class="img-fluid"/>
                                                @break
                                            @endforeach

                                        </a>
                                    </td>
                                    <td class="pro-title">
                                        <a href="{{route('product_show', $product['slug'])}}">
                                            {{$product['title']}} {{$product['size_title']}}
                                        </a>
                                    </td>
                                    <td class="pro-price"><span
                                            id="price-{{$product['id']}}">{{$product['price']}} ₸</span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">

                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" id="product-{{$product['id']}}"
                                                       value="{{$product['qty']}}"
                                                       type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                                <div class="dec qtybutton"
                                                     onclick="update_cart('{{$product['id']}}', 1, 'remove')">
                                                    <i class="fa fa-minus"></i>
                                                </div>
                                                <div class="inc qtybutton"
                                                     onclick="update_cart('{{$product['id']}}', 1)">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span class="subtotal" id="subtotal-{{$product['id']}}">{{$product['price'] * $product['qty']}} ₸</span>
                                    </td>
                                    <td class="pro-remove">
                                        <a onclick="update_cart('{{$product['id']}}', 0, 'remove'); $('#cart-product-{{$product['id']}}').remove(); updated_after_delete()">
                                            <i class="lnr lnr-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Cart Update Option -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 ml-auto col-custom">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h3>{{trans('page.cart.cart_total')}}</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>{{trans('page.cart.sub_total')}}</td>
                                        <td class="sub-total">{{$total_price}} ₸</td>
                                    </tr>
                                    @if($total_price > 0)
                                        @if($shipping_price > 0)
                                            <tr>
                                                <td>{{trans('page.cart.shipping')}}</td>
                                                <td class="shipping-price">{{$shipping_price}} ₸</td>
                                            </tr>
                                        @endif
                                        <tr class="total">
                                            <td>{{trans('page.cart.total_price')}}</td>
                                            <td class="total-amount">{{$total_price + $shipping_price}} ₸</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                        <a href="{{route('checkout')}}" class="btn flosun-button primary-btn rounded-0 black-btn w-100">
                            {{trans('page.cart.payment')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
@endsection
