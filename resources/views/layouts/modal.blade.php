<div class="modal flosun-modal fade" id="quick_product_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                <span class="close-icon" aria-hidden="true">x</span>
            </button>
            <div class="modal-body">
                <div class="container-fluid custom-area">
                    <div class="row" id="product_quick_block">
                        @if(isset($quick_product))
                            @include('products.quick_view')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal flosun-modal fade" id="select_city_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                <span class="close-icon" onclick="select_modal_close()" aria-hidden="true">x</span>
            </button>
            <div class="modal-header justify-content-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="modal-title text-center mb-3">{{trans('modal.select_city')}}</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group">
                                <input id="search_city" type="text" onkeyup="search_city()" class="form-control"
                                       placeholder="Поиск" aria-label="Поиск">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="container-fluid custom-area">
                    <div class="row" id="cities_link">
                        @foreach($cities as $city)
                            <div class="col-md-3 ">
                                <a href="{{route('select_city', $city->id)}}"
                                   class="city_link {{($city->is_big == 1) ? 'font-weight-bold' : ''}}">{{$city->title}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal flosun-modal fade" id="message_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                <span class="close-icon" aria-hidden="true">x</span>
            </button>
            <div class="modal-body">
                <div class="container-fluid custom-area">
                    <div class="row" id="product_quick_block">
                        @if ($message = session()->get('success'))
                            <h3 class="text-center text-success">{!! $message !!}</h3>
                        @endif
                        @if ($message = session()->get('error'))
                            <h3 class="text-center text-danger">{!! $message !!}</h3>
                        @endif
                        @if ($message = session()->get('warning'))
                            <h3 class="text-center text-danger">{!! $message !!}</h3>
                        @endif
                        @if ($message = session()->get('info'))
                            <h3 class="text-center text-danger">{!! $message !!}</h3>
                        @endif
                        @if ($errors->any())
                            @foreach($errors->all() as $error)
                                <ul class="questions text-center">
                                    <li class="text-danger"><h3>{!! $error !!}</h3></li>
                                </ul>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
