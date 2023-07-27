@extends('layoutdashboard.app')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Informasi Pembayaran</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Section Header -->


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Cari Pembayaran</h3>
                            </div>
                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>No Pembayaran</label>
                                            <input type="text" value="{{ Request::get('no_pembayaran') }}"
                                                class="form-control" name="no_pendaftaran" placeholder="nomor pembayaran">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px">Cari</button>
                                            <a href="{{ url('admin/data-pembayaran') }}" class="btn btn-success"
                                                style="margin-top: 30px">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('_messages')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Pembayaran TK Sevilla</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" id="cetak">
                                @csrf
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Pembayaran</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Status</th>
                                            <th class="text-center">Bukti Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($viewData as $x)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $x->id_pembayaran }}</td>
                                                <td>{{ $x->tanggal_pembayaran }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            @if ($x->status == 'Dibayar')
                                                                <span class="badge badge-success">Dibayar<span
                                                                        class="ms-1 fa fa-check"></span>
                                                                @elseif($x->status == 'Belum Bayar')
                                                                    <span class="badge badge-warning">Belum
                                                                        Dibayar<span class="ms-1 fas fa-stream"></span>
                                                                    @elseif($x->status == 'Tidak Sah')
                                                                        <span class="badge badge-danger">Tidak Sah<span
                                                                                class="ms-1 fa fa-ban"></span>
                                                                        @elseif ($x->status == 'Gratis')
                                                                            <span class="badge badge-success">Gratis<span
                                                                                    class="ms-1 fa fa-check"></span>
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
                                                                            href="{{ url('admin/data-pembayaran/paid-payment/' . $x->id_pembayaran) }}">Bayar</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="{{ url('admin/data-pembayaran/unpaid-payment/' . $x->id_pembayaran) }}">Belum
                                                                            Bayar</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="{{ url('admin/data-pembayaran/invalid-payment/' . $x->id_pembayaran) }}">Tidak
                                                                            Sah</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    @if ($x->bukti_pembayaran != null)
                                                        <a class="btn btn-light shadow btn-xs sharp me-1"
                                                            title="Proof of Payment" href="{{ $x->bukti_pembayaran }}"
                                                            download><i class="fa fa-file-alt"></i></a>
                                                    @else
                                                        @if ($x->status == 'Gratis')
                                                            Gratis Biaya Pendaftaran
                                                        @else
                                                            Tidak tersedia
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="btn btn-primary shadow btn-xs sharp me-1" title="Edit"
                                                            data-toggle="modal"
                                                            data-target=".edit{{ $x->id_pembayaran }}"><i
                                                                class="fa fa-pencil-alt"></i></a>
                                                        <a class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"
                                                                data-toggle="modal"
                                                                data-target=".delete{{ $x->id_pembayaran }}"></i></a>
                                                        <div class="modal fade delete{{ $x->id_pembayaran }}"
                                                            tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Hapus Data</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-dismiss="modal">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center"><i
                                                                            class="fa fa-trash"></i><br> Apakah anda
                                                                        yakin ingin menghapus data
                                                                        ini?<br>{{ $x->id_pembayaran }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger light"
                                                                            data-dismiss="modal">Batalkan</button>
                                                                        <a href="delete-payment/{{ $x->id_pembayaran }}">
                                                                            <button type="submit"
                                                                                class="btn btn-danger shadow">
                                                                                Ya, Hapus Data!
                                                                            </button></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>

                                            <div class="modal fade edit{{ $x->id_pembayaran }}" tabindex="-1"
                                                role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Sunting Pembayaran</h5>
                                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="update-payment/{{ $x->id_pembayaran }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="userid"
                                                                    value="{{ Auth::user()->id }}">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xl-12">
                                                                            <label for="iduser"> ID
                                                                                Pembayaran</label>
                                                                            <input type="text" class="form-control"
                                                                                id="nama"
                                                                                value="{{ $x->id_pembayaran }}"
                                                                                name="id" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xl-4">
                                                                            <label for="iduser"> ID Pendaftaran
                                                                            </label>
                                                                            <select class="form-control wide"
                                                                                title="id pendaftaran"
                                                                                name="id_pendaftaran" required>
                                                                                <option value="{{ $x->id_pendaftaran }}"
                                                                                    selected>
                                                                                    {{ $x->pendaftaran->id_pendaftaran }}
                                                                                    ||
                                                                                    {{ $x->pendaftaran->nama_siswa }}
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-xl-8">
                                                                            <label for="iduser">Status</label>
                                                                            <select
                                                                                class="default-select form-control wide"
                                                                                title="status" name="status" required>
                                                                                <option value="{{ $x->status }}"
                                                                                    selected>
                                                                                    {{ $x->status }}</option>
                                                                                <option value="Dibayar">Dibayar
                                                                                </option>
                                                                                <option value="Belum Bayar">Belum Bayar
                                                                                </option>
                                                                                <option value="Tidak Sah">Tidak Sah
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="iduser">Bukti Pembayaran</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Upload</span>
                                                                        <div class="form-file">
                                                                            <input type="file"
                                                                                class="form-file-input form-control"
                                                                                name="bukti">
                                                                            <input type="hidden"
                                                                                class="form-file-input form-control"
                                                                                name="pathnya"
                                                                                value="{{ $x->bukti_pembayaran }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer border-top-0 d-flex">
                                                                    <button type="button" class="btn btn-danger light"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" name="add"
                                                                        class="btn btn-primary">Perbaharui
                                                                        Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
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

        </section>
        <!-- /.Section Content -->



    </div>
@endsection
