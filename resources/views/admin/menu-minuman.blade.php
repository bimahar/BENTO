<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu BentoKopi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .menu .card {
            background-color: #f1f5f9;
        }

        .card-img-top {
            height: 120px;
        }
    </style>
</head>

<body>
    <main>
        <header class="px-5 py-3">
            <form action="{{ route('admin.logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </header>
        <section class="p-5">
            <div>
                <h2>Minuman</h2>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 g-2 g-md-5 menu">
                @foreach ($menus as $menu)
                    <div class="col">
                        <div class="card h-100 p-3 border-0">
                            <h3 class="card-title mb-0">{{ $menu->nama }}</h3>
                            <div class="card-body p-0">
                                <img src="{{ $menu->gambar }}"
                                    style="object-fit:cover;  width: 100%; object-position: 50%; " class="card-img-top"
                                    alt="kopi">
                                <div class="collapse position-relative" id="collapseExample{{ $menu->id }}">
                                    <div class="card card-body position-absolute top-0 bg-white border borer-2 border-dark"
                                        style="width: 100%">
                                        <p>Hapus Menu?</p>
                                        <div class="row row-cols-md-2 g-2 g-md-3">
                                            <div class="col">
                                                <div class="d-grid">
                                                    <button class="btn btn-danger" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseExample{{ $menu->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapseExample{{ $menu->id }}">
                                                        Batal
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <form action="{{ route('admin.menu.destroy', ['id' => $menu->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <!-- buat hapus -->
                                                    @method('DELETE')
                                                    <div class="d-grid">
                                                        <button class="btn btn-success" type="submit">Iya</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="fw-bold m-0">Rp. {{ number_format($menu->harga, 0, ',', '.') }}
                                <p>{{ $menu->deskripsi }}</p>
                                </p>
                            </div>
                            <div class="card-footer p-0 bg-none border-0">
                                <div class="row row-cols-md-2 g-2 g-md-3">
                                    <div class="col">
                                        <div class="d-grid">
                                            <button class="btn btn-outline-success" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseExample{{ $menu->id }}"
                                                aria-expanded="false"
                                                aria-controls="collapseExample{{ $menu->id }}">
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-grid">
                                            <button class="btn btn-outline-success btn-edit" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" data-id="{{ $menu->id }}"
                                                data-nama="{{ $menu->nama }}" data-kategori="{{ $menu->kategori }}"
                                                data-gambar="{{ $menu->gambar }}"
                                                data-deskripsi="{{ $menu->deskripsi }}"
                                                data-jenis="{{ $menu->jenis }}" data-harga="{{ $menu->harga }}"
                                                type="button">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="updateForm" method="post" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id" class="form-label">Data ID</label>
                                <input type="text" class="form-control" id="id" name="id"
                                    placeholder="Masukkan ID" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Menu</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan Nama Menu" required>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="jenis" id="jenis"
                                    aria-label="Default select example" required>
                                    <option selected>Jenis Menu</option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori"
                                    placeholder="Masukkan Kategori Menu" required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                    placeholder="Masukkan Deskripsi Menu" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga"
                                    placeholder="Masukkan Harga Menu" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('script/menu.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            document.querySelectorAll('.btn-edit').forEach(item => {
                item.addEventListener('click', event => {
                    var id = event.currentTarget.getAttribute('data-id');
                    var nama = event.currentTarget.getAttribute('data-nama');
                    var kategori = event.currentTarget.getAttribute('data-kategori');
                    var gambar = event.currentTarget.getAttribute('data-gambar');
                    var deskripsi = event.currentTarget.getAttribute('data-deskripsi');
                    var harga = event.currentTarget.getAttribute('data-harga');
                    var jenis = event.currentTarget.getAttribute('data-jenis');
                    document.getElementById('nama').value = nama;
                    document.getElementById('id').value = id;
                    document.getElementById('kategori').value = kategori;
                    document.getElementById('deskripsi').value = deskripsi;
                    document.getElementById('harga').value = harga;
                    document.getElementById('jenis').value = jenis;
                    myModal.show();
                });
            });
        });
        document.getElementById('updateForm').addEventListener('submit', function(event) {
            var id = document.getElementById('id').value;
            this.action = `{{ route('admin.update.menu', ['id' => '`+ id + `']) }}`;
        });
    </script>

</body>

</html>
