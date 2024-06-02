@extends('layout/main')


@section('isiPage')
    <div class="row mb-3 justify-content-center text-center">
        <div class="col-md-9">
            <h1 class="mt-4">Apply Lowongan {{ $item->judul }}</h1>
        </div>
    </div>
    <!-- Three columns of text below the carousel -->
    <div class="row justify-content-center">
        <div class="col-md-9">
            <form action="{{ route('lowongan.proses', $item->id) }}" method="post" enctype="multipart/form-data"
                id="formApply">
                @csrf
                <div class='form-group mb-3'>
                    <label for='nama' class='mb-2'>Nama</label>
                    <input type='text' name='nama' id='nama'
                        class='form-control @error('nama') is-invalid @enderror' value='{{ old('nama') }}'>
                    @error('nama')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class='form-group mb-3'>
                    <label for='jenis_kelamin' class="mb-2">Jenis Kelamin</label>
                    <select name='jenis_kelamin' id='jenis_kelamin'
                        class='form-control @error('jenis_kelamin') is-invalid @enderror'>
                        <option value='' selected disabled>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" @selected(old('jenis_kelamin') === 'Laki-laki')>Laki-laki</option>
                        <option value="Perempuan" @selected(old('jenis_kelamin') === 'Perempuan')>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class='form-group mb-3'>
                    <label for='tempat_lahir' class='mb-2'>Tempat Lahir</label>
                    <input type='text' name='tempat_lahir' id='tempat_lahir'
                        class='form-control @error('tempat_lahir') is-invalid @enderror' value='{{ old('tempat_lahir') }}'>
                    @error('tempat_lahir')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class='form-group mb-3'>
                    <label for='tanggal_lahir' class='mb-2'>Tanggal Lahir</label>
                    <input type='date' name='tanggal_lahir' id='tanggal_lahir'
                        class='form-control @error('tanggal_lahir') is-invalid @enderror'
                        value='{{ old('tanggal_lahir') }}'>
                    @error('tanggal_lahir')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class='form-group mb-3'>
                    <label for='alamat' class='mb-2'>Alamat</label>
                    <textarea name='alamat' id='alamat' cols='30' rows='3'
                        class='form-control @error('alamat') is-invalid @enderror'>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class='form-group mb-3'>
                    <label for='nomor_hp' class='mb-2'>Nomor HP</label>
                    <input type='text' name='nomor_hp' id='nomor_hp'
                        class='form-control @error('nomor_hp') is-invalid @enderror' value='{{ old('nomor_hp') }}'>
                    @error('nomor_hp')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class='form-group mb-3'>
                    <label for='email' class='mb-2'>Email</label>
                    <input type='text' name='email' id='email'
                        class='form-control @error('email') is-invalid @enderror' value='{{ old('email') }}'>
                    @error('email')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class='form-group mb-3'>
                    <label for='pengalaman_kerja' class='mb-2'>Pengalaman Kerja (Tahun)</label>
                    <input type='number' name='pengalaman_kerja' id='pengalaman_kerja'
                        class='form-control @error('pengalaman_kerja') is-invalid @enderror'
                        value='{{ old('pengalaman_kerja') }}'>
                    @error('pengalaman_kerja')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class='form-group mb-3'>
                    <label for='foto' class='mb-2'>Pas Foto</label>
                    <input type='file' name='foto' id='foto'
                        class='form-control @error('foto') is-invalid @enderror' value='{{ old('foto') }}'>
                    @error('foto')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class='form-group mb-3'>
                    <label for='cv' class='mb-2'>CV</label>
                    <input type='file' name='cv' id='cv'
                        class='form-control @error('cv') is-invalid @enderror' value='{{ old('cv') }}'>
                    @error('cv')
                        <div class='invalid-feedback'>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btnApply btn-primary">Apply</button>
                </div>
            </form>
        </div>
    </div><!-- /.row -->
@endsection
@push('scripts')
    @if (session('success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    @endif
    <script>
        $(function() {
            $('.btnApply').on('click', function() {
                Swal.fire({
                    title: "Apakah kamu yakin?",
                    text: "Kamu akan melamar pekerjaan di posisi ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yakin!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#formApply').submit();
                    }
                });
            })
        })
    </script>
@endpush
