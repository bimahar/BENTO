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
</head>
<body>
    <h1>Checkout</h1>
    @foreach ($items as $item)
        <img src="{{ $item->menu->gambar }}" alt="Product Image" style="max-width: 136px;">
    @endforeach
    
    <button class="btn btn-primary" id="pay-button">Bayar</button>
    
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
              // alert("payment success!"); 
              window.location.href = '/invoice/{{ $item->nomor }}'
              console.log(result);
            },
            onPending: function(result){
              alert("waiting for your payment!"); 
              console.log(result);
            },
            onError: function(result){
              alert("payment failed!"); 
              console.log(result);
            },
            onClose: function(){
              alert('you closed the popup without finishing the payment');
            }
          })
        });
    </script>
</body>
</html>
