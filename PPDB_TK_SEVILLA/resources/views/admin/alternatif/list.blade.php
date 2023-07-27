@extends('layoutdashboard.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Alternatif</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-4">
                        <!-- general form elements -->
                        <div class="card card-default text-blue">
                            <!-- form start -->
                            @include('_messages')
                            <form action="{{ url('admin/alternatif/insertAlternatif') }}" method="post">
                                @csrf
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Tambah Alternatif</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama">Nama Alternatif</label>
                                        <select class="form-control" style="width: 100%;" name="nama_alternatif">
                                            @foreach ($getRecordPendaftaran as $x)
                                                <option value="{{ $x->nama_lengkap }}">{{ $x->nama_lengkap }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-8">
                        <div class="card card-default text-blue">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">List Alternatif</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Alternatif</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $value->nama_alternatif }}</td>
                                                <td>
                                                    <a href="{{ url('admin/alternatif/edit-alternatif/' . $value->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <a href="{{ url('admin/alternatif/delete-alternatif/' . $value->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
