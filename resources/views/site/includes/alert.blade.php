@error('error')
<div class="alert alert-warning alert-dismissible fade show mb-5" role="alert"> {{ $message }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror
@if(session('message'))
<div class="alert alert-success alert-dismissible fade show mb-5" role="alert"> {{ session('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif