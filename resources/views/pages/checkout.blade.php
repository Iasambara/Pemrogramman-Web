@extends('layouts.checkout')
@section('title', 'checkout')
    

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
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Details
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                                        
                        {{-- Mengecek apakah terjadi error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
  
                        <h1>Who Is Going?</h1>
                        <p>
                            Trip to {{$item->travel_package->title}}
                        </p>
                        <div class="attendee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td>Picture</td>
                                        <td>Name</td>
                                        <td>Nationality</td>
                                        <td>Visa</td>
                                        <td>Passport</td>
                                    </tr>
                                </thead>
                                <tbody>
                                   @forelse ($item-detail as $detail)
                                   <tr>
                                    <td><img src="{{url('frontend/images/Testimonial Ismail.png')}}" alt="avatar-1" height="60px"></td>
                                    <td class="align-middle">Ismail Ashari S</td>
                                    <td class="align-middle">Indonesia</td>
                                    <td class="align-middle">Lifetime</td>
                                    <td class="align-middle">Active</td>
                                    <td class="align-middle">
                                        <a href="#"><img src="{{url('frontend/images/ic_remove.png')}}"></a>
                                    </td>
                                </tr>
                                   @empty
                                       <tr>
                                        <td colspan='6' class="text-center">
                                            No Visitor
                                        </td>
                                       </tr>
                                   @endforelse
                                    {{-- <tr>
                                        <td><img src="images/Testi Yulia.png" alt="avatar-1" height="60px"></td>
                                        <td class="align-middle">Yulia Elmi Mufida</td>
                                        <td class="align-middle">Indonesia</td>
                                        <td class="align-middle">Lifetime</td>
                                        <td class="align-middle">Active</td>
                                        <td class="align-middle">
                                            <a href="#"><img src="images/ic_remove.png"></a>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                            <div class="member mt-3">
                                <h2>Add Member</h2>

                                <form class="form-inline">
                                    <label for="inputUsername" class="sr-only">Name</label>
                                    <input type="text" name="inputUsername" class="form-control mb-2 mr-sm-2" id="inputUsername" placeholder="Username" />
                                    <label for="inputVisa" class="sr-only">Visa</label>
                                    <select name="inputVisa" id="inputVisa" class="custom-select mb-2 mr-sm-2">
                                        <option value="VISA" selected>VISA</option>
                                        <option value="30 Days">30 Days</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                    <label for="doePasspord" class="sr-only">DOE Passport</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" class="form-control datepicker" id="doePassport" placeholder="DOE Passport">
                                    </div>
                                    <button type="submit" class="btn btn-add-now mb-2 px-4">
                                        Add Now
                                    </button>
                                </form>
                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates, doloribus!
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Checkout Information</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%">Members</th>
                                <td width="50%" class="text-right">2 person</td>
                            </tr>
                            <tr>
                                <th width="50%">Additional Visa</th>
                                <td width="50%" class="text-right">$ 190,00</td>
                            </tr>
                            <tr>
                                <th width="50%">Trip Price</th>
                                <td width="50%" class="text-right">$ 80,00 / person</td>
                            </tr>
                            <tr>
                                <th width="50%">Sub Total</th>
                                <td width="50%" class="text-right">$ 280,00</td>
                            </tr>
                            <tr>
                                <th width="50%">Total (+Unique)</th>
                                <td width="50%" class="text-right text-total">
                                    <span class="text-blue">$ 279,</span><span class="text-orange">33</span>
                                </td>
                            </tr>
                        </table>

                        <hr />
                        <h2>Payment Instructions</h2>
                        <p class="payment-instructions">
                            Please complete your payment before to continue the wonderful trip
                        </p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{url('frontend/images/ic_bank.png')}}" alt="" class="bank-image" />
                                <div class="description">
                                    <h3>PT Nomads ID</h3>
                                    <p>
                                        0881 8829 8800
                                        <br /> Bank Central Asia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item">
                                <img src="{{url('frontend/images/ic_bank.png')}}" alt="" class="bank-image" />
                                <div class="description">
                                    <h3>PT Nomads ID</h3>
                                    <p>
                                        0899 8501 7888
                                        <br /> Bank HSBC
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a href="{{route('checkout-success')}}" class="btn btn-block btn-join-now mt-3 py-2">I Have Made Payment</a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{route('detail')}}" class="text-muted">Cancel Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
