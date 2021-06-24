@extends('layouts.front.app')

@section('content')
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb" >
                <a href="{{ route('front.index') }}">Home</a>
                <span class="delimiter"><i class="fa fa-angle-right"></i>
                </span>My Account
            </nav><!-- .woocommerce-breadcrumb -->

            <div class="content-area">

                @include('front.partials._session')
                @include('front.partials._errors')

                <main id="main" class="site-main">
                    <article id="post-8" class="hentry">

                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="customer-login-form">
                                    <span class="or-text">or</span>

                                    <div class="col2-set" id="customer_login">

                                        <div class="col-1">


                                            <h2>Login</h2>

                                            <form method="POST" class="login">
                                                @csrf
                                                <p class="before-login-text">Welcome back! Sign in to your account</p>

                                                <p class="form-row form-row-wide">
                                                    <label for="username">Email address<span class="required">*</span></label>
                                                    <input type="email" class="input-text @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" autocomplete="email" autofocus/>
                                                    @error('email')
                                                        <span class="invalid-feedback text-sm text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </p>

                                                <p class="form-row form-row-wide">
                                                    <label for="password">Password<span class="required">*</span></label>
                                                    <input class="input-text @error('password') is-invalid @enderror" type="password" name="password" id="password"  autocomplete="current-password"/>
                                                    @error('password')
                                                        <span class="invalid-feedback text-sm text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </p>

                                                <p class="form-row">
                                                    <input class="button" type="submit" value="Login" name="login">
                                                    <label for="rememberme" class="inline">
                                                        <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember me
                                                    </label>
                                                </p>

                                                <p class="lost_password"><a href="{{ route('password.request') }}">Forgot your password?</a></p>

                                            </form>


                                        </div><!-- .col-1 -->

                                        <div class="col-2">

                                            <h2>Register</h2>

                                            <form method="POST" class="register" action="{{ route('register') }}">
                                                @csrf
                                                <p class="before-register-text">Create your very own account</p>

                                                <p class="form-row form-row-wide">
                                                    <label for="email">Email address<span class="required">*</span></label>
                                                    <input type="email" class="input-text @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" autocomplete="email"/>
                                                    @error('email')
                                                        <span class="invalid-feedback text-sm text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </p>

                                                <p class="form-row form-row-wide">
                                                    <label for="password">Password<span class="required">*</span></label>
                                                    <input class="input-text @error('password') is-invalid @enderror" type="password" name="password" id="password"  autocomplete="current-password"/>
                                                    @error('password')
                                                        <span class="invalid-feedback text-sm text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </p>

                                                <p class="form-row form-row-wide">
                                                    <label for="password-confirm">Password Confirmation<span class="required">*</span></label>
                                                    <input class="input-text @error('password') is-invalid @enderror" type="password" name="password_confirmation" id="password-confirm"  autocomplete="current-password"  autocomplete="new-password"/>
                                                    @error('password')
                                                        <span class="invalid-feedback text-sm text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </p>

                                                <p class="form-row"><input type="submit" class="button" name="register" value="Register" /></p>

{{--                                                <div class="register-benefits">--}}
{{--                                                    <h3>Sign up today and you will be able to :</h3>--}}
{{--                                                    <ul>--}}
{{--                                                        <li>Speed your way through checkout</li>--}}
{{--                                                        <li>Track your orders easily</li>--}}
{{--                                                        <li>Keep a record of all your purchases</li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}

                                            </form>

                                        </div><!-- .col-2 -->

                                    </div><!-- .col2-set -->

                                </div><!-- /.customer-login-form -->
                            </div><!-- .woocommerce -->
                        </div><!-- .entry-content -->

                    </article><!-- #post-## -->

                </main><!-- #main -->
            </div><!-- #primary -->

        </div><!-- .col-full -->
    </div><!-- #content -->
@endsection
