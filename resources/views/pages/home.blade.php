@extends('layouts.app')

@section('content')
<header class="text-left">
    <div class="header-kekanan">
        <h1>
            What's on <br> My bucket list? <br> Everywhere.
        </h1>
        <p class="mt-3">
            Bucket List mu tidak akan terpenuhi jika kamu tidak pernah meluangkan waktu, <br> Aku harap kamu lebih mengapresiasi diri sendiri, <br>Terhadap hal-hal yang telah membuatmu bertahan sejauh ini, <br>Untuk apapun itu terima kasih, kamu kuat.
        </p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4">
        Get Started
    </a>
    </div>
</header>


<!-- //Main// -->
<main>
    <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail-1">
                <h2>20K</h2>
                <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>12</h2>
                <p>Countries</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>3K</h2>
                <p>Hotels</p>
            </div>
            <div class="col-3 col-md-2 stats-detail-4">
                <h2>72</h2>
                <p>Partners</p>
            </div>
        </section>
    </div>

    <section class="section-popular" id="popular">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Wisata Popular</h2>
                    <p>
                        Something that you never try
                        <br /> before in this world
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-popular-content" id="popularContent">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                    @foreach ($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column" 
                            style="background-image: url('{{ $item->galleries->count() ? Storage::url
                                ($item->galleries->first()->image) : ''}}');">
                                <div class="travel-country">{{$item->location}}</div>
                                <div class="travel-location">{{ $item->title}}</div>
                                <div class="travel-button mt-auto">
                                    <a href="{{route('detail', $item->slug)}}" class="btn btn-travel-details px-4">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>

    <section class="section-networks" id="networks">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Our Networks</h2>
                    <p>
                        Companies are trusted us
                        <br /> more than just a trip
                    </p>
                </div>
                <div class="col-md-8 text-center">
                    <img src="{{url('frontend/images/partner.png')}}" class="img-patner" />
                </div>
            </div>
        </div>
    </section>
    <section class="section-testimonials-heading" id="testimonialsHeading">
        <div class="container">
            <div class="row">

                <div class="col text-center">
                    <h2>They Are Loving Us</h2>
                    <p>
                        Moments were giving them
                        <br /> the best experience
                    </p>
                </div>
            </div>
        </div>
    </section>



    <section class="section-testimonials-content" id="testimonialsContent">
        <div class="container">
            <div class="section-popular-travel row justify-content-center match-height">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="{{url('frontend/images/Testimonial Violet.png')}}" alt="" width="125px" class="mb-4 rounded-circle" />
                            <h3 class="mb-4">Violet</h3>
                            <p class="testimonials">
                                “The great thing about this life of ours is that you can be someone different to everybody.” </p>
                        </div>
                        <hr />
                        <p class="trip-to mt-2">Trip to All the Bright Places</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="{{url('frontend/images/Testimonial Mccandles.png')}}" width="125px" alt="" class="mb-4 rounded-circle" />
                            <h3 class="mb-4">McCandles</h3>
                            <p class="testimonials">
                                "All true meaning resides in the personal relationship to a phenomenon, what it means to you." </p>
                        </div>
                        <hr />
                        <p class="trip-to mt-2">Trip to Magic Bus</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content mb-auto">
                            <img src="{{url('frontend/images/Testimonial Ismail.png')}}" width="125px" alt="" class="mb-4 rounded-circle" />
                            <h3 class="mb-4">Ismail Ashari Sambara</h3>
                            <p class="testimonials">
                                “Aku tetap disini, datanglah kapanpun kau mau. Semoga kita lekas bertemu di waktu yang tepat.“
                            </p>
                        </div>
                        <hr />
                        <p class="trip-to mt-2">Trip to Mount Arjuno</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                        I Need Help
                    </a>
                    <a href="{{ route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection