@extends('layouts.app')
@section('title', trans('auth.login-page'))
@section('page_title', trans('auth.login-page'))
@section('link_title', trans('auth.login-page'))
@section('content')
<div class="container comment-box mt-5 mb-5">
    <div class="row justify-content-center login-page">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{trans('auth.form.email')}}</label>
                            <div class="col-md-6">
                                <div class="input-item mb-4">
                                    <input class="rounded-0 w-100 input-area gray-bg @error('email') is-invalid @enderror"
                                           name="email"  id="email" type="email" value="{{ old('email') }}"
                                           required autocomplete="email" autofocus
                                           placeholder="{{trans('auth.form.email')}}">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{trans('auth.form.password')}}</label>

                            <div class="col-md-6">
                                <div class="input-item mb-4">
                                    <input class="rounded-0 w-100 input-area gray-bg @error('password') is-invalid @enderror"
                                           name="password"  id="password" type="password" value="{{ old('email') }}"
                                           required autocomplete="current-password"
                                           placeholder="{{trans('auth.form.password')}}">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{trans('auth.remember-me')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn w-100 flosun-button secondary-btn theme-color rounded-0">
                                    {{trans('button.login')}}
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-4 mt-2">
                                <a href="{{ route('register') }}" class="btn w-100 flosun-button secondary-btn theme-color rounded-0">
                                    {{trans('auth.register-page')}}
                                </a>
                            </div>
                            <div class="col-md-12 mt-2 text-center">
{{--                            @if (Route::has('password.request'))--}}
{{--                                <a class="" href="{{ route('password.request') }}">--}}
{{--                                    {{trans('auth.forgot-password')}}--}}
{{--                                </a>--}}
{{--                            @endif--}}
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
