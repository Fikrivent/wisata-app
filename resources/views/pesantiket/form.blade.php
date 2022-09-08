@extends('layouts.montana')

@section('title-bar','Pemesanan Tiket Wisata')
@section('judul', 'Form Pemesanan Tiket Wisata')

@section('js')
    <script>
        function formvalidation()
        {
            $("input").prop('required',true);
            $("select").prop('required',true);
        }
        
        $('.tanggal_pesan').add('.opsiWisata').on('change', function() {
            var idWisata = $('.opsiWisata').find(":selected").val();
            var tanggal_kunjungan = $('.tanggal_pesan').val();
            getJadwalWisata(idWisata,tanggal_kunjungan);
        });

        
        $('.tanggal_pesan').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
            rightIcon: '<span class="fa fa-calendar"></span>'
            },
            format: 'yyyy-mm-dd',
        });

        $('.cek-tiket').on('click', function() {

            formvalidation();
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

                    // console.log(kuota_tersisa, total_tiket);
                    
                    if(jumlahPemesan.length > 0)
                    {
                        kuota_tersisa = (parseInt(kuota[0].kuota) - parseInt(jumlahPemesan[0].total_pemesan));
                    }

                    var msg = "Jumlah tiket yang tersedia : "+kuota_tersisa+" Tiket";

                    if(total_tiket <= kuota_tersisa)
                    {
                        alertTersedia(msg);
                    }
                    else{
                        alertTidakTersedia(msg);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        function alertTersedia(param)
        {
            const swalButtons = Swal.mixin({
            
            });

            swalButtons.fire({
                title: 'Tiket Tersedia',
                text: param,
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

        function alertTidakTersedia(param)
        {
            const swalButtons = Swal.mixin({
            
            });

            swalButtons.fire({
                title: 'Tiket Tidak Tersedia',
                text: param,
                icon: 'error',
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#d60f0f',
            }).then((result) => {
                
            });
        }

        function getJadwalWisata(idWisata, tanggal_kunjungan) 
        {
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: 'ajaxLoadJadwalWisata/'+idWisata+'/'+tanggal_kunjungan,
                dataType: 'json',
                success: function (data) 
                {
                    // console.log(data);
                    $('.opsiJamWisata').removeAttr('disabled');
                    $('.opsiJamWisata').empty();

                    if(data['data'].length > 0)
                    {
                        $.each(data['data'], function(index, item) {
                            // console.log(item);
                            
                            $('.opsiJamWisata').append(
                                '<option value="'+item.idjadwal+'"">'+item.hari+', Jam '+ item.jam_awal+' - '+item.jam_akhir+'</option>'
                            );
                        });
                    }
                    else{
                        $('.opsiJamWisata').prop('disabled','true');
                        $('.opsiJamWisata').append(
                                '<option>Tidak ada jadwal kunjungan yang tersedia pada tanggal tersebut</option>'
                        );
                    }
                    
                },
                error:function(error)
                { 
                    console.log(error);
                }
            });
        }
    </script>
@endsection

@section('content')
<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg">
    <h3>@yield('judul')</h3>
</div>
<!-- bradcam_area_end -->

<div class="booking-form">
    {{-- <div class="form-header">
        <h2>Pesan Tiket Kunjungan Wisata</h2>
    </div> --}}
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
                    <input type="text" placeholder="Tentukan Tanggal Rencana Kunjungan Anda..." style="cursor: pointer;" class="form-control tanggal_pesan" name="tanggal_pesan">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <span class="form-label">Rencana Jam Kunjungan</span>
                    {{-- Bagian ini nanti ditambahi library pencarian selectbox --}}
                    <select class="form-control opsiJamWisata" style="cursor: pointer;" name="jadwalWisata" disabled>
                        <option>Silahkan Tentukan Destinasi Wisata dan Tanggal Kunjungan Terlebih Dahulu ...</option>
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

@endsection