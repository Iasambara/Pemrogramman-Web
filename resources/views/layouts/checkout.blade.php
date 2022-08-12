<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
   </head>

<body>
        {{-- yield --}}
            @include('includes.navbar-alternate')
            @yield('content')
            @include('includes.footer')

            @stack('prepend-script')
            @include('includes.script')
            @stack('addon-script')
</body>
</html>


@ePtends('layouts.app')

@section('title', 'Detail - Travel')
    
@section('content')
    
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                <h1>Paket Travel</h1>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>Kawah Ijen</h1>
                        <p>
                            Republic of Indonesia Raya
                        </p>
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img class="xzoom" id="xzoom-default" src="{{url('frontend/images/Kawah_ijen.jpg')}}" xoriginal="{{url('frontend/images/Kawah_ijen.jpg')}}" />
                                <div class="xzoom-thumbs">
                                    <a href="{{url('frontend/images/Kawah1 (1).jpg')}}"><img class="xzoom-gallery" width="128" src="{{url('frontend/images/Kawah1 (1).jpg')}}" xpreview="{{url('frontend/images/Kawah1 (1).jpg')}}" /></a>
                                    <a href="{{url('frontend/images/Kawah1 (2).jpg')}}"><img class=" xzoom-gallery " width="128" src="{{url('frontend/images/Kawah1 (2).jpg')}}" xpreview="{{url('frontend/images/Kawah1 (2).jpg')}}" /></a>
                                    <a href="{{url('frontend/images/Kawah1 (3).jpg')}}"><img class="xzoom-gallery" width="128" src="{{url('frontend/images/Kawah1 (3).jpg')}}" xpreview="{{url('frontend/images/Kawah1 (3).jpg')}}" /></a>
                                    <a href="{{url('frontend/images/Kawah1 (4).jpg')}}"><img class=" xzoom-gallery " width="128" src="{{url('frontend/images/Kawah1 (4).jpg')}}"xpreview="{{url('frontend/images/Kawah1 (4).jpg')}}"" /></a>
                                    <a href="{{url('frontend/images/details-1.jpg')}}"><img class="xzoom-gallery " width="128" src="{{url('frontend/images/details-1.jpg')}}" xpreview="{{url('frontend/images/details-1.jpg')}}" /></a>
                                </div>
                            </div>
                            <h2>Tentang Wisata</h2>
                            &nbsp;
                            <p>
                                Kawah Ijen tidak pernah sepi pengunjung karena memiliki keindahan berupa kawah dengan api berwarna biru. Gunung yang memiliki ketinggian hingga 2443 meter dari atas permukaan air laut ini terletak antara dua kabupaten, yaitu antara Banyuwangi dan Bondowoso.
                                Pada bagian barat kawah ada bendungan yang tercipta pada waktu zaman Belanda. Tujuannya untuk menghindari jika terjadi luapan kawah Ijen.

                            </p>
                            &nbsp;
                            <p>
                                Pendakian ke puncak Kawah Ijen, membutuhkan waktu hingga 3 sampai 4 jam untuk bisa sampai di atas puncak. Sebelum memutuskan untuk berlibur ke sana, kita simak dahulu informasi seputar Gunung Ijen beserta cara berkunjung. </p>
                            &nbsp;
                            <div class="features row ">
                                <div class="col-md-4 ">
                                    <img src="{{url('frontend/images/ic_event.png')}}" alt=" " class="features-image" />
                                    <div class="description ">
                                        <h3>Featured Ticket</h3>
                                        <p>Taman Nasional
                                            <br>Baluran</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left ">
                                    <img src="{{url('frontend/images/ic_bahasa.png')}}" alt=" " class="features-image " />
                                    <div class="description ">
                                        <h3>Language</h3>
                                        <p>Bahasa Indonesia</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left ">
                                    <img src="{{url('frontend/images/ic_food.png')}}" alt=" " class="features-image " />
                                    <div class="description ">
                                        <h3>Foods</h3>
                                        <p>Local Foods</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="card card-details card-right ">
                        <h2>Members are going</h2>
                        <div class="members my-2 ">
                            <img src="{{url('frontend/images/members.png')}}" alt=" " class="member-images " />
                        </div>
                        <hr />
                        <h2>Trip Informations</h2>
                        <table class="trip-informations ">
                            <tr>
                                <th width="50% ">Date of Departure</th>
                                <td width="50% " class="text-right ">22 Aug, 2019</td>
                            </tr>
                            <tr>
                                <th width="50% ">Duration</th>
                                <td width="50% " class="text-right ">4D 3N</td>
                            </tr>
                            <tr>
                                <th width="50% ">Type</th>
                                <td width="50% " class="text-right ">Open Trip</td>
                            </tr>
                            <tr>
                                <th width="50% ">Price</th>
                                <td width="50% " class="text-right ">$80,00 / person</td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container ">
                        <a href="checkout.html " class="btn btn-block btn-join-now mt-3 py-2 ">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="background-belakang">
    </div>
</main>

@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/Libraries/gigjo/combined/css/gijgo.min.css')}}">
@endpush


@push('addon-script')
    <script src="{{ url('frontend/Libraries/gigjo/combined/js/gigjo.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                uiLibrary: 'bootstrap4',
                icons: {
                rightIcon: '<img src="{{url('images/Calendar-gigjo.png') }}"/>'
                }
            })
        });
    </script>
@endpush 