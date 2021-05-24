@extends('layouts.app')
@section('page_title', trans('header.gallery'))
@section('link_title', trans('header.gallery'))
@section('content')
    <!-- Blog Main Area Start Here -->
    <div class="blog-main-area">
        <div class="container-fluid container-default custom-area">
            <div class="row">
                <div class="col-12 col-custom widget-mt">
                    <!-- Blog Details wrapper Area Start -->
                    <div class="blog-post-details">
                        <section class="blog-post-wrapper product-summery">
                            <div class="section-content section-title">
                                <div class="row popup-gallery elements-grid">
                                    @foreach($gallery_images as $image)
                                        <div class="col-md-3 col-custom mb-4 column-win">
                                            <div class="single-image border">
                                                <a class="w-100" href="{{Voyager::image($image->image)}}">
                                                    <img class="w-100" src="{{Voyager::image($image->image)}}"
                                                         alt="{{$image->title}}">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- Blog Details Wrapper Area End -->
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
        <script>
            function masonry_grid() {
                $('.elements-grid').masonry({
                    // options
                    itemSelector: '.column-win',
                    horizontalOrder: true
                });
            }

            $(document).ready(function () {
                masonry_grid()
            });
        </script>
    @endpush
    <!-- Blog Main Area End Here -->
@endsection
