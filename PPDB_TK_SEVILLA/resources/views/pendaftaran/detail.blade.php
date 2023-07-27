@extends('layoutdashboard.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Pendaftaran</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                {{-- @foreach ($dataPendaftaran as $viewData) --}}
                <div class="row">
                    @csrf
                    <div class="col-xl-12">
                        <div class="custom-accordion">
                            @if (Auth::user()->user_type == 1)
                                <div class="row my-4">
                                    <div class="col">
                                        <div class="text-end mt-2 mt-sm-0">
                                            <a href="../../data-registration">
                                                <button type="button" class="btn btn-danger light"
                                                    data-bs-dismiss="modal">Close</button>
                                            </a>
                                            @if ($viewData->status_pendaftaran == 'Belum Terverifikasi')
                                                <a href="../../verified-registration/{{ $viewData->id_pendaftaran }}">
                                                    <button type="button" class="btn btn-primary">Verified</button>
                                                </a>
                                            @endif
                                            <a href="../../card-registration/{{ $viewData->id }}">
                                                <button type="button" class="btn btn-primary">View Card</button>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row-->
                            @elseif(Auth::user()->user_type == 2)
                                @if ($viewData->status_pendaftaran == 'Belum Terverifikasi')
                                    <div class="alert alert-success alert-dismissible">
                                        <i class="icon fas fa-check"></i><strong>Sukses!</strong> Data pendaftaranmu
                                        terkirim. Sebelum melakukan
                                        pembayaran,
                                        tunggu administrator memverifikasi datamu ya.
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                @elseif (
                                    $viewData->status_pendaftaran == 'Terverifikasi' &&
                                        $viewDataPembayaran->status != 'Gratis' &&
                                        $viewDataPembayaran->status != 'Dibayar')
                                    <div class="alert alert-info alert-dismissible fade show">
                                        <strong>Informasi!</strong> Segera lakukan pembayaran.
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                @endif
                                <div class="text-end">
                                    <a href="../../siswa/kartu-pendaftaran/{{ $viewData->id }}">
                                        <button type="button" class="btn btn-primary">Lihat Kartu Pendaftaran</button>
                                    </a>
                                </div>
                                <br>
                            @endif

                            <div class="card card-body">
                                <div class="card-header">
                                    <div class="col-12">
                                        <div class="card-title">
                                            <h4><strong>Data Pendaftaran</strong></h4>
                                        </div>
                                        <div class="float-right">
                                            @if ($viewData->status_pendaftaran == 'Belum Terverifikasi')
                                                <button class="btn btn-warning mb-2" style="margin-bottom: 0.5rem;"
                                                    disabled>Belum
                                                    Terverifikasi</button>
                                            @elseif ($viewData->status_pendaftaran == 'Terverifikasi')
                                                @if ($viewDataPembayaran->status != 'Gratis' && $viewDataPembayaran->status != 'Dibayar')
                                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                                        data-target=".modal" style="margin-bottom: 1rem;"><i
                                                            class="mdi mdi-plus me-1"></i>Upload
                                                        Pembayaran</button>
                                                @endif
                                                <button class="btn btn-success mb-2" style="margin-bottom: 0.5rem;"
                                                    disabled>Terverifikasi</button>
                                            @elseif ($viewData->status_pendaftaran == 'Selesai')
                                                <button class="btn btn-primary mb-2" style="margin-bottom: 0.5rem;"
                                                    disabled>Selesai</button>
                                            @else
                                                <span class="badge badge-danger">Data Tidak Sah</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="modal fade upload" tabindex="-1" role="dialog"
                                    aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Kirim bukti pembayaran</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('upload-payment') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="userid" value="{{ auth()->user()->id }}">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id_pendaftaran" id="nama"
                                                            class="form-control" value="{{ $viewData->id_pendaftaran }}">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <label for="iduser">Pilih Dokumen</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Upload</span>
                                                                    <div class="form-file">
                                                                        <input type="file"
                                                                            class="form-file-input form-control"
                                                                            name="pem">
                                                                        <input type="hidden"
                                                                            class="form-file-input form-control"
                                                                            name="pathnya">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-top-0 d-flex">
                                                        <button type="button" class="btn btn-danger light"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="add"
                                                            class="btn btn-primary">Perbaharui Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal --> --}}

                                <div class="modal fade upload" id="modal-primary">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-primary">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Primary Modal</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('upload-payment') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="userid" value="{{ auth()->user()->id }}">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id_pendaftaran" id="nama"
                                                            class="form-control" value="{{ $viewData->id_pendaftaran }}">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <label for="iduser">Pilih Dokumen</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Upload</span>
                                                                    <div class="form-file">
                                                                        <input type="file"
                                                                            class="form-file-input form-control"
                                                                            name="pem">
                                                                        <input type="hidden"
                                                                            class="form-file-input form-control"
                                                                            name="pathnya">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-top-0 d-flex">
                                                        <button type="button" class="btn btn-danger light"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="add"
                                                            class="btn btn-primary">Perbaharui Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->


                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="row mb-2">
                                                <div class="pt-4 border-bottom-1 pb-3">
                                                    <h4 class="text-primary"><b>PROFIL SISWA</b></h4>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 col-6">
                                                    <h5 class="f-w-400"><strong>Nomor Pendaftaran</strong></h5>
                                                </div>
                                                <div class="col-sm-8 col-7">
                                                    <h5 class="f-w-500">: {{ $viewData->id_pendaftaran }}</h5>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 col-6">
                                                    <h5 class="f-w-400"><strong>Nama</strong></h5>
                                                </div>
                                                <div class="col-sm-8 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->nama_lengkap }}</h5>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 col-6">
                                                    <h5 class="f-w-400"><strong>Jenis Kelamin</strong></h5>
                                                </div>
                                                <div class="col-sm-8 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->jenis_kelamin }}</h5>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 col-6">
                                                    <h5 class="f-w-400"><strong>TTL</strong></h5>
                                                </div>
                                                <div class="col-sm-8 col-6">
                                                    <h5 class="f-w-500">:
                                                        {{ $viewData->tempat_lahir }},{{ $viewData->tanggal_lahir }}</h5>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 col-6">
                                                    <h5 class="f-w-400"><strong>Agama</strong></h5>
                                                </div>
                                                <div class="col-sm-8 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->agama }}</h5>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 col-6">
                                                    <h5 class="f-w-400"><strong>Jumlah Saudara</strong></h5>
                                                </div>
                                                <div class="col-sm-8 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->jumlah_saudara }}</h5>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 col-6">
                                                    <h5 class="f-w-400"><strong>Tinggal Bersama</strong></h5>
                                                </div>
                                                <div class="col-sm-8 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->tinggal_bersama }}</h5>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 col-6">
                                                    <h5 class="f-w-400"><strong>Alamat</strong></h5>
                                                </div>
                                                <div class="col-sm-8 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->alamat }}</h5>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 col-6">
                                                    <h5 class="f-w-400"><strong>Email</strong></h5>
                                                </div>
                                                <div class="col-sm-8 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->email }}</h5>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 col-6">
                                                    <h5 class="f-w-400"><strong>Tanggal Pendaftaran</strong></h5>
                                                </div>
                                                <div class="col-sm-8 col-6">
                                                    <h5 class="f-w-500">:
                                                        <?php
                                                        // Misalkan $viewData->tgl_pendaftaran adalah tanggal yang ingin Anda ubah formatnya
                                                        $originalDate = $viewData->tgl_pendaftaran;
                                                        
                                                        // Ubah format tanggal menjadi "d-m-Y" (tanggal-bulan-tahun)
                                                        $formattedDate = date('d-m-Y', strtotime($originalDate));
                                                        
                                                        // Tampilkan hasilnya
                                                        echo $formattedDate;
                                                        ?>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <img src="{{ asset($viewData->pas_foto) }}" width="250px"
                                                    height="300" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-4 border-bottom-1 pb-3">
                                        <h4 class="text-primary"><b>DATA ORANG TUA</b></h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-6">
                                                    <h5 class="f-w-400"><strong>Nama Ayah</strong></h5>
                                                </div>
                                                <div class="col-sm-9 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->nama_ayah }}</h5>
                                                </div>
                                                <div class="col-sm-3 col-6">
                                                    <h5 class="f-w-400"><strong>Pekerjaan Ayah</strong></h5>
                                                </div>
                                                <div class="col-sm-9 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->pekerjaan_ayah }}</h5>
                                                </div>
                                                <div class="col-sm-3 col-6">
                                                    <h5 class="f-w-400"><strong>No Handphone</strong></h5>
                                                </div>
                                                <div class="col-sm-9 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->no_hp_ayah }}</h5>
                                                </div>
                                                <div class="col-sm-3 col-6">
                                                    <h5 class="f-w-400"><strong>Penghasilan Ayah</strong></h5>
                                                </div>
                                                <div class="col-sm-9 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->penghasilan_ayah }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!--kiri-->
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-6">
                                                    <h5 class="f-w-400"><strong>Nama Ibu</strong></h5>
                                                </div>
                                                <div class="col-sm-9 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->nama_ibu }}</h5>
                                                </div>
                                                <div class="col-sm-3 col-6">
                                                    <h5 class="f-w-400"><strong>Pekerjaan Ibu</strong></h5>
                                                </div>
                                                <div class="col-sm-9 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->pekerjaan_ibu }}</h5>
                                                </div>
                                                <div class="col-sm-3 col-6">
                                                    <h5 class="f-w-400"><strong>No Handphone</strong></h5>
                                                </div>
                                                <div class="col-sm-9 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->no_hp_ibu }}</h5>
                                                </div>
                                                <div class="col-sm-3 col-6">
                                                    <h5 class="f-w-400"><strong>Penghasilan Ibu</strong></h5>
                                                </div>
                                                <div class="col-sm-9 col-6">
                                                    <h5 class="f-w-500">: {{ $viewData->penghasilan_ibu }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}

            </div>
            <!-- /.container-fluid -->
        </section>



    </div>
    <!-- end content-wrapper -->
@endsection
