<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Kopi Bento</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Fonts--}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Style CSS --}}
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>
    {{-- Alpinejs --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="js/app.js">
</head>
<body>
    <div class="container">
        @include('partials.navbar')
        <!--Isi Page-->
        <div>
            <div class="row">
                <a href="{{ route('cart.orderSummary') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Semua Pesanan Anda</a>
                @if($carts->isEmpty())
                <div class="alert alert-warning mt-5" role="alert">
                    Kamu belum ada yang dipesan, yuk pesan!
                </div>
                @else
                <div class="col-md-9">
                        @foreach ($carts as $cart)
                            <section class="cart">
                                <div class="container rounded-3 mt-5" style="background-color: #efefef">
                                    {{-- Baris Header Menu --}}
                                    <div class="d-flex justify-content-between pt-2">
                                        <div class="namaMenu fs-5 fw-bold ">
                                            {{ $cart->menu->nama }}
                                        </div>
                                        <div class="hapusMenu">
                                            <!-- Form untuk menghapus item -->
                                            <form action="{{ route('cart.destroy', $cart->menu_id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="trash-icon " style="border:none ; background-color: transparent;"><i data-feather='trash-2'></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="line w-10"></div>
                                    {{-- Akhir Baris Header Menu --}}
                                    {{-- Gambar Menu --}}
                                    <div class="gambarMenu col-10 mt-4">
                                        <img src="{{ $cart->menu->gambar }}" alt="Product Image" style="max-width: 136px;">
                                    </div>
                                    {{-- Akhir Gambar Menu --}}
                                    {{-- Tombol dan Harga Menu --}}
                                    <div class="row ms-0">
                                        <span class="rounded-3 col-3 my-3"  style="border:1px solid #007200">
                                            <div class="row d-flex">
                                                <!-- Form untuk mengurangi jumlah -->
                                                <div class="col-sm-4 d-flex justify-content-center">
                                                    <form action="{{ route('cart.reduceQuantity') }}" method="POST" class="">
                                                        @csrf
                                                        <input type="hidden" value="{{ $cart->menu_id }}" name="menu_id">
                                                        <button class="minus-icon" style="border:none ; background-color: transparent;" >
                                                            <i data-feather='minus'></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <!-- Akhir Form untuk mengurangi jumlah -->
                                                <!-- Jumlah item -->
                                                <div class="jumlah col-sm-4 text-center " id="jumlahMenu">
                                                    {{ $cart->jumlah }}
                                                </div>
                                                <!-- Akhir Jumlah item -->
                                                <!-- Form untuk menambah jumlah -->
                                                <div class="col-sm-4 d-flex justify-content-center">
                                                    <form action="{{ route('cart.increaseQuantity') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $cart->menu_id }}" name="menu_id">
                                                        <button class="plus-icon" style="border:none ; background-color: transparent;"><i data-feather='plus'></i></button>
                                                    </form>
                                                </div>
                                                <!-- Akhir Form untuk menambah jumlah -->
                                            </div>
                                        </span>
                                        {{-- Harga --}}
                                        <div class="hargaMenu col-9 text-end pt-3">
                                            Rp {{ $cart->menu->harga }}
                                        </div>
                                        {{-- Akhir Harga --}}
                                    </div>
                                    {{-- Akhir Tombol dan Harga Menu --}}
                                </div>
                            </section>
                        @endforeach
                </div>
                <!-- Kolom kanan untuk menampilkan total harga dan pesanan tambahan -->
                <div class="col-md-3">
                    <div class="card mt-5">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Rincian Harga</h5>
                            <p>Total Harga: Rp {{ number_format($totalPrice, 2) }}</p>
                            <p>Total Menu: {{ $totalItems }}</p>
                            @if(session('discountAmount'))
                                <p>Diskon: Rp {{ number_format(session('discountAmount'), 2) }}</p>
                                <p>Total Setelah Diskon: Rp {{ number_format($totalPrice - session('discountAmount'), 2) }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Form untuk kode diskon -->
                    <div class="diskon tambahan mt-4">
                        <form action="{{ route('cart.applyDiscount') }}" method="POST">
                            @csrf
                            <label for="discount" class="form-label mt-2">Kode Diskon</label>
                            <input class="form-control" id="discount" name="discount" placeholder="Masukkan Kode Diskon">
                            <div class="d-grid gap-2 mt-2">
                                <button type="submit" class="btn btn-primary" id="apply-discount-button">Terapkan Diskon</button>
                            </div>
                        </form>
                    </div>
                    <!-- Akhir Form untuk kode diskon -->

                    <!-- Form untuk pesan khusus -->
                    <div class="pesan tambahan mt-4">
                        <form action="{{ route('cart.storeOrder') }}" method="POST">
                            @csrf
                            <label for="special_message" class="form-label">Catatan</label>
                            <textarea class="form-control" id="special_message" name="special_message" placeholder="Masukkan pesan khusus untuk pesanan Anda di sini"></textarea>
                            <div class="d-grid gap-2 mt-2">
                                <button type="submit" class="btn btn-primary" id="pay-button">Pesan</button>
                            </div>
                        </form>
                    </div>
                    <!-- Akhir Form untuk pesan khusus -->
                </div>
                <!-- Akhir Kolom kanan untuk menampilkan total harga dan pesanan tambahan -->
                @endif
            </div>
        </div>

        <!--Akhir Isi Page-->
        <!--Footer-->
        @include('partials.footer')
        <!--Akhir Footer-->
    </div>
    <script>
        feather.replace()
    </script>
</body>
</html>
