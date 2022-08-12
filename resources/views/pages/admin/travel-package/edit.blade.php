@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-0 text-gray-800">Edit Data Paket Travel {{ $item->title }}</h1>
        </div>


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
      

        {{-- tampilan Form --}}
            <div class="card-shadow">
                <div class="card-body">
                    <form action="{{route('travel-package.update', $item->id)}}" method="post">
                    @method('PUT')
                    @csrf

                    {{-- Judul --}}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="title" value="{{$item->title}}">
                    </div>

                    {{-- Lokasi --}}
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="location" value="{{$item->location}}">
                    </div>

                    {{-- Tentang --}}
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" id="" rows="10" class="d-block w-100 form-control">{{$item->about}}</textarea>
                    </div>


                     {{-- Featured Event --}}
                    <div class="form-group">
                        <label for="featured_event">Featured Event</label>
                        <input type="text" class="form-control" name="featured_event" placeholder="featured_event" value="{{$item->featured_event}}">
                    </div>

                     {{-- Bahasa --}}
                     <div class="form-group">
                        <label for="language">Language</label>
                        <input type="text" class="form-control" name="language" placeholder="language" value="{{$item->language}}">
                    </div>

                    
                     {{-- Makanan --}}
                     <div class="form-group">
                        <label for="foods">Foods</label>
                        <input type="text" class="form-control" name="foods" placeholder="foods" value="{{$item->foods}}">
                    </div>

                    {{-- Tanggal Keberangkatan --}}
                     <div class="form-group">
                        <label for="departure_date">Departure Date</label>
                        <input type="date" class="form-control" name="departure_date" placeholder="departure_date" value="{{$item->departure_date}}">
                    </div>

                    {{-- Durasi --}}
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" name="duration" placeholder="duration" value="{{$item->duration}}">
                    </div>

                    {{-- Tipe --}}
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" name="type" placeholder="type" value="{{$item->type}}">
                    </div>

                    {{--Harga--}}
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="price" value="{{$item->price}}">
                    </div>

                    {{-- Tombol Simpan --}}
                    <button type="submit" class="btn btn-primary btn-block">
                        Ubah
                    </button>
                    </form>
                </div>
            </div>
   </div>
<!-- /.container-fluid -->

@endsection
