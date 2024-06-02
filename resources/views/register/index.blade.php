<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- My Style --}}
    <link rel="stylesheet" href="/css/style.css">
    <title>Bento Kopi | {{ $title }}</title>
</head>
<body>
  {{-- Awal Row --}}
  <div class="row">
    {{-- Awal Bagian Kiri --}}
    <div class="col-lg-4" style="background-color: #67BC67; height: 97vh;">
      <div class="text-center mt-5 pt-5" >
        <img src="img/bentokopi.jpg" width="200px" class="rounded" alt="...">
        <h1 class="fw-bold" style="font-family:Poppins; color:white;">BentoKopi</h1>
      </div>
    </div>
    {{-- Akhir Bagian Kiri --}}

    {{-- Awal Bagian Kanan --}}
    <div class="col-lg-8 ">
      <div class="container form mt-5 pt-5">
        <main class="form-registration w-100">
          <h1 class="h3 fw-normal">Daftar</h1> 
            <small class="d-block mt-3 mb-3">Sudah punya akun? <a href="/login">Masuk</a></small>
            {{-- Form --}}
              <form action="/register" method="post">
                @csrf
                <!-- Baris Pertama -->
                <div class="row gx-3 mb-3 ">
                  <!-- Form Nama Lengkap -->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputFirstName">Nama lengkap</label>
                      <div class="form-floating">
                        <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Name"  value="{{ old('name') }}">
                        <label for="name">Masukkan nama</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                  </div>
                  <!-- Form Nama Pengguna)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputFirstName">Nama Pengguna</label>
                      <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username" placeholder="Username" value="{{ old('username') }}"> 
                        <label for="username">Masukkan Nama Pengguna</label>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                  </div>
              </div>
              <!-- Baris Kedua -->
              <div class="row  gx-3 mb-3">
                <!-- Form Email -->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputFirstName">Email</label>
                    <div class="form-floating">
                      <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                      <label for="email">Masukkan Email </label>
                      @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
                <!-- Form Password -->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputFirstName">Password</label>
                    <div class="form-floating">
                      <input type="password" name="password" class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password" placeholder="Password">
                      <label for="password">Masukkan Password</label>
                      @error('password')
                      <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror  
                    </div>
                </div>
              </div>
              <div class="row  gx-3 mb-3">
                <!-- Form Email -->
                <div class="col-md-6">
                  <label class="small mb-1" for="inputFirstName">Nomor Handphone</label>
                    <div class="form-floating">
                      <input type="tel" name="phone" class="form-control @error('phone')is-invalid @enderror" id="phone" placeholder="Phone" value="{{ old('phone') }}">
                      <label for="phone">Masukkan Nomor Handphone </label>
                      @error('phone')
                      <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
              {{-- Tombol Daftar --}}
              <button class="btn btn-primary mt-3" type="submit">Daftar</button>
            </form>
        </main>
      </div>
    </div>
    {{-- Akhir Bagian Kanan --}}
  </div>
  {{-- Akhir Row --}}
</body>
</html>

