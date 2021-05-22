@extends('layouts.welcomeHome')
@section('content')


<div class="container paymentSuccessInfo">
    <div class="alert alert-success paymentSuccessInfo__alert" role="alert">
            Thank you for booking with Zubis Inn, our team will contact you very soon.
            Please check your mail for booking details
      </div>
      <div class="paymentSuccessInfo__continue">
      <a class="btn btn-success" href="{{ route('home') }}">Continue to home</a>
    </div>
</div>




@endsection
@push('scripts')
<script src="{{ asset('/zubis/js/jquery.nice-select.min.js') }}"></script>
@endpush
