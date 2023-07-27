@extends('layoutdashboard.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Formulir Pendaftaran</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('save-registration') }}" method="post" enctype="multipart/form-data">


                    @csrf
                    <input type="hidden" name="userid" value="{{ Auth::user()->id }}">


                    <!-- Identitas Calon Siswa -->
                    <div class="card card-default">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <div class="card-header">
                            <h3 class="card-title">Identitas Calon Siswa</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="col-md-12">

                                <div class="card-header">
                                    <h3 class="card-title" style="font-weight: bold">Data Calon Siswa</h3>
                                </div>
                                <!-- /.card-header Data Calon Siswa -->

                                <div class="card-body">

                                    @if (Auth::user()->profile->email != null)
                                        <input type="hidden" value="{{ Auth::user()->profile->email }}" style="width: 100%"
                                            class="form-control" name="email" required>
                                    @else
                                        <input type="text" value="{{ old('email') }}" style="width: 100%"
                                            class="form-control" name="email" required>
                                    @endif
                                    <!-- /.email -->

                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <span class="input-group-text">🧒 Nama Panggilan Anak</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nama Panggilan"
                                            name="nama_panggilan" value="{{ old('nama_panggilan') }}" required>
                                    </div>
                                    <!-- /.Nama Panggilan -->

                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <span class="input-group-text">🧒 Nama Lengkap Anak</span>
                                        </div>
                                        @if (Auth::user()->profile->nama != null)
                                            <input type="text" value="{{ Auth::user()->profile->nama }}"
                                                style="width: 100%" class="form-control" name="nama_lengkap" disabled
                                                required>
                                        @else
                                            <input type="text" value="{{ old('nama_lengkap') }}" style="width: 100%"
                                                class="form-control" name="nama_lengkap" required>
                                        @endif
                                    </div>
                                    <!-- /.Nama Lengkap -->

                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <span class="input-group-text">⚥ Jenis Kelamin Anak</span>
                                        </div>
                                        <select class="form-control" style="width: 100%;" name="jenis_kelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <!-- /.Jenis Kelamin Anak -->

                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <span class="input-group-text">🎂 Tempat Lahir</span>
                                        </div>
                                        @if (Auth::user()->profile->tempat_lahir != null)
                                            <input type="text" class="form-control" id="inputTempatLahir"
                                                value="{{ Auth::user()->profile->tempat_lahir }}" placeholder="Tempat Lahir"
                                                name="tempat_lahir" required>
                                        @else
                                            <input type="text" class="form-control" id="inputTempatLahir"
                                                value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir"
                                                name="tempat_lahir" required>
                                        @endif

                                    </div>
                                    <!-- /.Tempat Lahir Anak -->

                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <span class="input-group-text">🎂 Tanggal Lahir</span>
                                        </div>
                                        @if (Auth::user()->profile->tanggal_lahir != null)
                                            <input type="date" class="form-control datetimepicker-input" required
                                                value="{{ Auth::user()->profile->tanggal_lahir }}" name="tanggal_lahir">
                                        @else
                                            <input type="date" class="form-control" id="inputTanggalLahir"
                                                name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
                                        @endif
                                    </div>
                                    <!-- /.Tanggal Lahir Anak -->

                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <span class="input-group-text">🗺 Alamat Rumah</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Masukkan Alamat..."
                                            name="alamat" value="{{ old('alamat') }}" required>
                                    </div>
                                    <!-- /.Alamat Rumah Anak -->

                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <span class="input-group-text">👶 Anak Ke -</span>
                                        </div>
                                        <select class="form-control" style="width: 100%;" name="anak_ke" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="other">Lain-nya</option>
                                        </select>
                                    </div>
                                    <!-- /.Anak Ke - -->

                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <span class="input-group-text">☪️ Agama</span>
                                        </div>
                                        <select class="form-control" style="width: 100%;" name="agama" required>
                                            <option value="">Pilih Agama</option>
                                            <option value="Islam">☪️ Islam</option>
                                            <option value="Kristen Protestan">✝️ Kristen Protestan</option>
                                            <option value="Kristen Katolik">✝️ Kristen Katolik</option>
                                            <option value="Hindu">🕉️ Hindu</option>
                                            <option value="Buddha">☸️ Buddha</option>
                                            <option value="Konghucu">☯️ Konghucu</option>
                                        </select>
                                    </div>
                                    <!-- /.Agama Anak -->

                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <span class="input-group-text">👨‍👩‍👧 Jumlah Saudara</span>
                                        </div>
                                        <input type="text" class="form-control" name="jumlah_saudara" required />
                                    </div>
                                    <!-- /.Jumlah Saudara -->

                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <span class="input-group-text">👨‍👩‍👧 Anak Tinggal Bersama ?</span>
                                        </div>
                                        <select class="form-control" style="width: 100%;" name="tinggal_bersama"
                                            required>
                                            <option value="">Pilih Tinggal Bersama Siapa</option>
                                            <option value="Orang Tua">Orang Tua</option>
                                            <option value="Wali">Wali</option>
                                            <option value="Saudara Kandung">Saudara Kandung</option>
                                            <option value="Saudara Sepupu">Saudara Sepupu</option>
                                            <option value="Asrama Sekolah">Asrama Sekolah</option>
                                            <option value="Kost">Kost</option>
                                            <option value="Rumah Sendiri">Rumah Sendiri</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <!-- /.Anak Tinggal Bersama -->

                                    <div class="form-group mb-3">
                                        <div class="form-group-prepend">
                                            <span class="input-group-text">Pas Foto Calon Siswa</span>
                                        </div>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-control"
                                                    id="exampleInputFile" name="foto" value="{{ old('foto') }}"
                                                    accept="image/png, image/jpg, image/jpeg" required>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.Jumlah Saudara -->


                                </div>
                                <!-- /.card-body Data Calon Siswa-->

                            </div>

                        </div>

                        <div class="card-footer">
                            <h6 style="color: red">Pas Foto Siswa Berformat PNG, JPG, JPEG</h6>
                        </div>


                    </div>
                    <!-- /.card Identitas Calon Siswa -->

                    <!-- Identitas Wali Calon Siswa -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Identitas Orang Tua / Wali Calon Siswa</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="row">

                                <!-- Data Ayah -->
                                <div class="col-md-6">

                                    <div class="card-header">
                                        <h3 class="card-title" style="font-weight: bold">Data Ayah</h3>
                                    </div>
                                    <!-- /.card-header ayah -->

                                    <div class="card-body">

                                        <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <span class="input-group-text">🧑 Nama Ayah</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nama Ayah"
                                                name="nama_ayah" value="{{ old('nama_ayah') }}" required>
                                        </div>
                                        <!-- /.Nama Ayah -->

                                        <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <span class="input-group-text">👨‍🎓 Pendidikan Ayah</span>
                                            </div>
                                            <input class="form-control" list="datalistOptionsOccupationStudy"
                                                id="exampleDataList" placeholder="Masukkan Pendidikan Terakhir..."
                                                name="pendidikan_ayah" value="{{ old('pendidikan_ayah') }}" required>
                                            <datalist id="datalistOptionsOccupationStudy">
                                                <option value="SD"></option>
                                                <option value="SMP/MTS"></option>
                                                <option value="SMA/MA/SMK"></option>
                                                <option value="D3"></option>
                                                <option value="D4"></option>
                                                <option value="S1"></option>
                                                <option value="S2"></option>
                                                <option value="S3"></option>
                                            </datalist>
                                        </div>
                                        <!-- /.Pendidikan Ayah -->

                                        <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <span class="input-group-text">👷‍♂️ Pekerjaan Ayah</span>
                                            </div>
                                            <input class="form-control" list="datalistOptionsOccupationWork"
                                                id="exampleDataList" placeholder="Masukkan Jenis Pekerjaan..."
                                                name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required>
                                            <datalist id="datalistOptionsOccupationWork">
                                                <option value="Karyawan Swasta"></option>
                                                <option value="Karyawan BUMN"></option>
                                                <option value="Karyawan BUMD"></option>
                                                <option value="Karyawan Honorer"></option>
                                                <option value="PNS"></option>
                                                <option value="Wirausaha"></option>
                                                <option value="PNS"></option>
                                                <option value="Buruh"></option>
                                                <option value="Asisten Rumah Tangga"></option>
                                                <option value="Seniman"></option>
                                                <option value="Dokter"></option>
                                                <option value="Perawat"></option>
                                                <option value="Bidan"></option>
                                                <option value="Apoteker"></option>
                                                <option value="Pengajar"></option>
                                                <option value="Notaris"></option>
                                            </datalist>
                                        </div>
                                        <!-- /.Pekerjaan Ayah -->

                                        <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <span class="input-group-text">💰 Penghasilan Ayah</span>
                                            </div>
                                            <input class="form-control" list="datalistOptionsOccupationMoney"
                                                id="exampleDataList" placeholder="Masukkan Penghasilan..."
                                                name="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}" required>
                                            <datalist id="datalistOptionsOccupationMoney">
                                                <option value="Kurang dari Rp 1.500.000"></option>
                                                <option value="Rp 1.500.000 - Rp 2.500.000"></option>
                                                <option value="Rp 2.500.000 - Rp 3.500.000"></option>
                                                <option value="Rp 3.500.000 - Rp 4.500.000"></option>
                                                <option value="Lebih dari Rp 4.500.000"></option>
                                            </datalist>

                                        </div>
                                        <!-- /.Penghasilan Ayah -->

                                        <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <span class="input-group-text">📱 No HP Ayah</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Masukkan No HP..."
                                                name="no_hp_ayah" value="{{ old('no_hp_ayah') }}" required>
                                        </div>
                                        <!-- /.no_hp_ayah -->

                                    </div>
                                    <!-- /.card-body Data Ayah -->

                                </div>
                                <!-- /.card -->


                                <!-- Data Ibu -->
                                <div class="col-md-6">

                                    <div class="card-header">
                                        <h3 class="card-title" style="font-weight: bold">Data Ibu</h3>
                                    </div>
                                    <!-- /.card-header -->

                                    <div class="card-body">

                                        <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <span class="input-group-text">👩 Nama Ibu</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nama Ibu"
                                                name="nama_ibu" value="{{ old('nama_ibu') }}" required>
                                        </div>
                                        <!-- /.Nama Ibu -->

                                        <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <span class="input-group-text">👩‍🎓 Pendidikan Ibu</span>
                                            </div>
                                            <input class="form-control" list="datalistOptionsOccupationStudy"
                                                id="exampleDataList" placeholder="Masukkan Pendidikan Terakhir..."
                                                name="pendidikan_ibu" value="{{ old('pendidikan_ibu') }}" required>
                                            <datalist id="datalistOptionsOccupationStudy">
                                                <option value="SD"></option>
                                                <option value="SMP/MTS"></option>
                                                <option value="SMA/MA/SMK"></option>
                                                <option value="D3"></option>
                                                <option value="D4"></option>
                                                <option value="S1"></option>
                                                <option value="S2"></option>
                                                <option value="S3"></option>
                                            </datalist>
                                        </div>
                                        <!-- /.Pendidikan Ibu -->

                                        <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <span class="input-group-text">👷‍♀️ Pekerjaan Ibu</span>
                                            </div>
                                            <input class="form-control" list="datalistOptionsOccupationWorkIbu"
                                                id="exampleDataList" placeholder="Masukkan Jenis Pekerjaan..."
                                                name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required>
                                            <datalist id="datalistOptionsOccupationWorkIbu">
                                                <option value="Ibu Rumah Tangga"></option>
                                                <option value="Karyawan Swasta"></option>
                                                <option value="Karyawan BUMN"></option>
                                                <option value="Karyawan BUMD"></option>
                                                <option value="Karyawan Honorer"></option>
                                                <option value="PNS"></option>
                                                <option value="Wirausaha"></option>
                                                <option value="PNS"></option>
                                                <option value="Buruh"></option>
                                                <option value="Asisten Rumah Tangga"></option>
                                                <option value="Seniman"></option>
                                                <option value="Dokter"></option>
                                                <option value="Perawat"></option>
                                                <option value="Bidan"></option>
                                                <option value="Apoteker"></option>
                                                <option value="Pengajar"></option>
                                                <option value="Notaris"></option>
                                            </datalist>
                                        </div>
                                        <!-- /.Pekerjaan Ibu -->

                                        <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <span class="input-group-text">💰 Penghasilan Ibu</span>
                                            </div>
                                            <input class="form-control" list="datalistOptionsOccupationMoneyIbu"
                                                id="exampleDataList" placeholder="Masukkan Penghasilan..."
                                                name="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}" required>
                                            <datalist id="datalistOptionsOccupationMoneyIbu">
                                                <option value="Kurang dari Rp 1.500.000"></option>
                                                <option value="Rp 1.500.000 - Rp 2.500.000"></option>
                                                <option value="Rp 2.500.000 - Rp 3.500.000"></option>
                                                <option value="Rp 3.500.000 - Rp 4.500.000"></option>
                                                <option value="Lebih dari Rp 4.500.000"></option>
                                            </datalist>

                                        </div>
                                        <!-- /.Penghasilan Ibu -->

                                        <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <span class="input-group-text">📱 No HP Ibu</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Masukkan No HP..."
                                                name="no_hp_ibu" value="{{ old('no_hp_ibu') }}" required>
                                        </div>
                                        <!-- /.no_hp Ibu -->
                                    </div>
                                    <!-- /.card-body Data Ibu -->

                                </div>
                                <!-- /.card Data Ibu -->

                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card Identitas Wali Calon Siswa -->


                    <!-- Kesehatan Calon Siswa -->
                    <div class="card card-default">

                        <div class="card-header">
                            <h3 class="card-title">Kesehatan Calon Siswa</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Penyakit Pasca Lahiran Anak (Jika Ada)</label>
                                        <textarea class="form-control" name="penyakit_anak" rows="2" placeholder="Ceritakan... "></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Makanan pada masa <br> bayi (0-6 bulan)</label>
                                        <select class="form-control" style="width: 100%;" name="makanan_bayi" required>
                                            <option value="">Pilih Makanan Bayi</option>
                                            <option value="asi">Asi</option>
                                            <option value="susuformula">Susu Formula</option>
                                            <option value="other">Lain-nya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Apakah anak menerima obat tertentu disaat kondisi tertentu ?</label>
                                        <select class="form-control" style="width: 100%;" name="penyakit_kambuh"
                                            required>
                                            <option value="">Pilih Ya / Tidak</option>
                                            <option value="ya">Ya</option>
                                            <option value="tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card Kesehatan Calon Siswa -->


                    <!-- Tombol Daftar -->
                    <div class="row my-4">
                        <div class="col">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" name="add" class="btn btn-primary mb-5 active"
                                    data-bs-toggle="button" aria-pressed="true">Buat Pendaftaran</button>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- /.row my-4 -->

                </form>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        // Dalam script JavaScript, cari elemen input berdasarkan nama dan hapus atribut disabled
        // Sebelum form disubmit, fungsi ini akan menghapus atribut disabled, sehingga nilai dapat dikirim ke controller
        const form = document.querySelector('form');
        const inputNamaLengkap = document.querySelector('input[name="nama_lengkap"]');
        form.addEventListener('submit', function() {
            inputNamaLengkap.removeAttribute('disabled');
        });
    </script>
@endsection
