@extends('layout.main')

@section('isiPage')
<main class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="text-center mb-4">Invoice for Order #{{ $cashier->id }}</h2>
        <div class="mb-3">
            <p><strong>Nama Pemesan:</strong> {{ $cashier->orderTable->user->name }}</p>
            <p><strong>Special Message:</strong> {{ $cashier->orderTable->special_message ?? 'Tidak ada pesan khusus' }}</p>
            <p><strong>Status Pembayaran:</strong> {{ $cashier->status }}</p>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->menu->nama }}</td>
                        <td>{{ $order->jumlah }}</td>
                        <td>Rp {{ number_format($order->menu->harga * $order->jumlah, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-end mt-4">
            <h3>Total: Rp {{ number_format($orders->sum(function($order) {
                return $order->menu->harga * $order->jumlah;
            }), 2) }}</h3>
        </div>
    </div>
</main>
@endsection
