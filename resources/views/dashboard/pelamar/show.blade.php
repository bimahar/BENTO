@extends('dashboard.layout.main')

@section('isiDashboard')
    <div class="d-flex pt-3 poppins text-black">
      <p>
        <a href="{{ url('dashboard/pelamar') }}" class="text-black" style="text-decoration:none;">Pelamar ></a>
      </p>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 poppins fw-bold">
        <h1 class="h2">Detail Pelamar</h1>
    </div>

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div>
        <h6>Data Pelamar</h6>
        <div>
            <div class="card mb-3 p-2">
                <table>
                    <tr>
                        <td><h6><strong>Nama</strong></h6></td>
                        <td><h6><strong>:</strong></h6></td>
                        <td><h6>{{ $pelamar->nama }}</h6></td>
                    </tr>
                    <tr>
                        <td><h6><strong>Jenis Kelamin</strong></h6></td>
                        <td><h6><strong>:</strong></h6></td>
                        <td><h6>{{ $pelamar->jenis_kelamin }}</h6></td>
                    </tr>
                    <tr>
                        <td><h6><strong>Tempat Lahir</strong></h6></td>
                        <td><h6><strong>:</strong></h6></td>
                        <td><h6>{{ $pelamar->tempat_lahir }}</h6></td>
                    </tr>
                    <tr>
                        <td><h6><strong>Tanggal Lahir</strong></h6></td>
                        <td><h6><strong>:</strong></h6></td>
                        <td><h6>{{ $pelamar->tanggal_lahir }}</h6></td>
                    </tr>
                    <tr>
                        <td><h6><strong>Alamat</strong></h6></td>
                        <td><h6><strong>:</strong></h6></td>
                        <td><h6>{{ $pelamar->alamat }}</h6></td>
                    </tr>
                    <tr>
                        <td><h6><strong>Nomor Hp</strong></h6></td>
                        <td><h6><strong>:</strong></h6></td>
                        <td><h6>{{ $pelamar->nomor_hp }}</h6></td>
                    </tr>
                    <tr>
                        <td><h6><strong>Email</strong></h6></td>
                        <td><h6><strong>:</strong></h6></td>
                        <td><h6>{{ $pelamar->email }}</h6></td>
                    </tr>
                    <tr>
                        <td><h6><strong>Pengalaman Kerja</strong></h6></td>
                        <td><h6><strong>:</strong></h6></td>
                        <td><h6>{{ $pelamar->pengalaman_kerja }} tahun</h6></td>
                    </tr>
                    <tr>
                        <td><h6><strong>Pas Foto</strong></h6></td>
                        <td><h6><strong>:</strong></h6></td>
                        <td>
                            <h6>
                                <a href="{{ route('download.foto', $pelamar->id) }}">
                                    {{ $pelamar->nama }}_pasFoto
                                </a>
                            </h6>
                        </td>
                    </tr>
                    <tr>
                        <td><h6><strong>CV</strong></h6></td>
                        <td><h6><strong>:</strong></h6></td>
                        <td>
                            <h6>
                                <a href="{{ route('download.cv', $pelamar->id) }}">
                                    {{ $pelamar->nama }}_CV
                                </a>
                            </h6>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>

    <h6>Status</h6>
    <form method="POST" action="/dashboard/pelamar/{{ $pelamar->id }}">
    @csrf
    <select class="form-select @error('status') is-invalid @enderror" name='status' id="status" aria-label="Default select example">
        <option value='Belum ditinjau' {{ (old('status') ?? $pelamar->status) == 'Belum ditinjau' ? 'selected' : ''}}>Belum ditinjau</option>
        <option value='Terima' {{ (old('status') ?? $pelamar->status) == 'Terima' ? 'selected' : ''}}>Terima</option>
        <option value='Diproses' {{ (old('status') ?? $pelamar->status) == 'Diproses' ? 'selected' : ''}}>Diproses</option>
        <option value='Tolak' {{ (old('status') ?? $pelamar->status) == 'Tolak' ? 'selected' : ''}}>Tolak</option>
    </select>
    <button class="btn btn-primary mt-3" type="submit">Simpan</button>
    </form>


@endsection