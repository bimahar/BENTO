@extends('dashboardcashier.layouts.main')

@section('container')
<div class="pt-3 pb-2 mb-3">
  <div class="row">
    <div class="col-8">
      <div class="container">
        <h1>Diskon</h1>
        <div class="mb-3">
          <a href="{{ route('discounts.create') }}" class="btn btn-primary">Masukkan Diskon</a>
          <a href="{{ route('discounts.show') }}" class="btn btn-secondary">Lihat Daftar Diskon</a>
        </div>

        @yield('discountContent')

      </div>
    </div>
  </div>
</div>
@endsection
