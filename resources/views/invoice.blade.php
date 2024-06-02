@extends('layout.main')

@section('isiPage')
    <main>
        <h2>Invoice for Order #{{ $cashier->id }}</h2>
        <p><strong>Nama Pemesan:</strong> {{ $cashier->orderTable->user->name }}</p>
        <p><strong>Special Message:</strong> {{ $cashier->orderTable->special_message ?? 'Tidak ada pesan khusus' }}</p>
        <p><strong>Status Pembayaran:</strong> {{ $cashier->status }}</p>
        
        <table>
            <thead>
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

        <h3>Total: Rp {{ number_format($orders->sum(function($order) {
            return $order->menu->harga * $order->jumlah;
        }), 2) }}</h3>
    </main>
@endsection
