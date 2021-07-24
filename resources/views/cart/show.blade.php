@extends('layouts.app')
@section('page_title', trans('header.cart'))
@section('link_title', trans('header.cart'))
@section('title', trans('header.cart'))
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
                                <tr id="cart-product-{{$product['id']}}{{$product['type'] == 'size' ? '-'.$product['size_id'] : '' }}">
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
                                    <td class="pro-price">
                                        @if($product['type'] == 'size')
                                            <span id="price-{{$product['id']}}-{{$product['size_id']}}">
                                                @if($main_currency->left_icon)
                                                    {{$main_currency->left_icon}}
                                                @endif
                                                {{ $product['price'] * $main_currency->value}}
                                                @if($main_currency->right_icon)
                                                    {{$main_currency->right_icon}}
                                                @endif
                                            </span>
                                        @else
                                            <span id="price-{{$product['id']}}">
                                               @if($main_currency->left_icon)
                                                    {{$main_currency->left_icon}}
                                                @endif
                                                {{ $product['price'] * $main_currency->value}}
                                                @if($main_currency->right_icon)
                                                    {{$main_currency->right_icon}}
                                                @endif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="pro-quantity">
                                        <div class="quantity">

                                            <div class="cart-plus-minus">
                                                @if($product['type'] == 'size')
                                                    <input class="cart-plus-minus-box"
                                                           id="product-{{$product['id']}}-{{$product['size_id']}}"
                                                           value="{{$product['qty']}}"
                                                           type="text">
                                                @else
                                                    <input class="cart-plus-minus-box" id="product-{{$product['id']}}"
                                                           value="{{$product['qty']}}"
                                                           type="text">
                                                @endif
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                                @if($product['type'] == 'size')
                                                    <div class="dec qtybutton"
                                                         onclick="update_cart('{{$product['id']}}', 1, 'remove', '/' + {{$product['size_id']}})">
                                                        <i class="fa fa-minus"></i>
                                                    </div>
                                                    <div class="inc qtybutton"
                                                         onclick="update_cart('{{$product['id']}}', 1, 'add', '/' + {{$product['size_id']}})">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                @else
                                                    <div class="dec qtybutton"
                                                         onclick="update_cart('{{$product['id']}}', 1, 'remove')">
                                                        <i class="fa fa-minus"></i>
                                                    </div>
                                                    <div class="inc qtybutton"
                                                         onclick="update_cart('{{$product['id']}}', 1)">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal">
                                        @if($product['type'] == 'size')
                                            <span id="subtotal-{{$product['id']}}-{{$product['size_id']}}"
                                                  class="subtotal">
                                                @if($main_currency->left_icon)
                                                    {{$main_currency->left_icon}}
                                                @endif
                                                {{ $product['price'] * $product['qty'] * $main_currency->value}}
                                                @if($main_currency->right_icon)
                                                    {{$main_currency->right_icon}}
                                                @endif
                                            </span>
                                        @else
                                            <span class="subtotal" id="subtotal-{{$product['id']}}">
                                                @if($main_currency->left_icon)
                                                    {{$main_currency->left_icon}}
                                                @endif
                                                {{ $product['price'] * $product['qty'] * $main_currency->value}}
                                                @if($main_currency->right_icon)
                                                    {{$main_currency->right_icon}}
                                                @endif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="pro-remove">
                                        @if($product['type'] == 'size')
                                            <a onclick="update_cart('{{$product['id']}}', 0, 'remove', '/' + {{$product['size_id']}}); $('#cart-product-{{$product['id']}}-{{$product['size_id']}}').remove(); updated_after_delete()">
                                                <i class="lnr lnr-trash"></i>
                                            </a>
                                        @else
                                            <a onclick="update_cart('{{$product['id']}}', 0, 'remove'); $('#cart-product-{{$product['id']}}').remove(); updated_after_delete()">
                                                <i class="lnr lnr-trash"></i>
                                            </a>
                                        @endif
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
                                        <td class="sub-total">
                                            @if($main_currency->left_icon)
                                                {{$main_currency->left_icon}}
                                            @endif
                                            {{ $total_price * $main_currency->value}}
                                            @if($main_currency->right_icon)
                                                {{$main_currency->right_icon}}
                                            @endif
                                        </td>
                                    </tr>
                                    @if($total_price > 0)
                                        @if($shipping_price > 0)
                                            <tr>
                                                <td>{{trans('page.cart.shipping')}}</td>
                                                <td class="shipping-price">
                                                    @if($main_currency->left_icon)
                                                        {{$main_currency->left_icon}}
                                                    @endif
                                                    {{ $shipping_price * $main_currency->value}}
                                                    @if($main_currency->right_icon)
                                                        {{$main_currency->right_icon}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                        <tr class="total">
                                            <td>{{trans('page.cart.total_price')}}</td>
                                            <td class="total-amount">
                                                @if($main_currency->left_icon)
                                                    {{$main_currency->left_icon}}
                                                @endif
                                                {{ ($total_price + $shipping_price) * $main_currency->value}}
                                                @if($main_currency->right_icon)
                                                    {{$main_currency->right_icon}}
                                                @endif
                                            </td>
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
