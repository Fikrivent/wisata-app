@extends('layouts.montana')

@section('title-bar','Destinasi Wisata')
@section('judul','Destinasi Wisata di Sekitar Kota Kediri')

@section('content')
    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <h3>@yield('judul')</h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- offers_area_start -->
    <div class="offers_area" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h2>Destinasi Wisata</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($wisatas as $w)
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers" style="margin-bottom: 50px;">
                        <div class="about_thumb">
                            <img src="{{ asset('montana-master/img/offers/1.png') }}" alt="">
                        </div>
                        <center><h3>{{ $w->nama }}</h3></center>
                        <ul>
                            
                        </ul>
                        <a href="#" class="book_now">Pesan Tiket</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- offers_area_end -->
@endsection