@extends('layoutdashboard.app')

@section('content')

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>View Pengumuman</h1>
        </div>
      </div>
    </div>
  </section>
  <!-- /.Section Header -->


  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-xl-12">
              <div class="text-end mt-2 mt-sm-0">
                  <button class="btn btn-info waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i class="fa fa-print"></i></button>
              </div>
              <div class="card" id="cetak">
                  <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between flex-wrap">
                          <div class="mb-3">
                              <h4 class="fs-24 font-w700">Pengumuman <br>Pendaftaran Mahasiswa Baru</h4>
                              <span>didaftarkan oleh <strong>{{ auth()->user()->name }}</strong> pada {{ $viewIdPendaftaran->tgl_pendaftaran }}</span>
                          </div>
                          <div class="mb-3">
                              <div class="d-flex align-items-center mb-4 pb-3 justify-content-end flex-wrap">
                                  <div class="me-3">
                                      <h4 class="fs-18 font-w600">PMB PEI</h4>
                                      <span>Kembangkuning, Ubrug, Jatiluhur <br>Purwakarta 41152 Indonesia</span>
                                  </div>
                                  <div class="me-3">
                                      <img src="{{ asset('sipenmaru/images/logo.png') }}" alt="" width="50px">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div>
                        <br>
                          <div class="p-4 border-top">
                            <table class="table mb-0">
                                <thead class="table-light col-lg-12">
                                    <tr>
                                        <td colspan="2">Data Siswa Pendaftar</td>
                                    </tr>
                                </thead>
                                <tbody border="5">
                                    <tr border="5">
                                        <td scope="row" width="70%">
                                            <table>
                                                <tr border="5">
                                                    <th scope="row" width="50%">No Pendafataran</th>
                                                    <td width="50%">{{ $viewIdPendaftaran->id_pendaftaran }}</td>
                                                </tr>
                                                <tr border="5">
                                                    <th scope="row"  width="50%">NISN Siswa</th>
                                                    <td width="50%">{{ $viewIdPendaftaran->nisn }}</td>
                                                </tr>
                                                <tr border="5">
                                                    <th scope="row"  width="50%">Nama Siswa</th>
                                                    <td  width="50%">{{ $viewIdPendaftaran->nama_siswa }}</td>
                                                </tr>
                                                <tr border="5">
                                                    <th scope="row"  width="50%">Asal Sekolah</th>
                                                    <td width="50%">
                                                        {{-- {{$viewIdPendaftaran->skolah->nama_sekolah}} --}}
                                                        @foreach ($viewSekolah as $item)
                                                        @if ($viewIdPendaftaran->sekolah == $item->id)
                                                        {{ $item->nama_sekolah }}
                                                        @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td colspan="4"><img src="{{ url('/'.$viewIdPendaftaran->pas_foto) }}" alt="" width="180px" height="240"></td>
                                    </tr>
                                    <tr border="5">
                                        <th colspan="3" scope="row">
                                            <br>
                                            @foreach ($viewData as $x)
                                                    @if($x->hasil_seleksi == 'TIDAK LULUS' && $x->id_pendaftaran== $viewIdPendaftaran->id)
                                                    <div class="alert alert-danger solid alert-rounded" style="border-radius: 0%">
                                                        <strong>Semangat!</strong> Anda TIDAK LULUS seleksi Penerimaan Mahasiswa Baru, Silahkan coba kembali, Jangan Menyerah Ya!
                                                    </div>
                                                    @elseif ($x->hasil_seleksi == 'LULUS' && $x->id_pendaftaran== $viewIdPendaftaran->id)
                                                        <div class="alert alert-success solid" style="border-radius: 0%">
                                                            <strong>Selamat!</strong> Anda dinyatakan <strong>LULUS</strong> seleksi Penerimaan Mahasiswa Baru
                                                        </div>
                                                        <div class="alert alert-outline-success alert-dismissible fade show" style="border-radius: 0%; margin-top:-1rem">
                                                            <table>
                                                                <tr>
                                                                    <th scope="row">Program Studi Penerima <b>{{$x->prodi->nama_prodi}}</b></th>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    @endif
                                        @endforeach
                                    </th>
                                </tr>
                                <tr>
                                    <td scope="row" style="margin-top:-50px"><small>* Bawa Bukti Penerimaan Saat Melakukan Daftar Ulang</small></td>
                                </tr>
                            </tbody>
                            </table>

                          </div>
                      </div>
                  </div>
            </div>
      </div>
      </div>
    </div>

  </section>
  <!-- /.Section Content -->



</div>

@endsection