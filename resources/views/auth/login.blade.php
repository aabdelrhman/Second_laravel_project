@extends('layouts.site.master')
@section('title')
    Login
@endsection
@section('main')
<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="#" class="link">home</a></li>
        <li class="item-link"><span>login</span></li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
        <div class=" main-content-area">
            <div class="wrap-login-item ">
                <div class="login-form form-item form-stl">
                    <form name="frm-login" method="POST" action="{{ Route('login') }}">
                        @csrf
                        <fieldset class="wrap-title">
                            <h3 class="form-title">Log in to your account</h3>
                        </fieldset>
                        <fieldset class="wrap-input">
                            <label for="frm-login-uname">Email Address:</label>
                            <input type="text" id="frm-login-uname" name="email" placeholder="Type your email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                        <fieldset class="wrap-input">
                            <label for="frm-login-pass">Password:</label>
                            <input type="password" id="frm-login-pass" name="password" placeholder="************" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>

                        <fieldset class="wrap-input">
                            <label class="remember-field">
                                <input class="frm-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span>Remember me</span>
                            </label>
                            <a class="link-function left-position" href="#" title="Forgotten password?">Forgotten password?</a>
                        </fieldset>
                        <input type="submit" class="btn btn-submit" value="Login" name="submit">
                    </form>
                </div>
            </div>
        </div><!--end main products area-->
    </div>
</div><!--end row-->
@endsection
