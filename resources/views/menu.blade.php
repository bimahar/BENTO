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
                                <a class=""></a>
                                <form class="" action="{{ route('searchMenu') }}" method="GET" role="search">
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
                            data-tab="{{ strtolower($category) }}">{{ $category }}</a
                            href="{{ route('showmenubycategory', ['kategori' => strtolower($category)]) }}">
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
                                                <div class="row">
                                                    <div class="col">
                                                        <h3 class="card-title">{{ $menu->nama }}</h3>
                                                    </div>
                                                    <div class="col d-flex justify-content-end">
                                                        @if($user->favorite->contains('menu_id', $menu->id))
                                                            <form action="{{ route('destroyMenu', $menu->id) }}" method='POST'>
                                                                @method('DELETE')
                                                                @csrf
                                                                <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                                <button wire:click="toggleFavorite({{ $menu->id }})" type="submit" class="px-2 rounded" style="background-color: transparent; border: none; padding: 0;" id='unLove'> 
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form action='{{ route('storeMenu', $menu->id) }}' method='POST'>
                                                                @csrf
                                                                <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                                <button wire:click="toggleFavorite({{ $menu->id }})" type="submit" class="px-2 rounded" style="background-color: transparent; border: none; padding: 0;" id='Love'> 
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                                <p class="harga">Rp. {{ number_format($menu->harga, 0, ',', '.') }}
                                                <p class="card-text">{{ $menu->deskripsi }}</p>
                                                </p>
                                                <form action="{{ route('cart.store', $menu->id) }}" method="POST"  >
                                                    @CSRF
                                                    <div class="d-grid">
                                                        <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                        <button class="btn btn-success" type="submmit">Tambah</button>
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

{{-- @extends('layout/main')


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
                                <a class=""></a>
                                <form class="" action="{{ route('searchMenu') }}" method="GET" role="search">
                                    <input class="form-control me-2" type="search" name="query" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success d-none" type="submit">Searchs</button>
                                </form>
                            </div>
                        </nav>
                </div>
            </div>
            </header>
            <div class=" row row-cols-2 row-cols-md-6 g-4">
                <div class="col d-grid">
                    <a href="{{ route('allmenu') }}" class="btn tablinks btnsemua px-4 py-1 active"
                        data-tab="semua">Semua</a>
                </div>
                @foreach ($categories as $category)
                    <div class="col d-grid">
                        <a href="{{ route('showmenubycategory', ['kategori' => strtolower($category)]) }}"
                            class="btn tablinks btn{{ strtolower($category) }} px-4 py-1"
                            data-tab="{{ strtolower($category) }}">{{ $category }}</a
                            href="{{ route('showmenubycategory', ['kategori' => strtolower($category)]) }}">
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
                                                <form action="{{ route('cart.store', $menu->id) }}" method="POST"  >
                                                    @CSRF
                                                    <div class="d-grid">
                                                        <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                        <button class="btn btn-success" type="submmit">Tambah</button>
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
@endsection --}}