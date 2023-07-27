@if(Session::has('success'))
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Info!</strong>
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if(Session::has('error'))
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Info!</strong>
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

{{-- @if(!@empty(session('success')))
  <div class="alert alert-success alert-dismissible fade in" role="alert"> 
    {{ session('success') }}
  </div> 
@endif

@if(!@empty(session('success')))
  <div class="alert alert-success alert-dismissible fade in" role="alert"> 
    {{ session('success') }}
  </div> 
@endif --}}
