@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>error!</strong> {{session('error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>info!</strong> {{session('info')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success!</strong> {{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>warning!</strong> {{session('warning')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> {{$error}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endforeach
@endif