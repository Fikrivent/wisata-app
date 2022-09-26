@extends('layouts.montana')

@section('title-bar','Detail Wisata - '.$wisatas->nama)
@section('judul', $wisatas->nama )

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
                    <h2>Detail Wisata</h2>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <p style="text-align: justify;">Over time, even the most sophisticated, memory packed computer can begin
                        to run slow if we
                        don’t do something to prevent it. The reason why has less to do with how computers are made
                        and how they age and
                        more to do with the way we use them. You see, all of the daily tasks that we do on our PC
                        from running programs
                        to downloading and deleting software can make our computer sluggish. To keep this from
                        happening, you need to
                        understand the reasons why your PC is getting slower and do something to keep your PC
                        running at its best. You
                        can do this through regular maintenance and PC performance optimization programs</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <center><img src="{{ asset($wisatas->gambar) }}" alt="" class="img-fluid"></center>
                    {{-- <a href="#" class="genric-btn info circle" style="font-size: 15px;">Pesan Tiket Sekarang</a> --}}
                </div>
            </div>
    </div>
</div>
<!-- offers_area_end -->

@endsection