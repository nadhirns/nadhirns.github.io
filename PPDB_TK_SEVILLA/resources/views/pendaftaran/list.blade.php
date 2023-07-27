@extends('layoutdashboard.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Informasi Pendaftaran</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <!-- Admin -->
                @if (Auth::user()->user_type == 1)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cari Pendaftar</h3>
                        </div>
                        <form action="" method="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>No Pendaftaran</label>
                                        <input type="text" value="{{ Request::get('no_pendaftaran') }}"
                                            class="form-control" name="no_pendaftaran" placeholder="nomor pendaftaran">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Nama Lengkap / Nama Panggilan</label>
                                        <input type="text" value="{{ Request::get('name') }}" class="form-control"
                                            name="name" placeholder="nama panggilan">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Nama Ibu</label>
                                        <input type="text" value="{{ Request::get('name_mom') }}" class="form-control"
                                            name="name_mom" placeholder="nama ibu">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit"
                                            style="margin-top: 30px">Cari</button>
                                        <a href="{{ url('admin/data-pendaftaran') }}" class="btn btn-success"
                                            style="margin-top: 30px">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_messages')


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pendaftaran TK Sevilla</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0" id="cetak">
                            @csrf
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Peserta</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($viewData as $x)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $x->id_pendaftaran }}</td>
                                            <td>{{ $x->nama_lengkap }}</td>
                                            <td>{{ $x->jenis_kelamin }}</td>
                                            <td><strong>{{ \Carbon\Carbon::parse($x->tgl_pendaftaran)->translatedFormat('d F Y') }}</strong>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @if ($x->status_pendaftaran == 'Terverifikasi')
                                                            <span class="badge badge-success badge-left">Terverifikasi<span
                                                                    class="ms-1 fa fa-check"></span></span>
                                                        @elseif($x->status_pendaftaran == 'Belum Terverifikasi')
                                                            <span class="badge badge-warning badge-left">Belum <br>
                                                                Terverifikasi<br><span
                                                                    class="ms-1 fas fa-stream"></span></span>
                                                        @elseif($x->status_pendaftaran == 'Selesai')
                                                            <span class="badge badge-primary badge-left">Selesai<span
                                                                    class="ms-1 fa fa-check"></span></span>
                                                        @else
                                                            <span class="badge badge-danger badge-left">Not Found<span
                                                                    class="ms-1 fa fa-ban"></span></span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                                data-toggle="dropdown">
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ url('admin/data-pendaftaran/verified-registration/' . $x->id_pendaftaran) }}">Terverifikasi</a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ url('admin/data-pendaftaran/notverified-registration/' . $x->id_pendaftaran) }}">Belum
                                                                        Terverifikasi</a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ url('admin/data-pendaftaran/finish-registration/' . $x->id_pendaftaran) }}">Selesai</a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ url('admin/data-pendaftaran/invalid-registration/' . $x->id_pendaftaran) }}">Tidak
                                                                        Sah</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/detail-pendaftaran/' . $x->id_pendaftaran) }}"
                                                    class="btn btn-circle btn-info"><i class="fa fa-file-alt"></i></a>
                                                <a href="{{ url('admin/edit-pendaftaran/' . $x->id_pendaftaran) }}"
                                                    class="btn btn-circle btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="{{ url('admin/hapus-pendaftaran/' . $x->id_pendaftaran) }}"
                                                    class="btn btn-circle btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right">
                                {!! $viewData->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
            </div>
    </div>
    </div>


    <!-- USER -->
@elseif(Auth::user()->user_type == 2)
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="mb-4">
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#AllStatus" role="tab">Semua
                                        Pendaftaran</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#OnProgress" role="tab">Sedang
                                        Berjalan</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#Finish" role="tab">Selesai / Lihat
                                        Pengumuman</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#Closed" role="tab">Dibatalkan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-4">
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($viewData as $x)
                                @if (isset($x->email) && Auth::user()->email == $x->email)
                                    @php
                                        $no = $no + 1;
                                    @endphp
                                @endif
                            @endforeach
                            @if ($no == 0)
                                <a href="{{ route('form-registration') }}" class="btn btn-primary btn-rounded fs-18">+
                                    Daftar Seleksi</a>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /. card-header -->

                <div class="card-body">
                    <div class="tab-content">

                        <div class="active tab-pane" id="AllStatus">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID Pendaftaran</th>
                                                    <th>Pendaftar</th>
                                                    <th>Pas Foto</th>
                                                    <th>Tanggal Pendaftaran</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($viewData as $x)
                                                    @if (Auth::user()->email == $x->email)
                                                        <tr>
                                                            <td class="text-primary d-block fs-18 font-w500 mb-1">
                                                                <strong>{{ $x->id_pendaftaran }}</strong>
                                                            </td>
                                                            <td><strong>{{ $x->nama_lengkap }}</strong>
                                                            </td>
                                                            <td><img src="{{ url('/' . $x->pas_foto) }}" alt="pas foto"
                                                                    style="width: 40px">
                                                            </td>
                                                            <td><strong><?php
                                                            // Misalkan $x->tgl_pendaftaran adalah tanggal yang ingin Anda ubah formatnya
                                                            $originalDate = $x->tgl_pendaftaran;
                                                            
                                                            // Ubah format tanggal menjadi "d-m-Y" (tanggal-bulan-tahun)
                                                            $formattedDate = date('d-m-Y', strtotime($originalDate));
                                                            
                                                            // Tampilkan hasilnya
                                                            echo $formattedDate;
                                                            ?></strong>
                                                            </td>
                                                            <td><strong>
                                                                    @if ($x->status_pendaftaran == 'Belum Terverifikasi')
                                                                        <a href="detail-pendaftaran/{{ $x->id_pendaftaran }}"
                                                                            class=" btn bgl-warning text-warning fs-16 font-w600">Belum
                                                                            <br>
                                                                            Terverifikasi</a>
                                                                    @elseif($x->status_pendaftaran == 'Terverifikasi')
                                                                        <a href="detail-pendaftaran/{{ $x->id_pendaftaran }}"
                                                                            class=" btn bgl-warning text-success fs-16 font-w600">Terverifikasi</a>
                                                                    @elseif($x->status_pendaftaran == 'Selesai')
                                                                        <a href="detail-pendaftaran/{{ $x->id_pendaftaran }}"
                                                                            class=" btn bgl-warning text-success fs-16 font-w600">Selesai</a>
                                                                    @else
                                                                        <a href="detail-pendaftaran/{{ $x->id_pendaftaran }}"
                                                                            class=" btn bgl-warning text-danger fs-16 font-w600">Tidak
                                                                            Sah</a>
                                                                    @endif
                                                                </strong></td>
                                                            <td><strong><a class="dropdown-item"
                                                                        href="detail-pendaftaran/{{ $x->id_pendaftaran }}">Lihat
                                                                        Selengkapnya</a>
                                                                    @if ($x->status_pendaftaran == 'Selesai')
                                                                        <a class="dropdown-item"
                                                                            href="view-announcement/{{ $x->id_pendaftaran }}">Lihat
                                                                            Pengumuman</a>
                                                                    @endif
                                                                </strong></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        <!-- /. tab-pane AllStatus -->

                        <div class="tab-pane" id="OnProgress">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID Pendaftaran</th>
                                                    <th>Pendaftar</th>
                                                    <th>Pas Foto</th>
                                                    <th>Tanggal Pendaftaran</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($viewData as $x)
                                                    @if (Auth::user()->email == $x->email)
                                                        @if ($x->status_pendaftaran == 'Belum Terverifikasi' || $x->status_pendaftaran == 'Terverifikasi')
                                                            <tr>
                                                                <td class="text-primary d-block fs-18 font-w500 mb-1">
                                                                    <strong>{{ $x->id_pendaftaran }}</strong>
                                                                </td>
                                                                <td><strong>{{ $x->nama_lengkap }}</strong>
                                                                </td>
                                                                <td><img src="{{ url('/' . $x->pas_foto) }}"
                                                                        alt="pas foto" style="width: 40px">
                                                                </td>
                                                                <td><strong><?php
                                                                // Misalkan $x->tgl_pendaftaran adalah tanggal yang ingin Anda ubah formatnya
                                                                $originalDate = $x->tgl_pendaftaran;
                                                                
                                                                // Ubah format tanggal menjadi "d-m-Y" (tanggal-bulan-tahun)
                                                                $formattedDate = date('d-m-Y', strtotime($originalDate));
                                                                
                                                                // Tampilkan hasilnya
                                                                echo $formattedDate;
                                                                ?></strong>
                                                                </td>
                                                                <td><strong>
                                                                        @if ($x->status_pendaftaran == 'Belum Terverifikasi')
                                                                            <a href="detail-pendaftaran/{{ $x->id_pendaftaran }}"
                                                                                class=" btn bgl-warning text-warning fs-16 font-w600">Belum
                                                                                <br> Terverifikasi</a>
                                                                        @elseif($x->status_pendaftaran == 'Terverifikasi')
                                                                            <a href="detail-pendaftaran/{{ $x->id_pendaftaran }}"
                                                                                class=" btn bgl-warning text-success fs-16 font-w600">Terverifikasi</a>
                                                                        @endif
                                                                    </strong></td>
                                                                <td><strong><a class="dropdown-item"
                                                                            href="view-announcement/{{ $x->id_pendaftaran }}">Lihat
                                                                            Selengkapnya</a>
                                                                    </strong></td>
                                                            </tr>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        <!-- /. tab-pane OnProgress -->

                        <div class="tab-pane" id="Finish">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID Pendaftaran</th>
                                                    <th>Pendaftar</th>
                                                    <th>Pas Foto</th>
                                                    <th>Tanggal Pendaftaran</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($viewData as $x)
                                                    @if (Auth::user()->email == $x->email)
                                                        @if ($x->status_pendaftaran == 'Selesai')
                                                            <tr>
                                                                <td class="text-primary d-block fs-18 font-w500 mb-1">
                                                                    <strong>{{ $x->id_pendaftaran }}</strong>
                                                                </td>
                                                                <td><strong>{{ $x->nama_lengkap }}</strong>
                                                                </td>
                                                                <td><img src="{{ url('/' . $x->pas_foto) }}"
                                                                        alt="pas foto" style="width: 40px">
                                                                </td>
                                                                <td><strong><?php
                                                                // Misalkan $x->tgl_pendaftaran adalah tanggal yang ingin Anda ubah formatnya
                                                                $originalDate = $x->tgl_pendaftaran;
                                                                
                                                                // Ubah format tanggal menjadi "d-m-Y" (tanggal-bulan-tahun)
                                                                $formattedDate = date('d-m-Y', strtotime($originalDate));
                                                                
                                                                // Tampilkan hasilnya
                                                                echo $formattedDate;
                                                                ?></strong>
                                                                </td>
                                                                <td><strong>
                                                                        <a href="detail-pendaftaran/{{ $x->id_pendaftaran }}"
                                                                            class=" btn bgl-warning text-success fs-16 font-w600">Selesai</a>
                                                                    </strong></td>
                                                                <td><strong><a class="dropdown-item"
                                                                            href="detail-pendaftaran/{{ $x->id_pendaftaran }}">Lihat
                                                                            Selengkapnya</a>
                                                                        <a class="dropdown-item"
                                                                            href="view-announcement/{{ $x->id_pendaftaran }}">Lihat
                                                                            Hasil Seleksi</a>
                                                                    </strong></td>
                                                            </tr>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        <!-- /. tab-pane Finis -->

                        <div class="tab-pane" id="Closed">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID Pendaftaran</th>
                                                    <th>Pendaftar</th>
                                                    <th>Pas Foto</th>
                                                    <th>Tanggal Pendaftaran</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($viewData as $x)
                                                    @if (Auth::user()->email == $x->email)
                                                        @if ($x->status_pendaftaran == 'Tidak Sah')
                                                            <tr>
                                                                <td class="text-primary d-block fs-18 font-w500 mb-1">
                                                                    <strong>{{ $x->id_pendaftaran }}</strong>
                                                                </td>
                                                                <td><strong>{{ $x->nama_lengkap }}</strong>
                                                                </td>
                                                                <td><img src="{{ url('/' . $x->pas_foto) }}"
                                                                        alt="pas foto" style="width: 40px">
                                                                </td>
                                                                <td><strong><?php
                                                                // Misalkan $x->tgl_pendaftaran adalah tanggal yang ingin Anda ubah formatnya
                                                                $originalDate = $x->tgl_pendaftaran;
                                                                
                                                                // Ubah format tanggal menjadi "d-m-Y" (tanggal-bulan-tahun)
                                                                $formattedDate = date('d-m-Y', strtotime($originalDate));
                                                                
                                                                // Tampilkan hasilnya
                                                                echo $formattedDate;
                                                                ?></strong>
                                                                </td>
                                                                <td><strong>
                                                                        <a href="detail-pendaftaran/{{ $x->id_pendaftaran }}"
                                                                            class=" btn bgl-warning text-danger fs-16 font-w600">Tidak
                                                                            Sah</a>
                                                                    </strong></td>
                                                                <td><strong><a class="dropdown-item"
                                                                            href="view-announcement/{{ $x->id_pendaftaran }}">Lihat
                                                                            Selengkapnya</a>
                                                                    </strong></td>
                                                            </tr>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        <!-- /. tab-pane Closed -->

                        @php
                            $no = $no + 1;
                        @endphp
                    </div>
                    @if ($no == 0)
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;</button>
                            <i class="icon fas fa-info"></i><strong>Haii!</strong> Kamu belum melakukan
                            pendaftaran silahkan daftar dan
                            ikuti proses
                            kegiatannya ya.
                        </div>
                    @endif
                    <!-- /. alert Info belum ada pendaftaran -->
                </div>
                <!-- /. card-body -->


            </div>
        </div>
    </div>
    @endif
    {{-- @endif User --}}
    </div>
    </section>
    </div>
@endsection
