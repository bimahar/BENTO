@extends('layout/main')


@section('isiPage')

    <div class="preAbout mt-3">
        <div class="kotak1">
            <div class="kotak">
            </div>
            <img class="gambar1" src="images/gambar1.png" alt="makanan">
        </div>
        <div class="descAbout">
            <h4 class="italic">Modern Asian & Specialty Coffe.</h4>
            <div>
                <b class = "judul">Temukan Inspirasi Baru di Setiap Sudut Bento Kopi</b>
                <p class= "isi">Nikmati pengalaman unik kami dalam menyajikan kopi berkualitas dan hidangan lezat. Temukan berbagia menu istimewa dan nikmati suasana yang menyenangkan bersama kami. Terima kasih telah berkunjung</p>
                <a class="btn btn-success" href="about" role="button">Read More ></a>
            </div>
        </div>
    </div>

    <div>
        <b class="judul">Menu Fav Bento</b>
    </div>

    @if($user->favorite->isEmpty())
    <div class="card1">
        <div class="card" style="width: 18rem;">
            <img src="images/RiceBowl.png" class="card-img-top" alt="Rice Bowl">
            <div class="card-body">
                <h5 class="card-title bold">Rice Bowl Teriyaki</h5>
                <p class="harga">Rp. 15.000</p>
                <p class="card-text">Menu nasi yang disajikan dengan topping teriyaki.  Teriyaki sendiri biasanya berupa daging ayam, sapi, atau salmon. </p>
                <a href="#" class="btn btn-outline-success">Pesan</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="images/AyamPenyet.png" class="card-img-top" alt="Ayam Penyet">
            <div class="card-body">
                <h5 class="card-title bold">Nasi Ayam Penyet </h5>
                <p class="harga">Rp. 22.000</p>
                <p class="card-text">Hidangan khas Indonesia yang terdiri dari nasi putih, ayam goreng yang dipenyet, sambal pedas, dan berbagai lauk pauk.</p>
                <a href="#" class="btn btn-outline-success">Pesan</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="images/AyamGeprek.png" class="card-img-top" alt="Ayam Geprek">
            <div class="card-body">
                <h5 class="card-title bold">Ayam Geprek Bento</h5>
                <p class="harga">Rp. 20.000</p>
                <p class="card-text">Menu yang berisi sepotong ayam goreng tepung yang dipenyet dengan ulekan atau cobek hingga pipih dan memiliki rasa yang pedas.</p>
                <a href="#" class="btn btn-outline-success">Pesan</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="images/SambalMatah.png" class="card-img-top" alt="Sambal Matah">
            <div class="card-body">
                <h5 class="card-title bold">Rice Bowl Sambal Matah</h5>
                <p class="card-text">hidangan nasi yang disajikan dalam mangkuk dengan topping ayam suwir, sambal matah, dan berbagai pelengkap.</p>
                <p class="harga">Rp. 15.000</p>
                <a href="#" class="btn btn-outline-success">Pesan</a>
            </div>
        </div>
    </div>
    @else
    
    <div class="card1">
        @foreach ($favorites as $favorite)
            <div class="card" style="width: 18rem;">
                <div class="card h-100" data-price="{{ $favorite->menu->harga }}">
                    <img src="{{ $favorite->menu->gambar }}"
                        style="object-fit:cover;  width: 100%; object-position: 50%;  "
                        class="card-img-top" alt="kopi">
                    <div class="card-body">
                        <div class="grid2">
                            <div >
                                <h3 class="card-title">{{ $favorite->menu->nama }}</h3>
                            </div>
                            <div class="love">
                                @if($user->favorite->contains('menu_id', $favorite->menu->id))
                                    <form action="{{ route('destroyMenu', $favorite->menu->id) }}" method='POST'>
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" value="{{ $favorite->menu->id }}" name="menu_id">
                                        <button type="submit" class="px-0 rounded" style="background-color: transparent; border: none; padding: 0; margin=0;" id='unLove'> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16" style="margin=0;">
                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <form action='{{ route('storeMenu', $favorite->menu->id) }}' method='POST'>
                                        @csrf
                                        <input type="hidden" value="{{ $favorite->menu->id }}" name="menu_id">
                                        <button type="submit" class="px-2 rounded" style="background-color: transparent; border: none; padding: 0;" id='Love'> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16" >
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <p class="harga">Rp. {{ number_format($favorite->menu->harga, 0, ',', '.') }}
                        <p class="card-text">{{ $favorite->menu->deskripsi }}</p>
                        </p>
                        <div class="d-grid">
                            <button class="btn btn-success" type="button">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
    <div class="preBook">
        <div class="kotak1">
            <img class="gambar2" src="images/gambar2.png" alt="Booking">
            <img class="rectangle" src="images/Rectangle2.png" alt="Booking">
        </div>
        <div class="descAbout">
            <div class="tes">
                <b class = "judul">"Having an afternoon tea with best friend is all theraphy you need” - anonymous</b>
                <p class= "isi">Bayangkan memiliki waktu berkualitas dengan keluarga dan teman di tempat yang nyaman dan sepenuhnya estetis di mana Anda dapat menikmati berbagai makanan fusi Asia dan kopi biji pilihan terbaik.</p>
                <a class="btn btn-success" href="reservasi" role="button">Booking Now ></a>
            </div>
        </div>
    </div>

@endsection