@extends('layoutdashboard.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Akun Siswa  (Total : {{ $getRecord->total() }})</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Cari Siswa</h3>
              </div>
              <form action="" method="get">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Nama</label>
                      <input type="text" value="{{ Request::get('name') }}" class="form-control" name="name" placeholder="Nama">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Email</label>
                      <input type="text" value="{{ Request::get('email') }}" class="form-control" name="email" placeholder="Email">
                    </div>  
                    <div class="form-group col-md-3">
                      <label>Date</label>
                      <input type="date" value="{{ Request::get('date') }}" class="form-control" name="date" placeholder="Date">
                    </div>  
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" type="submit" style="margin-top: 30px">Cari</button>
                      <a href="{{ url('admin/siswa/list-siswa') }}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            @include('_messages')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Siswa TK Sevilla</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Created at</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value)
                        <tr>
                          <td>{{ $value->id }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ date('m-d-Y H:i A', strtotime($value->created_at)) }}</td>
                          <td>
                            <a href="{{ url('admin/admin/edit-admin/' .$value->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/admin/delete-admin/' .$value->id) }}" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float: right">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
              </div>
              <!-- /.card-body -->
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