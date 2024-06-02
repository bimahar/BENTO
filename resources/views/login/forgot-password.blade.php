@extends('layout.main')

@section('isiPage')
<div class="container">
  <div class="row justify-content-center ">
    <div class="col-md-5">

      {{-- @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif   --}}

      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif


      <main class="form-signin w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal text-center">Masukkan Anda Email yang Terdaftar</h1> 
        <form action="{{ route('forgot-password-act') }}" method="post" >
          @csrf
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
            <div class="div invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <button class="btn btn-primary w-100 py-2" type="submit">Submit</button>
        </form>
      </main>
    </div>
  </div>
</div>


@endsection