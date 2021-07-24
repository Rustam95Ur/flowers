@extends('layouts.app')
@section('page_title', trans('header.calculator'))
@section('link_title', trans('header.calculator'))
@section('title', trans('header.calculator'))
@section('content')
    <!-- Checkout Area Start Here -->
    <div class="checkout-area mt-no-text">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-6 col-12 col-custom">
                    <form action="#">
                        <div class="checkbox-form">
                            <h3>{{trans('page.calculator.title')}}</h3>
                            <div class="row">
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label for='green'>{{trans('page.calculator.green')}}</label>
                                        <select class="form-control" id="green">
                                            <option value="1">{{trans('page.calculator.yes')}}</option>
                                            <option value="0">{{trans('page.calculator.no')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <label for="decor">{{trans('page.calculator.decor')}}</label>
                                    <select class="form-control" id="decor">
                                        <option>{{trans('page.calculator.mesh')}}</option>
                                        <option>{{trans('page.calculator.felt')}}</option>
                                        <option>{{trans('page.calculator.newspaper')}}</option>
                                        <option>{{trans('page.calculator.ribbon')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($categories as $category)
                                    <div class="col-md-6 col-custom">
                                        <div class="checkout-form-list create-acc">
                                            <input id="cbox-{{$category->id}}" type="checkbox"
                                                   class="category_checkbox">
                                            <label for="cbox-{{$category->id}}">
                                                {{$category->getTranslatedAttribute('name', $locale, 'fallbackLocale')}}
                                            </label>
                                        </div>
                                        <div id="cbox-{{$category->id}}-info" class="checkout-form-list create-account">
                                            <label
                                                for="category-{{$category->id}}">{{trans('page.calculator.count')}}</label>
                                            <input id="category-{{$category->id}}" class="calculator_count"
                                                   placeholder="{{trans('page.calculator.count_place')}}" type="number">
                                            <input type="hidden" value="{{$category->price}}" id="category-price-{{$category->id}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12 col-custom">
                    <div class="your-order">
                        <h3>{{trans('page.calculator.order')}}</h3>
                        <input type="hidden" value="{{$main_currency->left_icon}}" name="currency_left_icon">
                        <input type="hidden" value="{{$main_currency->right_icon}}" name="currency_right_icon">
                        <input type="hidden" value="{{$main_currency->value}}" name="currency_value">
                        <input type="hidden" value="{{trans('page.calculator.green')}}" name="green_title">
                        <input type="hidden" value="{{trans('page.calculator.decor')}}" name="decor_title">
                        <input type="hidden" value="{{trans('page.calculator.mesh')}}" name="default_decor">
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-product-name">{{trans('page.calculator.product')}}</th>
                                    <th class="cart-product-total">{{trans('page.calculator.total')}}</th>
                                </tr>
                                </thead>
                                <tbody id="cart_items_table">
                                </tbody>
                                <tfoot>
                                <tr class="order-total">
                                    <th>{{trans('page.calculator.total_price')}}</th>
                                    <td class="text-center"><strong><span class="amounts"></span></strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="order-button-payment">
                                    <form method="post" action="{{route('calculator_send')}}">
                                        @csrf
                                        <input type="hidden" name="order" value="">
                                        <div>
                                            <label for="phone">{{trans('page.calculator.phone')}}<span class="required">*</span></label>
                                            <input placeholder="" type="text" name="phone" id="phone" class="form-control" required>
                                        </div>
                                        <button class="btn mt-3 flosun-button secondary-btn black-color rounded-0 w-100" type="submit">
                                            {{trans('page.calculator.place_order')}}
                                        </button>
                                    </form>

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
        <script src="{{asset('js/calculator.js')}}"></script>
    @endpush
@endsection
