@extends('dashboard.layout.main')

@section('isiDashboard')
    <div class="d-flex pt-3 poppins text-black">
      <p>
        <a href="{{ url('dashboard/kolaborasi') }}" class="text-black" style="text-decoration:none;">Kolaborator ></a>
      </p>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 poppins fw-bold">
        <h1 class="h2">Daftar Kolaborator</h1>
    </div>

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif  

    <div class="table-responsive small border-top">
        <table class=" table table-striped table-md">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col"></th>
                    <th scope="col">Nama</th>
                    <th scope="col"></th>
                    <th scope="col">Jabatan</th>
                    <th scope="col"></th>
                    <th scope="col">Organisasi</th>
                    <th scope="col"></th>
                    <th scope="col">Tanggal</th>
                    <th scope="col"></th>
                    <th scope="col">Deskripsi Singkat</th>
                    <th scope="col"></th>
                    <th scope="col">Surat</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($item as $items)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="px-3"></td>
                    <td class="px-3">{{ $items->nama }}</td>
                    <td class="px-3"></td>
                    <td class="px-3">{{ $items->jabatan }}</td>
                    <td class="px-3"></td>
                    <td>{{ $items->organisasi }}</td>
                    <td class="px-3"></td>
                    <td>{{ $items->tanggal }}</td>
                    <td class="px-3"></td>
                    <td>
                        <a href="{{ route('showKolaborasi', $items->id) }}" id='detailDeskripsi'> {{ Str::limit($items->deskripsi_singkat, 20, '...') }}</a>
                    </td>
                    <td class="px-3"></td>
                    <td>
                        <a href="{{ route('download.file', $items->id) }}">
                            <button type="button" class="btn btn-success fs-14" id='Unduh'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                </svg>
                                Unduh
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection