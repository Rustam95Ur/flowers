@extends('layouts.app')
@section('page_title', trans('header.contact'))
@section('link_title', trans('header.contact'))
@section('title', trans('header.contact'))
@section('content')

    <!-- Contact Us Area Start Here -->
    <div class="contact-us-area mt-no-text">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-custom">
                    <div class="contact-info-item">
                        <div class="con-info-icon">
                            <i class="lnr lnr-map-marker"></i>
                        </div>
                        <div class="con-info-txt">
                            <h4>{{trans('contact.address')}}</h4>
                            <p>{{Voyager::setting('site.address')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-custom">
                    <div class="contact-info-item">
                        <div class="con-info-icon">
                            <i class="lnr lnr-smartphone"></i>
                        </div>
                        <div class="con-info-txt">
                            <h4>{{trans('contact.phone')}}</h4>
                            <p>
                                <a href="tel:{{Voyager::setting('site.phone')}}">{{Voyager::setting('site.phone')}}</a><br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-custom text-align-center">
                    <div class="contact-info-item">
                        <div class="con-info-icon">
                            <i class="lnr lnr-envelope"></i>
                        </div>
                        <div class="con-info-txt">
                            <h4>{{trans('contact.email')}}</h4>
                            <p>
                                <a href="mailto:{{Voyager::setting('site.email')}}">{{Voyager::setting('site.email')}}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-custom">
                    <form method="post" action="{{route('contact_message_send')}}">
                        <div class="comment-box mt-5">
                            <h5 class="text-uppercase">{{trans('contact.touch')}}</h5>
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area name gray-bg" type="text"
                                               name="name" id="con_name"
                                               placeholder="{{trans('contact.name')}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area email gray-bg"
                                               type="email"
                                               name="email" id="con_email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area gray-bg" type="text"
                                               name="subject" id="con_content"
                                               placeholder="{{trans('contact.subject')}}">
                                    </div>
                                </div>
                                <div class="col-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area gray-bg" type="text"
                                               name="phone" id="con_content"
                                               placeholder="{{trans('contact.phone_number')}}">
                                    </div>
                                </div>
                                <div class="col-12 col-custom">
                                    <div class="input-item mb-4">
                                        <textarea cols="30" rows="5"
                                                  class="border-0 rounded-0 w-100 custom-textarea input-area gray-bg"
                                                  name="message" id="con_message"
                                                  placeholder="{{trans('contact.message')}}"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-custom mt-40">
                                    <button type="submit" class="btn flosun-button secondary-btn theme-color rounded-0">
                                        {{trans('button.send_message')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us Area End Here -->
@endsection
