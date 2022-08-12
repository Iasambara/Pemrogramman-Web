@extends('layouts.success')
@section('title', 'Checkout Succes')
@include('includes.style')
    

@section('content')
    <div class="bg-succes">
    <main class="main-bg">
    <div class="section-success d-flex align-items-center">
        <div class="col text-center text-succes">
            <img src="{{url('frontend/images/Succesbg.png')}}" alt="Success"> &nbsp; &nbsp;
            <h1>Pembayaran Berhasil!</h1>
            <p>Tiket akan segera di Kirimkan melalui Email yang terdaftar <br> Enjoy your quality time!</p>
            <a href="{{ url('/') }}" class="btn btn-home-page mt-3 px-3">
            Home Page
        </a>
        </div>
    </div>
    </main>
    </div>
@endsection
