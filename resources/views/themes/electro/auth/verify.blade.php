@extends('themes.electro.layouts.app')

@section('content')
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb">
                <a href="{{ route('front.index') }}">Home</a>
                <span class="delimiter"><i class="fa fa-angle-right"></i></span>Verify Email
            </nav>

            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article class="page type-page status-publish hentry">

                        <header class="entry-header">
                            <h5 itemprop="name" class="entry-title">
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},
                            </h5>
                            <br>
                            {{-- <div class="hero-action-btn fadeInDown-4"> --}}
                            {{-- <a href="{{ route('front.shop') }}" class="big le-button text-gray-dark text-lg font-weight-bold">Start Shopping</a> --}}
                            <form method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                    class="le-button text-gray-dark text-lg font-weight-bold">{{ __('click here to request another') }}</button>.
                            </form>
                            {{-- </div> --}}
                        </header><!-- .entry-header -->


                    </article>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection
