@extends('layout/main')

@section('isiPage')
    <main>
        <section class="container-lg">
            <div class="row">
                <div class="col-sm-6 pt-3">
                    Total item yang dipesan : {{ $totalItems }}
                </div>
                <div class="col-sm-6 ms-auto">
                    <header>
                        <nav class="navbar">
                            <div class="container-lg">
                                <a class="">Bento kopi</a>
                                <form class="d-flex" action="{{ route('searchMenu') }}" method="GET" role="search">
                                    <input class="form-control me-2" type="search" name="query" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success d-none" type="submit">Searchs</button>
                                </form>
                            </div>
                        </nav>
                    </header>
                </div>
            </div>
            <div class=" row row-cols-2 row-cols-md-6 g-4">
                <div class="col d-grid">
                    <a href="{{ route('allmenu') }}" class="btn tablinks btnsemua px-4 py-1 active"
                        data-tab="semua">Semua</a>
                </div>
                @foreach ($categories as $category)
                    <div class="col d-grid">
                        <a href="{{ route('showmenubycategory', ['kategori' => strtolower($category)]) }}"
                            class="btn tablinks btn{{ strtolower($category) }} px-4 py-1"
                            data-tab="{{ strtolower($category) }}">{{ $category }}</a>
                    </div>
                @endforeach
                <div class="col-grid">
                    <select class="form-select" aria-label="Default select example" onchange="location = this.value;">
                        <option value="{{ route('sortmenu', ['option' => 'null']) }}"
                            @if ($sort == 'null') selected @endif>Sort By</option>
                        <option value="{{ route('sortmenu', ['option' => 'termurah']) }}"
                            @if ($sort == 'termurah') selected @endif>Termurah</option>
                        <option value="{{ route('sortmenu', ['option' => 'termahal']) }}"
                            @if ($sort == 'termahal') selected @endif>Termahal</option>
                    </select>
                </div>
            </div>
        </section>
        @foreach ($categories as $category)
            @if ($menus->where('kategori', $category)->isEmpty())
                <!-- Tidak ada menu untuk kategori ini, tidak perlu menampilkan h2 -->
            @else
                <section>
                    <div id="{{ $category }}" class="tabcontent tab{{ strtolower($category) }} py-2">
                        <div class="container-lg">
                            <h2>{{ $category }}</h2>
                            <div class="row row-cols-2 row-cols-md-4 g-2 g-md-3">
                                @foreach ($menus->where('kategori', $category) as $menu)
                                    <div class="col">
                                        <div class="card h-100" data-price="{{ $menu->harga }}">
                                            <img src="{{ $menu->gambar }}"
                                                style="object-fit:cover;  width: 100%; object-position: 50%;  "
                                                class="card-img-top" alt="kopi">
                                            <div class="card-body">
                                                <h3 class="card-title">{{ $menu->nama }}</h3>
                                                <p class="card-text">{{ $menu->deskripsi }}</p>
                                                <p class="card-text">Rp. {{ number_format($menu->harga, 0, ',', '.') }}
                                                </p>
                                                <form action="{{ route('cart.store', $menu->id) }}" method="POST">
                                                    @csrf
                                                    <div class="d-grid">
                                                        <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                        <button class="btn btn-success" type="submit">Tambah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('script/menu.js') }}"></script>
@endsection
