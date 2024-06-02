@extends('dashboardcashier.layouts.main')

@section('container')
<div class="pt-3 pb-2 mb-3">
  <div class="row">
    <div class="col-8">
      <div class="container">
        <h1>Masukkan Kode Diskon</h1>
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        <form action="{{ route('discounts.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="code" class="form-label">Kode Diskon</label>
            <input type="text" class="form-control" id="code" name="code" required>
          </div>
          <div class="mb-3">
            <label for="amount" class="form-label">Potongan Harga</label>
            <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
          </div>
          <button type="submit" class="btn btn-primary">Simpan Diskon</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
