@extends('layouts.welcomeHome')
@section('content')


<div class="container paymentSuccessInfo">
    <div class="alert alert-success paymentSuccessInfo__alert" role="alert">
        Payment successfull.
      </div>
      <div class="paymentSuccessInfo__continue">
      <a class="btn btn-success" href="{{ route('home') }}">Continue</a>
    </div>
</div>





@endsection