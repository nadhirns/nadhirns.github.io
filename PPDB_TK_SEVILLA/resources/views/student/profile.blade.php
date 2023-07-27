@extends('layoutdashboard.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if (Auth::user()->profile->foto != null)
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ url('upload/profile/' . Auth::user()->profile->foto) }}"
                                            alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ url('../../dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                                    @endif
                                </div>
                                <h3 class="profile-username text-center">{{ Auth::user()->profile->nama }}</h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Nama :</b> <a class="float-right">{{ Auth::user()->profile->nama }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>No HP Wali :</b> <a
                                            class="float-right">{{ Auth::user()->profile->no_hp ? Auth::user()->profile->no_hp : '-' }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email :</b> <a class="float-right">{{ Auth::user()->profile->email }}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#profileuser"
                                            data-toggle="tab">Profile Siswa</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Pengaturan
                                            Profile</a></li>
                                </ul>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="profileuser">
                                        @if (Auth::user()->profile->no_hp == null ||
                                                Auth::user()->profile->tempat_lahir == null ||
                                                Auth::user()->profile->jenis_kelamin == null)
                                            <br>
                                            <div class="alert alert-warning alert-dismissible fade show">
                                                <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round" class="me-2">
                                                    <path
                                                        d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                                                    </path>
                                                    <line x1="12" y1="9" x2="12" y2="13">
                                                    </line>
                                                    <line x1="12" y1="17" x2="12.01" y2="17">
                                                    </line>
                                                </svg>
                                                <strong>Peringatan!</strong> Data belum lengkap. Silahkan lengkapi data akun
                                                sekarang di <b>Pengaturan Profile</b>.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="btn-close">
                                                </button>
                                            </div>
                                            <br>
                                        @endif
                                        <div class="card-body">

                                            <strong><i class="fas fa-user mr-1"></i> Nama </strong>
                                            <p class="text-muted">
                                                {{ Auth::user()->profile->nama ? Auth::user()->profile->nama : '-' }}</p>
                                            <hr>

                                            <strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin </strong>
                                            <p class="text-muted">
                                                {{ Auth::user()->profile->jenis_kelamin ? Auth::user()->profile->jenis_kelamin : '-' }}
                                            </p>
                                            <hr>

                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat Lahir </strong>
                                            <p class="text-muted">
                                                {{ Auth::user()->profile->tempat_lahir ? Auth::user()->profile->tempat_lahir : '-' }}
                                            </p>
                                            <hr>

                                            <strong><i class="fas fa-pencil-alt mr-1"></i> Tanggal Lahir </strong>
                                            <p class="text-muted">
                                                {{ Auth::user()->profile->tanggal_lahir ? Auth::user()->profile->tanggal_lahir : '-' }}
                                            </p>
                                            <hr>

                                            <strong><i class="fas fa-address-book mr-1"></i> No HP Wali (Orang Tua Siswa)
                                            </strong>
                                            <p class="text-muted">
                                                {{ Auth::user()->profile->no_hp ? Auth::user()->profile->no_hp : '-' }}</p>
                                            <hr>

                                            <strong><i class="fas fa-envelope-square mr-1"></i> Email (Orang Tua Siswa)
                                            </strong>
                                            <p class="text-muted">
                                                {{ Auth::user()->profile->email ? Auth::user()->profile->email : '-' }}</p>

                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal" method="post"
                                            action="{{ route('update-user', Auth::user()->profile->user_id) }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="userid" value="{{ auth()->user()->id }}">
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" disabled="disabled" style="width: 100%;"
                                                        class="form-control" id="inputName" placeholder="Name"
                                                        name="nama" value="{{ Auth::user()->profile->nama }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" disabled="disabled" style="width: 100%;"
                                                        class="form-control" id="inputEmail" placeholder="Email"
                                                        name="email" value="{{ Auth::user()->profile->email }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputJenisKelamin" class="col-sm-2 col-form-label">Jenis
                                                    Kelamin</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control wide" style="width: 100%;" required
                                                        name="jenis_kelamin">
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="laki-laki">Laki-Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputFotoProfile" class="col-sm-2 col-form-label">Foto
                                                    Profile</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="foto"
                                                        accept="image/png, image/jpg, image/jpeg, image/gif, image/svg">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputTempatLahir" class="col-sm-2 col-form-label">Tempat
                                                    Lahir</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputTempatLahir"
                                                        name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal
                                                    Lahir</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" id="inputTanggalLahir"
                                                        name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputNoHP" class="col-sm-2 col-form-label">Nomor HP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputNoHP"
                                                        name="no_hp" placeholder="Nomor HP"
                                                        value="{{ old('no_hp') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" required> Data Sudah Benar ?
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
