@extends('layouts.app')
@section('page_title', trans('header.payment'))
@section('link_title', trans('header.payment'))
@section('title', trans('header.payment'))
@section('content')
    <!-- Checkout Area Start Here -->
    <div class="checkout-area mt-no-text">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-6 col-12 col-custom">
                    <form action="{{route('payment')}}" method="post" id="payment_form" class="entrance__form">
                        @csrf
                        <input type="hidden" value="{{$product_pay_type}}" name="product_pay_type">
                        <div class="checkbox-form">
                            <h3>{{trans('cart.checkout.customer_billing_details')}}</h3>
                            <div class="row">
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label for="customer_name">{{trans('cart.checkout.customer_name')}}</label>
                                        <input type="text" {{ 'readonly' ? $user : '' }} value="{{ $user->first_name ?? $user}}" name="customer_name" id="customer_name">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label for="customer_phone">{{trans('cart.checkout.customer_phone')}}<span
                                                class="required">*</span></label>
                                        <input class="txtLogin" {{ 'readonly' ? $user : ''}} required type="text"
                                               value="{{ $user->phone ?? $user}}" name="customer_phone"
                                               id="customer_phone">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label for="customer_email">Email {{trans('cart.checkout.no_required')}}</label>
                                        <input id="customer_email" {{ 'readonly' ? $user : '' }} name="customer_email"
                                               value="{{ $user->email ?? $user}}" type="email">
                                    </div>
                                </div>
                            </div>
                            <h3>{{trans('cart.checkout.receiver_billing_details')}}</h3>
                            <div class="row">
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label for="receiver_name">{{trans('cart.checkout.receiver_name')}}</label>
                                        <input type="text" name="receiver_name" id="receiver_name">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label for="receiver_phone">{{trans('cart.checkout.receiver_phone')}}</label>
                                        <input type="text" class="txtLogin" name="receiver_phone" id="receiver_phone">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label for="address">{{trans('cart.checkout.receiver_address')}}</label>
                                        <input type="text" name="address" id="address">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label for="date">{{trans('cart.checkout.date')}}</label>
                                        <input type="date" name="date" id="date">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label for="time">{{trans('cart.checkout.time')}}</label>
                                        <input type="time" name="time" id="time">
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list create-acc">
                                        <input id="surprise" name="surprise" type="checkbox">
                                        <label for="surprise">{{trans('cart.checkout.surprise')}}</label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list create-acc">
                                        <input id="photo" name="photo" type="checkbox">
                                        <label for="photo">{{trans('cart.checkout.photo')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12 col-custom">
                    <div class="your-order">
                        <h3>{{trans('page.calculator.order')}}</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-product-name">{{trans('page.calculator.product')}}</th>
                                    <th class="cart-product-total">{{trans('page.calculator.total')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($checkout_products as $product)
                                    <tr class="cart_item">
                                        <td class="cart-product-name">{{$product['title']}} {{$product['size_title']}}
                                            <strong
                                                class="product-quantity">
                                                × {{$product['qty']}}</strong></td>
                                        <td class="cart-product-total text-center"><span
                                                class="amount">
                                                @if($main_currency->left_icon)
                                                    {{$main_currency->left_icon}}
                                                @endif
                                                {{ $product['price'] * $product['qty'] * $main_currency->value}}
                                                @if($main_currency->right_icon)
                                                    {{$main_currency->right_icon}}
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="order-total">
                                    <th>{{trans('page.cart.total_price')}}</th>
                                    <td class="text-center"><strong>
                                            <span class="amount">
                                                 @if($main_currency->left_icon)
                                                    {{$main_currency->left_icon}}
                                                @endif
                                                {{ $total_sum * $main_currency->value}}
                                                @if($main_currency->right_icon)
                                                    {{$main_currency->right_icon}}
                                                @endif
                                            </span>
                                        </strong>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="checkbox-form">
                                    <div class="row">
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label for="payment">{{trans('cart.checkout.payment_type')}}</label>
                                                <select form="payment_form" name="payment_type" class="form-control"
                                                        id="payment">
                                                    @foreach(trans('cart.checkout.payment') as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label for="shipping">{{trans('cart.checkout.shipping_type')}}</label>
                                                <select form="payment_form" name="shipping_type" class="form-control"
                                                        id="shipping">
                                                    @foreach(trans('cart.checkout.shipping') as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label for="comment">{{trans('cart.checkout.comment')}}</label>
                                                <textarea rows="3" form="payment_form" name="comment"
                                                          class="form-control" id="comment"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <button form="payment_form" type="submit"
                                            class="btn flosun-button secondary-btn black-color rounded-0 w-100">
                                        {{trans('cart.checkout.place_order')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Area End Here -->
    @push('scripts')
        <script src="{{ asset('js/phone-mask/global.js') }}"></script>
        <script src="{{ asset('js/phone-mask/entrance.js') }}"></script>
    @endpush
@endsection
