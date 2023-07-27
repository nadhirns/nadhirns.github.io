@extends('layoutdashboard.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Perhitungan SAW</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-default text-blue">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Tahap Analisa</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
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
                                                    <td>{{ $valt->nama_alternatif }}</td>
                                                    @if (count($valt->penilaian) > 0)
                                                        @foreach ($valt->penilaian as $key => $value)
                                                            <td>
                                                                {{ $value->crips->bobot }}
                                                            </td>
                                                        @endforeach
                                                    @endif
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>Tidak ada Data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.col -->

                    <div class="col-md-12">
                        <div class="card card-default text-blue">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Tahap Normalisasi</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Alternatif / Kriteria</th>
                                                @foreach ($kriteria as $key => $value)
                                                    <th>{{ $value->nama_kriteria }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($normalisasi as $key => $value)
                                                <tr>
                                                    <td>{{ $key }}</td>
                                                    @foreach ($value as $key_1 => $value_1)
                                                        <td>
                                                            @if ($value[count($value) - 1] != $key_1)
                                                                {{ $value_1 }}
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.col -->

                    <div class="col-md-12">
                        <div class="card card-default text-blue">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Tahap Ranking</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                @foreach ($kriteria as $key => $value)
                                                    <th>{{ $value->nama_kriteria }}</th>
                                                @endforeach
                                                <th rowspan="2" style="text-align: center; padding-bottom: 50px">Total
                                                </th>
                                                <th rowspan="2" style="text-align: center; padding-bottom: 50px">Rank
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>Bobot</th>
                                                @foreach ($kriteria as $key => $value)
                                                    <th>{{ $value->bobot }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($ranking as $key => $value)
                                                <tr>
                                                    <td>{{ $key }}</td>
                                                    @foreach ($value as $key_1 => $value_1)
                                                        <td>{{ number_format($value_1, 1) }}</td>
                                                    @endforeach
                                                    <td>{{ $no++ }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.col -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
