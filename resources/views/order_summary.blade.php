<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <a href="{{ route('cart') }}" class="btn btn-secondary"><i data-feather="arrow-left"></i>Kembali</a>
        <h1>Checkout</h1>
        @forelse ($unpaidOrders as $order)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Order #{{ $order->orderTable->nomor }}</h5>
                    <p>Total Items: {{ $order->qty }}</p>
                    <p>Total Price: Rp {{ number_format($order->total_price, 2) }}</p>
                    <a href="{{ route('cart.checkout', ['id' => $order->id]) }}" class="btn btn-primary">Checkout</a>
                </div>
            </div>
        @empty
            <div class="alert alert-warning mt-3" role="alert">
                Kamu belum melakukan pemesanan, yuk pesan!
            </div>
        @endforelse
    </div>
    <script>
        feather.replace()
    </script>
</body>
</html>
