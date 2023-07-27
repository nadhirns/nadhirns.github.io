@extends('layoutdashboard.app')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kartu Pendaftaran</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Section Header -->


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            @csrf
                            <div class="col-xl-12">
                                <div class="card card-body" id="cetak" style="margin-bottom: -1rem">
                                    <div class="p-4">
                                        <div class="d-flex">
                                            <div class="col-lg-3"
                                                style="text-align: center; margin-right:25px; margin-left:25px;">
                                                <img width="110px" src="{{ asset('assets/img/image_TK/Logo.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="col-lg-6">
                                                <center>
                                                    <label class="form-label" style="margin-top: -0.5rem"><strong
                                                            class="d-block">KARTU
                                                            PESERTA</strong></label>
                                                    <h5 style="margin-top: -0.5rem"> <strong class="d-block">PENERIMAAN
                                                            MAHASISWA BARU</strong></h4>
                                                        <h4 style="margin-top: -0.5rem"><strong class="d-block">TK
                                                                Sevilla
                                                                AL-Fatah</strong></h3>
                                                            <p style="margin-top: -0.5rem"><strong class="d-block">Jl.
                                                                    Margo
                                                                    Mulyo
                                                                    Kecamatan Balikpapan Barat
                                                                    Kota Balikpapan
                                                                    Kalimantan Timur 76125 <br> 41152</strong></p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" style="margin-bottom: -4rem;">
                                        <div class="p-4"
                                            style="border-top: 2px solid black!important; margin-top:-2.5rem;">
                                            <div class="d-flex">
                                                <div class="col-lg-4" style="text-align: center; margin-right:25px;">
                                                    <img src="{{ asset($viewData->pas_foto) }}" width="250px"
                                                        height="300" alt="">
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3 mb-4">
                                                        <h4><strong>DATA PESERTA</strong></h4><br>
                                                        <strong>NOMOR PENDAFTARAN</strong><br>
                                                        <h5 style="text-indent: 0.5in">
                                                            <strong>{{ $viewData->id_pendaftaran }}</strong>
                                                        </h5>
                                                        <strong>NAMA PESERTA</strong><br>
                                                        <h5 style="text-indent: 0.5in">
                                                            <strong>{{ $viewData->nama_lengkap }}</strong>
                                                        </h5>
                                                        <strong>TANGGAL LAHIR</strong><br>
                                                        <h5 style="text-indent: 0.5in">
                                                            <strong>{{ $viewData->tanggal_lahir }}</strong>
                                                        </h5>
                                                        <strong>AGAMA</strong><br>
                                                        <h5 style="text-indent: 0.5in">
                                                            <strong>{{ $viewData->agama }}</strong>
                                                        </h5>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mb-4">
                                                <h4><strong>PERNYATAAN</strong></h4>
                                                <h5 style="text-indent: 0.5in;text-align: justify;">Saya orang tua wali
                                                    yang
                                                    menyatakan bahwa
                                                    data yang
                                                    saya isikan dalam formulir pendaftaran penerimaan mahasiswa baru TK
                                                    Sevilla
                                                    Al-Fatah tahun 2023 adalah benar dan saya bersedia menerima
                                                    ketentuan yang
                                                    berlaku. Saya
                                                    bersedia menerima sanksi pembatalan penerimaan apabila melanggar
                                                    pernyataan
                                                    ini.</h5>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-lg-6" style="width:50%; text-align: right; margin:15px;">
                                                    <img width="150px" src="{{ asset('sipenmaru/images/qr.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="col-lg-6" style="width:50%;">
                                                    <br>
                                                    <center>
                                                        <h5><label class="form-label"><strong class="d-block">.............,
                                                                    ................., 2023</strong></label>
                                                        </h5>
                                                        <br>
                                                        <p style="color: rgb(156, 156, 156)">ttd</p>
                                                        <br>
                                                        <h5><strong class="d-block">{{ $viewData->nama_lengkap }}</strong>
                                                        </h5>
                                                    </center>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row my-4">
                                <div class="col">
                                    <div class="text-end mt-2 mt-sm-0">
                                        <button class="btn btn-success waves-effect waves-light me-1 float-right"
                                            onclick="printDiv('cetak')"><i class="fa fa-print"> </i>Print</button>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row-->
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.Section Content -->



    </div>
@endsection
