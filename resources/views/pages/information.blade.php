@extends('layouts.app')
@section('title', $page->title)
@section('description', $page->getTranslatedAttribute('meta_description', $locale, 'fallbackLocale'))
@section('keywords', $page->getTranslatedAttribute('meta_keywords', $locale, 'fallbackLocale'))
@section('page_title', $page->getTranslatedAttribute('title', $locale, 'fallbackLocale'))
@section('link_title', $page->getTranslatedAttribute('title', $locale, 'fallbackLocale'))
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
                                <h2 class="section-title-2 mb-5 text-center">
                                    {{$page->getTranslatedAttribute('title', $locale, 'fallbackLocale')}}
                                </h2>
                                {!! $page->getTranslatedAttribute('body', $locale, 'fallbackLocale') !!}
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
