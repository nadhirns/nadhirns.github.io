@extends('layoutdashboard.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Penilaian</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- right column -->
                    <div class="col-md-12">
                        <div class="card card-default text-blue">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Penilaian Alternatif</h3>
                            </div>
                            <div class="card-body">
                                @include('_messages')
                                <div class="table-responsive">
                                    <form action="{{ route('insertPenilaian') }}" method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-primary float-right" type="submit">Simpan</button>
                                        <br><br>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Alternatif</th>
                                                    @foreach ($kriteria as $key => $value)
                                                        <th>{{ $value->nama_kriteria }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($alternatif as $alt => $valt)
                                                    <tr>
                                                        <input type="hidden" value="{{ $valt->id }}"
                                                            name="alternatif_id[]">
                                                        <td>{{ $valt->nama_alternatif }}</td>
                                                        @foreach ($kriteria as $key => $value)
                                                            <td>
                                                                <select name="crips_id[{{ $valt->id }}][]"
                                                                    class="form-control">
                                                                    @foreach ($value->crips as $k_1 => $v_1)
                                                                        <option value="{{ $v_1->id }}">
                                                                            {{ $v_1->nama_crips }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td>Tidak ada Data</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
