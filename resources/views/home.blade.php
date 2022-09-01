@extends('layouts.montana')

@section('title-bar','Home Page')


@section('content')
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>Ayo Eksplor Kediri, Dulur !</h3>
                                <br>
                                <p>Selamat Datang di Portal Wisata Kota Kediri</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center justify-content-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>Apa kata mereka tentang Kediri ?</h3>
                                <br>
                                <p>"Sebuah kota dengan keunikan tersendiri yang menyajikan beragam nuansa<br> untuk menghibur dan menghilangkan sejenak lelah dan penat yang bertumpuk di punggung kita"</p>
                                <p><i>-Arman Nur Cahyono(Data Support Operator PT Sampoerna Tbk.)</i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    
    <!-- Order Ticket -->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="booking-form">
                    <div class="form-header">
                        <h2>Pesan Tiket Kunjungan Wisata</h2>
                    </div>
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="form-label">Destinasi Wisata</span>
                                    {{-- Bagian ini nanti ditambahi library pencarian selectbox --}}
                                    <select class="form-control">
                                        <option>Simpang Lima</option>
                                        <option>Simpang Lima</option>
                                        <option>Simpang Lima</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="form-label">Rencana Jadwal Kunjungan</span>
                                    {{-- Bagian ini nanti ditambahi library pencarian selectbox --}}
                                    <select class="form-control">
                                        <option>Senin, 19 Agustus 2022 (Jam 07.00 - 12.00)</option>
                                        <option>Senin, 19 Agustus 2022 (Jam 12.00 - 17.00)</option>
                                        <option>Senin, 19 Agustus 2022 (Jam 17.00 - 21.00)</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="form-label">Jumlah Tiket(Dewasa)</span>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="form-label">Jumlah Tiket(Anak)</span>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-btn">
                                    <button class="submit-btn glow-button">Cek Ketersediaan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </section>
    <!-- Order Ticket End -->

    {{-- <!-- video_area_start -->
    <div class="video_area video_bg overlay">
        <div class="video_area_inner text-center">
            <span>Montana Sea View</span>
            <h3>Relax and Enjoy your <br>
                Vacation </h3>
            <a href="https://www.youtube.com/watch?v=vLnPwxZdW4Y" class="video_btn popup-video">
                <i class="fa fa-play"></i>
            </a>
        </div>
    </div>
    <!-- video_area_end --> --}}

    
    {{-- Slider Carousel --}}
    <section class="blog_area">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <center><h2>DESTINASI WISATA FAVORIT</h2></center>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>   
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="single_offers" style="margin-bottom: 50px;">
                                    <div class="about_thumb" style="margin-bottom: 10px;">
                                        <img class="carousel img-box" src="{{ asset('montana-master/img/offers/1.png') }}" alt="">
                                    </div>
                                    <h3><b>Simpang Lima Kediri</b></h3>
                                    <h4>Harga Tiket : Rp. 5000</h4>
                                    <p>Jadwal Buka : 07.00 - 21.00 WIB</p>
                                    <br>
                                    <a href="#" class="book_now">Pesan Tiket</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="single_offers" style="margin-bottom: 50px;">
                                    <div class="about_thumb" style="margin-bottom: 10px;">
                                        <img class="carousel img-box" src="{{ asset('montana-master/img/offers/1.png') }}" alt="">
                                    </div>
                                    <h3><b>Simpang Lima Kediri</b></h3>
                                    <h4>Harga Tiket : Rp. 15000</h4>
                                    <p>Jadwal Buka : 07.00 - 21.00 WIB</p>
                                    <br>
                                    <a href="#" class="book_now">Pesan Tiket</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="single_offers" style="margin-bottom: 50px;">
                                    <div class="about_thumb" style="margin-bottom: 10px;">
                                        <img class="carousel img-box" src="{{ asset('montana-master/img/offers/1.png') }}" alt="">
                                    </div>
                                    <h3><b>Simpang Lima Kediri</b></h3>
                                    <h4>Harga Tiket : Rp. 10000</h4>
                                    <p>Jadwal Buka : 07.00 - 21.00 WIB</p>
                                    <br>
                                    <a href="#" class="book_now">Pesan Tiket</a>
                                </div>
                            </div>
                            

                            {{-- <div class="carousel-item active">
                                <div class="img-box"><img src="{{ asset('montana-master/img/full-senyum.jpg') }}" alt=""></div>
                                <p class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                                <p class="overview"><b>Paula Wilson</b>, Media Analyst</p>
                            </div>
                            <div class="carousel-item">
                                <div class="img-box"><img src="{{ asset('montana-master/img/full-senyum.jpg') }}" alt=""></div>
                                <p class="testimonial">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget nisi a mi suscipit tincidunt. Utmtc tempus dictum risus. Pellentesque viverra sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh, facilisis gravida odio.</p>
                                <p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
                            </div>
                            <div class="carousel-item">
                                <div class="img-box"><img src="{{ asset('montana-master/img/full-senyum.jpg') }}" alt=""></div>
                                <p class="testimonial">Phasellus vitae suscipit justo. Mauris pharetra feugiat ante id lacinia. Etiam faucibus mauris id tempor egestas. Duis luctus turpis at accumsan tincidunt. Phasellus risus risus, volutpat vel tellus ac, tincidunt fringilla massa. Etiam hendrerit dolor eget rutrum.</p>
                                <p class="overview"><b>Michael Holz</b>, Seo Analyst</p>
                            </div> --}}
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Slider Carousel --}}

    <!-- forQuery_start -->
    <div class="forQuery">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-md-12">
                    <div class="Query_border">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="Query_text">
                                    <p>Perlu Memesan Tiket Masif ?</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="phone_num">
                                    <a href="#" class="mobile_no"><i class="fa fa-phone"> 0812-345-678-90</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- forQuery_end-->


     <!-- instragram_area_start -->
     <div class="instragram_area">
        <div class="single_instagram">
            <img src="{{ asset('montana-master/img/instragram/1.png') }}" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="single_instagram">
            <img src="{{ asset('montana-master/img/instragram/2.png') }}" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="single_instagram">
            <img src="{{ asset('montana-master/img/instragram/3.png') }}" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="single_instagram">
            <img src="{{ asset('montana-master/img/instragram/4.png') }}" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="single_instagram">
            <img src="{{ asset('montana-master/img/instragram/5.png') }}" alt="">
            <div class="ovrelay">
                <a href="#">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- instragram_area_end -->
@endsection
