@extends('web.layout')
@section('title')
   Forget password
@endsection
@section('main')


<!-- Contact -->
<div id="contact" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- login form -->
            <div class="col-md-6 col-md-offset-3">
                <div class="contact-form">
                    <h4>{{ __('web.forget-password') }}</h4>
                    @include('web.inc.message')
                    <form  action="{{ url('forgot-password') }}" method="POST">
                        @csrf
                        <input class="input" type="email" name="email" placeholder="{{ __('web.email') }}">

                        <button type="submit" class="main-button icon-button pull-right">{{ __('web.submit') }}</button>
                    </form>
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
