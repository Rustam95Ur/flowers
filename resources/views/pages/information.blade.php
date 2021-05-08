@extends('layouts.app')
@section('title', $page->title)
@section('description', $page->meta_description)
@section('keywords', $page->meta_keywords)
@section('content')
    <!-- Blog Main Area Start Here -->
    <div class="blog-main-area">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-12 col-custom widget-mt">
                    <!-- Blog Details wrapper Area Start -->
                    <div class="blog-post-details">
                        <section class="blog-post-wrapper product-summery">
                            <div class="section-content section-title">
                                <h2 class="section-title-2 mb-5 text-center">{{$page->title}}</h2>
                                {!! $page->body !!}
                            </div>
                        </section>
                    </div>
                    <!-- Blog Details Wrapper Area End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Main Area End Here -->
@endsection
