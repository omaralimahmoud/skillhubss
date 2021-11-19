@extends('web.layout')
@section('title')
   Sign In
@endsection
@section('main')
<!-- Hero-area -->
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/page-background.jpg') }})"></div>
    <!-- /Backgound Image -->
    @include('web.inc.message')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="{{ url('/') }}">{{ __('web.home') }}</a></li>
                    <li>{{ __('web.Sign In') }}</li>
                </ul>
                <h1 class="white-text">{{ __('web.Sign In to start exam') }}</h1>

            </div>
        </div>
    </div>

</div>
<!-- /Hero-area -->

<!-- Contact -->
<div id="contact" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- login form -->
            <div class="col-md-6 col-md-offset-3">
                <div class="contact-form">
                    <h4>{{ __('web.Sign In') }}</h4>
                    @include('web.inc.message')
                    <form  action="{{ url('login') }}" method="POST">
                        @csrf
                        <input class="input" type="email" name="email" placeholder="{{ __('web.email') }}">
                        <input class="input" type="password" name="password" placeholder="{{ __('web.Password') }}">

                        <input type="checkbox" name="remember" id=""> remember me
                        <br>

                        <button type="submit" class="main-button icon-button pull-right">{{ __('web.Sign In') }}</button>
                    </form>
                    <a href="{{ url('forgot-password') }}">{{ __('web.forget-password') }}</a>
                </div>
            </div>
            <!-- /login form -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact -->
@endsection
