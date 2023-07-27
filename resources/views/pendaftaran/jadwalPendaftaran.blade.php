@extends('layouts.head')
@extends('layouts.ui')

@section('title')
PPDB
@endsection

@section('hero')
<section id="hero" style="background-color: rgb(213, 239, 255)" class="d-flex align-items-center mb-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column align-items-center text-center">
          <h1 style="color: #3498DB"  data-aos="fade-up">PENERIMAAN PESERTA DIDIK BARU</h1>
          <h1 style="color: #3498DB" data-aos="fade-up" data-aos-delay="400">TK ISLAM SEVILLA AL FATAH</h1>
          <h2 style="color: #787878" data-aos="fade-up" data-aos-delay="400">Tahun Ajaran 2023/2024</h2>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('main')
    <section id="jenjang">
    <div class="container pt-5 mt-3  ">
        <div class="section-title" data-aos="fade-up" >
            <h2>Jenjang Kelas</h2>
        </div>
        <div class="col pt-5 pb-5 d-flex flex-row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="px-4">
                <a href="#jenjang" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#tka">Taman Kanak-kanak A ( TK A )</a>
            </div>
            <div class="px-4">
                <a href="#jenjang" class="btn-get-started scrollto"  data-bs-toggle="modal" data-bs-target="#tkb">Taman Kanak-kanak B ( TK B )</a>
            </div>
        </div>
        <div class="col d-flex flex-row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="px-4">
                <a href="#jenjang" class="btn-get-started scrollto"  data-bs-toggle="modal" data-bs-target="#kb">Kelompok Bermain ( KB )</a>
            </div>
        </div>
      </div>

      <!-- Modal -->
        <div class="modal fade" id="tka" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Kelompok A</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center"> min. usia anak 4 - 5 tahun </div>
            </div>
            </div>
        </div>
        <div class="modal fade" id="tkb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Kelompok B</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center"> min. usia anak 5 - 6 tahun </div>
            </div>
            </div>
        </div>
        <div class="modal fade" id="kb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title">Kelompok Bermain</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body text-center"> min. usia anak 3 tahun </div>
            </div>
            </div>
        </div>

  </section>

  <section id="persyaratan">
    <div class="container mt-5">

      <div class="section-title" data-aos="fade-up">
        <h2>Persyaratan</h2>
      </div>

      <div class="row content">
        <div class="col-lg-12 d-flex flex-column align-items-center" data-aos="fade-up" data-aos-delay="150">
            <div class="text-start">
                <ul>
                    <li>Mangisi Formulir Pendaftaran</li>
                    <li>Fotocopy Akte Kelahiran 1 lembar</li>
                    <li>Fotocopy Kartu Keluarga (KK) 1 lembar</li>
                    <li>Foto orang tua ukuran 3 x 4 berwarna <br> masing-masing 1 lembar</li>
                    <li>Foto anak ukuran 3 x 4 berwarna 1 lembar</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="alur">
    <div class="container pt-0 mt-5">
      <div class="section-title" data-aos="fade-up">
        <h2>Alur Pendaftaran</h2>
      </div>
      <div class="row image">
          <div class="col-lg-12 d-flex flex-column align-items-center" data-aos="zoom-in-down" data-aos-delay="150">
            <img style="width: 70%" src="{{ asset('/assets/img/alurDaftar.png') }}" class="img-fluid animated" alt="alur-pendaftaran">
          </div>
        </div>
</section>

<section id="rincian">
    <div class="container pt-0 mt-5">
      <div class="section-title" data-aos="fade-up">
        <h2>Rincian Biaya</h2>
      </div>
      <div class="row d-flex flex-column align-items-center" data-aos="fade-up">
          <div class="col-lg-8">
              <table class="rincian table table-bordered">
                <thead class="table-dark">
                  <tr class="text-center">
                    <th colspan="2">Keterangan</th>
                    <th>Biaya (Rp)</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-active">
                    <td colspan="3" style="color: #838383"><strong>Biaya Masuk</strong></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>SPP bulan Juli 2023 + Snack</td>
                    <td class="text-end">300.000,-</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Bahan Seragam Sekolah (2 stel bahan baju seragam,
                        1 stel baju olah raga)</td>
                    <td class="text-end">450.000,-</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Perlengkapan belajar selama setahun ( buku panduan, Buku do’a <br>
                        dan Hadits, Lembar Kegiatan, crayon, spidol, dll.)</td>
                    <td class="text-end">550.000,-</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Biaya pemeliharaan gedung</td>
                    <td class="text-end">600.000,-</td>
                  </tr>
                  <tr class="table-active">
                    <td colspan="3" style="color: #838383"><strong>Biaya Belajar</strong></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Iqro, Kegiatan Penunjang, Kunjungan-kunjungan</td>
                    <td class="text-end">1.100.000,-</td>
                  </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2"><strong>Total Pembayaran</strong></td>
                    <td class="text-end"><strong>3.000.000,-</strong></td>
                </tr>
                </tfoot>
              </table>
          </div>
      </div>
</section>

<section id="periode">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Periode Pendaftaran</h2>
      </div>

      <div class="row content">
        <div class="col-lg-12 d-flex flex-column align-items-center" data-aos="fade-up" data-aos-delay="150">
            <p><strong>
                1 Maret 2023 &nbsp; ━ &nbsp; 1 Juli 2023
            </strong></p>
        </div>
        <div class="col-lg-12 pt-5 d-flex flex-column text-center" data-aos="fade-up" data-aos-delay="1000">
            @if(Auth::check())
            @if(Auth::user()->user_type == 2)
                <a href="{{ url('/siswa/profile') }}" class="btn-get-started scrollto">Dashboard</a>
            @elseif (Auth::user()->user_type == 1)
                <a href="{{ url('admin/dashboard') }}" class="btn-get-started scrollto">Dashboard</a>
            @endif
            @else
                <a href="{{ url('/registrasi') }}" class="btn-get-started scrollto">Daftar Sekarang</a>
        @endif

        </div>
    </div>
</section>
@endsection
