<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Midtrans --}}
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

</head>
<body>
    <div class="container">
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">
            <div class="card-body">
              <a href="{{ route('cart.orderSummary') }}" class="btn btn-secondary mb-3"><i data-feather="arrow-left"></i>Kembali</a>
                <h1 class="card-title mb-4">Checkout</h1>
                <div class="d-flex flex-column align-items-start">
                    @foreach ($items as $item)
                        <div class="d-flex mb-3">
                            <img src="{{ $item->menu->gambar }}" alt="Product Image" class="img-thumbnail">
                            <div>
                                <h5>{{ $item->menu->nama }}</h5>
                                <p>Jumlah: {{ $item->jumlah }}</p>
                                <p>Harga: Rp {{ number_format($item->menu->harga, 2) }}</p>
                            </div>
                        </div>
                    @endforeach
                    <button class="btn-pay mt-4" id="pay-button">Bayar</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    window.location.href = '/invoice/{{ $item->nomor }}';
                    console.log(result);
                },
                onPending: function(result){
                    alert("Waiting for your payment!");
                    console.log(result);
                },
                onError: function(result){
                    alert("Payment failed!");
                    console.log(result);
                },
                onClose: function(){
                    alert('You closed the popup without finishing the payment');
                }
            });
        });
    </script>
</body>
</html>
