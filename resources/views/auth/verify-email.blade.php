@extends('web.layout')
@section('title')
verify Email
@endsection
@section('main')
<div class="alret alert-info">
A verification Eamil sent  successfully, please check your inbox.
</div>
<br>
<br>
<div id="contact" class="section">
<div class="container">


<div class="row">
<div class="col-md-6 col-md-offset-3">
    <div class="contact-form">
<form action="{{ url('email/verification-notification') }}" method="POST">
    @csrf
    <button type="submit" class="main-button icon-button pull-right " >Resend  Email</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

