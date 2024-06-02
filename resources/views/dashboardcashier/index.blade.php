@extends('dashboardcashier.layouts.main')

@section('container')
<div class="container">
    @if (empty($orders))
        <p>Belum ada pesanan</p>
    @else
        <h2>Detail Pesanan</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Special Message</th>
                    <th>Status Pembayaran</th>
                    <th>Nama Pemesan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $iteration = 1;
                @endphp
                @foreach ($orders as $orderTableId => $order)
                    @foreach ($order['items'] as $index => $item)
                        <tr>
                            @if ($index === 0)
                                <td rowspan="{{ count($order['items']) }}">{{ $iteration }}</td>
                                @php
                                    $iteration++;
                                @endphp
                            @endif
                            <td>{{ $item->menu->nama }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>Rp {{ number_format($item->menu->harga * $item->jumlah, 2) }}</td>
                            @if ($index === 0)
                                <td rowspan="{{ count($order['items']) }}">{{ $order['dashboardCashier']->orderTable->special_message ?? 'Tidak ada pesan khusus' }}</td>
                                <td rowspan="{{ count($order['items']) }}">{{ $order['dashboardCashier']->status }}</td>
                                <td rowspan="{{ count($order['items']) }}">{{ $order['dashboardCashier']->orderTable->user->name ?? 'Tidak ditemukan' }}</td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<style>
  .carousel-image {
    height: 300px;
    object-fit: cover;
  }
</style>
@endsection
