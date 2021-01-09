@extends('layouts.welcomeHome')
@section('content')

<div class="container">
    <div class="card payment-failed">

        <h1>Payment Failed</h1>
        <a href="{{ route('home') }}">click here to continue</a>
    </div>
</div>

@endsection
