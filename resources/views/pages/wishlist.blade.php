@extends('layouts.app')
@section('content')
    <!-- Wishlist main wrapper start -->
    <div class="wishlist-main-wrapper mt-no-text mb-5 pb-5">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Wishlist Table Area -->
                    <div class="wishlist-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="pro-thumbnail">{{trans('page.cart.image')}}</th>
                                <th class="pro-title">{{trans('page.cart.product')}}</th>
                                <th class="pro-price">{{trans('page.cart.price')}}</th>
                                <th class="pro-cart"> {{trans('button.add_to_cart')}}</th>
                                <th class="pro-remove">{{trans('page.cart.remove')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wish_products as $product)
                                <tr id="wish-product-{{$product['id']}}">
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
                                            {{$product['title']}}
                                        </a>
                                    </td>
                                    <td class="pro-price"><span>{{$product['price']}} ₸</span></td>
                                    <td class="pro-cart">
                                        <a onclick="update_cart({{$product['id']}}, 1, 'add'); $(this).addClass('bg-success')"
                                           class="btn product-cart button-icon flosun-button dark-btn ">
                                            {{trans('button.add_to_cart')}}
                                        </a>
                                    </td>
                                    <td class="pro-remove">
                                        <a onclick="update_wish_list({{$product['id']}}, 'remove'); count_wish(); $('#wish-product-{{$product['id']}}').remove()">
                                            <i class="lnr lnr-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist main wrapper end -->
@endsection
