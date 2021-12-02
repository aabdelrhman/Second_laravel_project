@extends('layouts.site.master')
@section('title')
    Register
@endsection
@section('main')
<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="#" class="link">home</a></li>
        <li class="item-link"><span>Register</span></li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
        <div class=" main-content-area">
            <div class="wrap-login-item ">
                <div class="register-form form-item ">
                    <form class="form-stl" name="frm-login" method="POST" action="{{ route('register') }}">
                        @csrf
                        <fieldset class="wrap-title">
                            <h3 class="form-title">Create an account</h3>
                            <h4 class="form-subtitle">Personal infomation</h4>
                        </fieldset>
                        <fieldset class="wrap-input">
                            <label for="frm-reg-lname">Name*</label>
                            <input type="text" id="frm-reg-lname" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Last name*">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                        <fieldset class="wrap-input">
                            <label for="frm-reg-email">Email Address*</label>
                            <input type="email" id="frm-reg-email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>

                        <fieldset class="wrap-title">
                            <h3 class="form-title">Login Information</h3>
                        </fieldset>
                        <fieldset class="wrap-input item-width-in-half left-item ">
                            <label for="frm-reg-pass">Password *</label>
                            <input type="password" id="frm-reg-pass" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>
                        <fieldset class="wrap-input item-width-in-half ">
                            <label for="frm-reg-cfpass">Confirm Password *</label>
                            <input type="password" id="frm-reg-cfpass" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </fieldset>
                        <input type="submit" class="btn btn-sign" value="Register" name="register">
                    </form>
                </div>
            </div>
        </div><!--end main products area-->
    </div>
</div><!--end row-->
@endsection
