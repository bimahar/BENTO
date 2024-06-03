@extends('dashboardcashier.layouts.main')

@section('container')
<div class="pt-3 pb-2 mb-3">
  <div class="row">
    <div class="col-8 mx-auto">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">Masukkan Kode Diskon</h1>
          @if(session('insertdiscountsuccess'))
            <div class="alert alert-success">
              {{ session('insertdiscountsuccess') }}
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
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Diskon</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
    .card-title {
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }
    .btn i {
      margin-right: 0.5rem;
    }
    .table-hover tbody tr:hover {
      background-color: #f5f5f5;
    }
  </style>
@endsection
