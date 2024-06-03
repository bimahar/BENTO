@extends('dashboardcashier.layouts.main')

@section('container')
<div class="pt-3 pb-2 mb-3">
  <div class="row">
    <div class="col-12">
      <div class="container">
        <h1>Daftar Diskon</h1>
        @if(session('deletediscountsuccess'))
          <div class="alert alert-success">
            {{ session('deletediscountsuccess') }}
          </div>
        @endif
        @if($discounts->isEmpty())
            <div class="alert alert-warning" role="alert">
              Belum ada kode diskon yang dimasukkan.
            </div>
          @else
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Kode Diskon</th>
              <th scope="col">Potongan Harga</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($discounts as $discount)
              <tr>
                <td>{{ $discount->code }}</td>
                <td>{{ $discount->amount }}</td>
                <td>
                  <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
