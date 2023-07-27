@extends('layoutdashboard.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Alternatif {{ $getRecord->nama_alternatif }} </h1>
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
              <form action="" method="post">
                @csrf
                {{-- @method('put') --}}
                <div class="card-header bg-primary">
                  <h3 class="card-title">Edit Alternatif {{ $getRecord->nama_alternatif }}</h3>
                </div>
                <div class="card-body"> 
                  <div class="form-group">
                    <label for="nama">Nama Alternatif</label>
                    <input type="text" class="form-control" required name="nama_alternatif" value="{{ $getRecord->nama_alternatif }}">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{ url('admin/alternatif/list-alternatif') }}" class="btn btn-sm btn-success">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection