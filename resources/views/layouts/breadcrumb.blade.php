<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">@yield('page_title', trans('header.home'))</h3>
                    <ul>
                        <li><a href="{{route('home')}}">{{trans('header.home')}}</a></li>
                        <li>@yield('link_title', trans('header.home'))</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

