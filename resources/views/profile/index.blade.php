@extends('layouts.app')
@section('title', trans('profile.page_title'))
@section('page_title', trans('profile.page_title'))
@section('link_title', trans('profile.page_title'))
@section('content')
    <div class="my-account-wrapper mt-no-text">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-custom">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#account-info" class="active" data-toggle="tab">
                                        <i class="fa fa-user"></i>
                                        {{trans('profile.menu.account')}}
                                    </a>
                                    <a href="#orders" data-toggle="tab">
                                        <i class="fa fa-cart-arrow-down"></i>
                                        {{trans('profile.menu.orders')}}
                                    </a>
                                    <a href="#address-edit" data-toggle="tab">
                                        <i class="fa fa-map-marker"></i>
                                        {{trans('profile.menu.address')}}
                                    </a>
                                    <form id="logoutForm" action="{{route('logout')}}" method="post" class="">
                                        @csrf
                                    </form>
                                    <a href="javascript:document.getElementById('logoutForm').submit()">
                                        <i class="fa fa-sign-out"></i>
                                        {{trans('profile.menu.logout')}}
                                    </a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8 col-custom">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>{{trans('profile.account_detail')}}</h3>
                                            <div class="account-details-form">
                                                <form action="{{route('profile_update')}}" method="post" class="entrance__form">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-custom">
                                                            <div class="single-input-item mb-3">
                                                                <label for="first-name" class="required mb-1">
                                                                    {{trans('auth.form.first_name')}}
                                                                </label>
                                                                <input type="text" id="first-name" name="first_name"
                                                                       value="{{request()->user()->first_name}}"
                                                                       placeholder=" {{trans('auth.form.first_name')}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-custom">
                                                            <div class="single-input-item mb-3">
                                                                <label for="last-name" class="required mb-1">
                                                                    {{trans('auth.form.last_name')}}
                                                                </label>
                                                                <input type="text" id="last-name" name="last_name"
                                                                       value="{{request()->user()->last_name}}"
                                                                       placeholder="{{trans('auth.form.last_name')}}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="email"
                                                               class="required mb-1">{{trans('auth.form.email')}}</label>
                                                        <input readonly type="email" id="email" value="{{request()->user()->email}}"
                                                               placeholder="{{trans('auth.form.email')}}"/>
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="phone"
                                                               class="required mb-1">{{trans('auth.form.phone')}}</label>
                                                        <input readonly type="text" id="phone" value="{{request()->user()->phone}}"
                                                               class="txtLogin" placeholder="{{trans('auth.form.phone')}}"/>
                                                    </div>
                                                    <fieldset>
                                                        <legend>{{trans('profile.password_change')}}</legend>
                                                        <div class="single-input-item mb-3">
                                                            <label for="current-pwd" class="required mb-1">
                                                                {{trans('auth.form.current_password')}}
                                                            </label>
                                                            <input type="password" id="current-pwd" name="old_password"
                                                                   placeholder="{{trans('auth.form.current_password')}}"/>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-custom">
                                                                <div class="single-input-item mb-3">
                                                                    <label for="new-pwd" class="required mb-1">
                                                                        {{trans('auth.form.new_password')}}
                                                                    </label>
                                                                    <input type="password" id="new-pwd" name="new_password"
                                                                           placeholder="{{trans('auth.form.new_password')}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-custom">
                                                                <div class="single-input-item mb-3">
                                                                    <label for="confirm-pwd" class="required mb-1">
                                                                        {{trans('auth.form.confirm_password')}}
                                                                    </label>
                                                                    <input type="password" id="confirm-pwd"
                                                                           placeholder=" {{trans('auth.form.confirm_password')}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item single-item-button">
                                                        <button
                                                            class="btn flosun-button secondary-btn theme-color  rounded-0">
                                                            {{trans('button.save_changes')}}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3> {{trans('profile.menu.orders')}}</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{trans('profile.order.date')}}</th>
                                                        <th>{{trans('profile.order.status')}}</th>
                                                        <th>{{trans('profile.order.total')}}</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{$order->id}}</td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>{{$order->status}}</td>
                                                            <td>{{$order->total}}</td>
                                                            <td>
                                                                <a href="#"
                                                                   class="btn flosun-button secondary-btn theme-color rounded-0">
                                                                    {{trans('button.view_order')}}
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>{{trans('profile.menu.address')}}</h3>
                                            <address>
                                                <p><strong>Город: Алматы</strong></p>
                                                <p>Темирязева</p>
                                            </address>
                                            <a href="#"
                                               class="btn flosun-button secondary-btn theme-color  rounded-0">
                                                <i class="fa fa-edit mr-2"></i>
                                                {{trans('button.edit_address')}}
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/phone-mask/global.js') }}"></script>
        <script src="{{ asset('js/phone-mask/entrance.js') }}"></script>
    @endpush
@endsection
