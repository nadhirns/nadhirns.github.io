@extends('layoutdashboard.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Crips <b style="color: #007bff">{{ $kriteria->nama_kriteria }}</b></h1>
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
              <form action="{{ route('insertCrips') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $kriteria->id }}" name="kriteria_id">
                <div class="card-header bg-primary">
                  <h3 class="card-title">Tambah Crips</h3>
                </div>
                <div class="card-body"> 
                  <div class="form-group">
                    <label for="nama">Nama Crips</label>
                    <input type="text" class="form-control" required name="nama_crips">
                  </div>
                  <div class="form-group">
                    <label for="bobot">Bobot Crips</label>
                    <input type="number" class="form-control" required name="bobot">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                  <a href="{{ url('admin/kriteria/list-kriteria/') }}" class="btn btn-sm btn-success">Kembali</a>
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
                <h3 class="card-title">List Crips</h3>
              </div>
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Crips</th>
                      <th>Bobot</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $no = 1; @endphp
                  @foreach ($crips as $value)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $value->nama_crips }}</td>
                      <td>{{ $value->bobot }}</td>
                      <td>
                        <a href="{{ url('admin/kriteria/edit-crips/' .$value->id) }}" class="btn btn-circle btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="{{ url('admin/kriteria/delete-crips/' .$value->id) }}" class="btn btn-circle btn-danger"><i class="fas fa-trash-alt"></i></a>
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