@extends('layouts.montana')

@section('title-bar','Home Page')

@section('js')
    <script>

        $('.opsiWisata').on('change', function() {
            var idWisata = $(this).find(":selected").val();
            getJadwalWisata(idWisata);
        });

        $('.tanggal_pesan').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
            rightIcon: '<span class="fa fa-calendar"></span>'
            },
            format: 'yyyy-mm-dd'
        });

        $('.cek-tiket').on('click', function() {

            var namaWisata = $('.opsiWisata').find(':selected').val();
            var jamWisata = $('.opsiJamWisata').find(':selected').val();
            var tiket_dewasa = $('.tiket_dewasa').val();
            var tiket_anak = $('.tiket_anak').val();
            var tanggal_pesan = $('.tanggal_pesan').val();
            var total_tiket = parseInt(tiket_dewasa)+parseInt(tiket_anak);

            // console.log(namaWisata,jamWisata,tiket_anak,tiket_dewasa, tanggal_pesan);

            $.ajax({
                url: "/ajaxLoadCekTiket",
                type:"POST",
                data:{
                    nama_wisata:namaWisata,
                    jam_wisata:jamWisata,
                    tiket_dewasa:tiket_dewasa,
                    tiket_anak:tiket_anak,
                    tanggal_pesan: tanggal_pesan,
                    "_token": "{{ csrf_token() }}"
                },
                success:function(data){

                    var jumlahPemesan = data['total_pemesan'];
                    var kuota = data['kuota'];
                    var kuota_tersisa = parseInt(kuota[0].kuota);

                    console.log(kuota_tersisa, total_tiket);
                    
                    if(jumlahPemesan.length > 0)
                    {
                        kuota_tersisa = (parseInt(kuota[0].kuota) - parseInt(jumlahPemesan[0].total_pemesan));
                    }

                    if(total_tiket <= kuota_tersisa)
                    {
                        alertTersedia();
                    }
                    else{
                        alertTidakTersedia();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        function alertTersedia()
        {
            const swalButtons = Swal.mixin({
            
            });

            swalButtons.fire({
                title: 'Tiket Tersedia',
                icon: 'success',
                showCancelButton: true,
                confirmButtonText: 'Ya, Lanjutkan Pemesanan',
                cancelButtonText: 'Batalkan',
                confirmButtonColor: '#32a852',
                cancelButtonColor: '#d60f0f',
                reverseButtons: false
            }).then((result) => {
            if (result.isConfirmed) {
                swalButtons.fire(
                'Pemesanan Tiket Berhasil !',
                'Pemesanan Tiket Anda Telah Tersimpan.',
                'success'
                )
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalButtons.fire(
                'Dibatalkan',
                'Pemesanan Tiket Anda Dibatalkan',
                'error'
                )
            }
            });
        }

        function alertTidakTersedia()
        {
            const swalButtons = Swal.mixin({
            
            });

            swalButtons.fire({
                title: 'Tiket Tidak Tersedia',
                text: "Mohon maaf, tiket sudah habis",
                icon: 'error',
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#d60f0f',
            }).then((result) => {
                
            });
        }

        function getJadwalWisata(idWisata) 
        {
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: 'ajaxLoadJadwalWisata/'+idWisata,
                dataType: 'json',
                success: function (data) 
                {
                    // console.log(data);
                    $('.opsiJamWisata').removeAttr('disabled');
                    $('.opsiJamWisata').empty();

                    $.each(data['data'], function(index, item) {
                        // console.log(item);
                        
                        $('.opsiJamWisata').append(
                            '<option value="'+item.idjadwal+'"">'+item.hari+', Jam '+ item.jam_awal+' - '+item.jam_akhir+'</option>'
                        );
                    });
                },
                error:function()
                { 
                    console.log(data);
                }
            });
        }
    </script>
@endsection

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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="form-label">Destinasi Wisata</span>
                                    {{-- Bagian ini nanti ditambahi library pencarian selectbox --}}
                                    <select class="form-control opsiWisata" style="cursor: pointer;" name="nama_wisata">
                                        <option>Silahkan Tentukan Destinasi Wisata Anda ...</option>
                                        @foreach ($wisatas as $w)
                                        <option value="{{ $w->idwisata }}" style="font-weight: bold;">{{ $w->nama }}</option>
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="form-label">Tanggal Kunjungan</span>
                                    <input type="text" style="cursor: pointer;" class="form-control tanggal_pesan" name="tanggal_pesan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="form-label">Rencana Jam Kunjungan</span>
                                    {{-- Bagian ini nanti ditambahi library pencarian selectbox --}}
                                    <select class="form-control opsiJamWisata" style="cursor: pointer;" name="jadwalWisata" disabled>
                                        <option>Silahkan Tentukan Destinasi Wisata Terlebih Dahulu ...</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="form-label">Jumlah Tiket(Dewasa)</span>
                                    <input type="number" class="form-control tiket_dewasa" name="tiket_dewasa">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="form-label">Jumlah Tiket(Anak)</span>
                                    <input type="number" class="form-control tiket_anak" name="tiket_anak">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-btn">
                                    <button class="submit-btn glow-button cek-tiket">Cek Ketersediaan</button>
                                </div>
                            </div>
                        </div>
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
                            @foreach ($wst_favorit as $key => $wf)
                                @if($key == 0)
                                <div class="carousel-item active">
                                    <div class="single_offers" style="margin-bottom: 50px;">
                                        <div class="about_thumb" style="margin-bottom: 10px;">
                                            <img class="carousel img-box" src="{{ asset('montana-master/img/offers/1.png') }}" alt="">
                                        </div>
                                        <h3><b>{{ $wf->nama }}</b></h3>
                                        <h4>{{ $wf->informasi }}</h4>
                                        <br>
                                        @if($wf->minHarga == $wf->maxHarga)
                                        <p>Harga tiket Rp. {{ $wf->minHarga }}</p>
                                        @else
                                        <p>Harga tiket mulai dari Rp. {{ $wf->minHarga }} - {{ $wf->maxHarga }}</p>
                                        @endif
                                        <br>
                                        <a href="#" class="book_now">Lihat Detail Wisata</a>
                                    </div>
                                </div>
                                @else
                                <div class="carousel-item">
                                    <div class="single_offers" style="margin-bottom: 50px;">
                                        <div class="about_thumb" style="margin-bottom: 10px;">
                                            <img class="carousel img-box" src="{{ asset('montana-master/img/offers/1.png') }}" alt="">
                                        </div>
                                        <h3><b>{{ $wf->nama }}</b></h3>
                                        <h4>{{ $wf->informasi }}</h4>
                                        <br>
                                        @if($wf->minHarga == $wf->maxHarga)
                                        <p>Harga tiket Rp. {{ $wf->minHarga }}</p>
                                        @else
                                        <p>Harga tiket mulai dari Rp. {{ $wf->minHarga }} - {{ $wf->maxHarga }}</p>
                                        @endif
                                        <br>
                                        <a href="#" class="book_now">Lihat Detail Wisata</a>
                                    </div>
                                </div>
                                @endif
                            @endforeach

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

