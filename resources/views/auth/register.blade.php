@extends('layouts.app')
@section('title', trans('auth.register-page'))
@section('page_title', trans('auth.register-page'))
@section('link_title', trans('auth.register-page'))
@section('content')
    <div class="container comment-box mt-5 mb-5">
        <div class="row justify-content-center login-page">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" class="entrance__form">
                            @csrf
                            <div class="form-group row">
                                <label for="first-name"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('auth.form.first_name') }}</label>

                                <div class="col-md-6">
                                    <div class="input-item mb-4">
                                        <input id="first-name" type="text" name="first_name"
                                               class="rounded-0 w-100 input-area gray-bg @error('first_name') is-invalid @enderror"
                                               value="{{ old('first_name') }}" required autocomplete="name" autofocus>
                                    </div>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last-name"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('auth.form.last_name') }}</label>

                                <div class="col-md-6">
                                    <div class="input-item mb-4">
                                        <input id="last-name" type="text" name="last_name"
                                               class="rounded-0 w-100 input-area gray-bg @error('last_name') is-invalid @enderror"
                                               value="{{ old('last_name') }}" required autocomplete="name" autofocus>
                                    </div>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('auth.form.phone') }}</label>
                                <div class="col-md-6">
                                    <div class="input-item mb-4">
                                        <input type="text" minlength="17" name="phone"
                                               onfocus="this.value = this.value;"
                                               required id="phone"
                                               value="{{ old('phone') }}"
                                               class=" rounded-0 w-100 input-area gray-bg @error('phone') is-invalid @enderror txtLogin"
                                        >
                                    </div>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('auth.form.email') }}</label>

                                <div class="col-md-6">
                                    <div class="input-item mb-4">
                                        <input id="email" type="email"
                                               class="rounded-0 w-100 input-area gray-bg @error('email') is-invalid @enderror"
                                               name="email"
                                               value="{{ old('email') }}" required autocomplete="email">
                                    </div>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('auth.form.password') }}</label>

                                <div class="col-md-6">
                                    <div class="input-item mb-4">
                                        <input id="password" type="password"
                                               class="rounded-0 w-100 input-area gray-bg @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="new-password">
                                    </div>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('auth.form.confirm_password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password"
                                           class="rounded-0 w-100 input-area gray-bg"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"
                                            class="btn w-100 flosun-button secondary-btn theme-color rounded-0">
                                        {{ trans('button.register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/phone-mask/global.js') }}"></script>
        <script src="{{ asset('js/phone-mask/entrance.js') }}"></script>
    @endpush
@endsection
