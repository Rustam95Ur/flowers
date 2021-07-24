<footer class="footer-area mt-text-3">
    <div class="footer-widget-area">
        <div class="container container-default custom-area">
            <div class="row text-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-custom">
                    <div class="single-footer-widget m-0">
                        <div class="footer-logo">
                            <a href="{{route('home')}}">
                                <img src="{{ Voyager::image(setting('site.logo'))}}" alt="logo">
                            </a>
                        </div>
                        <p class="desc-content">{{ Voyager::setting('site.description_'.$locale)}}</p>
                        <div class="social-links">
                            <ul class="d-flex">
                                <li>
                                    <a class="rounded-circle" href="#" title="Facebook">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rounded-circle" href="#" title="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rounded-circle" href="#" title="Linkedin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rounded-circle" href="#" title="Youtube">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="rounded-circle" href="#" title="Vimeo">
                                        <i class="fa fa-vimeo"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-custom">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">{{trans('header.information')}}</h2>
                        <ul class="widget-list">
                            @foreach($pages as $page )
                                <li>
                                    <a href="{{route('information_page', $page->slug)}}">
                                        {{$page->getTranslatedAttribute('title', $locale, 'fallbackLocale')}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-custom">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">{{trans('header.flowers')}}</h2>
                        <ul class="widget-list">
                            <li><a href="{{route('shop')}}">{{trans('header.category.all')}}</a></li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{route('shop')}}?categories[]={{$category->id}}">
                                        {{$category->getTranslatedAttribute('name', $locale, 'fallbackLocale')}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-custom">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">{{trans('header.contact')}}</h2>
                        <div class="widget-body">
                            <address>
                                {{ Voyager::setting('site.address_'.$locale)}}
                                <br>
                                {{trans('header.phone')}}: {{ Voyager::setting('site.phone')}}
                                <br>
                                Email: {{ Voyager::setting('site.email')}}
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright-area">
        <div class="container custom-area">
            <div class="row">
                <div class="col-12 text-center col-custom">
                    <div class="copyright-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
