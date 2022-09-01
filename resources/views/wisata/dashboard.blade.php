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
    <div class="offers_area padding_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Destinasi Wisata</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers" style="margin-bottom: 50px;">
                        <div class="about_thumb">
                            <img src="{{ asset('montana-master/img/offers/1.png') }}" alt="">
                        </div>
                        <h3>Up to 35% savings on Club <br> 
                                rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="#" class="book_now">book now</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers" style="margin-bottom: 50px;">
                        <div class="about_thumb">
                            <img src="{{ asset('montana-master/img/offers/1.png') }}" alt="">
                        </div>
                        <h3>Up to 35% savings on Club <br> 
                                rooms and Suites</h3>
                        <ul>
                            <li>Luxaries condition</li>
                            <li>3 Adults & 2 Children size</li>
                            <li>Sea view side</li>
                        </ul>
                        <a href="#" class="book_now">book now</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- offers_area_end -->
@endsection