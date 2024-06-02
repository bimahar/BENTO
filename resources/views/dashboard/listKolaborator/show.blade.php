@extends('dashboard.layout.main')

@section('isiDashboard')
    <div class="d-flex pt-3 poppins">
        <p>
            <a href="{{ url('/dashboard/kolaborasi') }}" class="text-black" style="text-decoration:none;">Kolaborator > </a>
            <a href="{{ route('kollab', $item->id) }}" class="text-black" style="text-decoration:none;">{{ $item->organisasi }} ></a>
        </p>
    </div>
    <div   div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $item->nama }}</h1>
        <h6 class="fw-bold">Tanggal Pengajuan : {{ $item->tanggal }}</h6>
    </div>

    <div class='d-flex flex-column pt-3'>
        <h5>Identitas</h5>
        <div class="card mb-3 p-2">
            <h6><strong> Nama :</strong> {{ $item->nama }}</h6>
            <h6><strong> Organisasi :</strong> {{ $item->organisasi }}</h6>
            <h6><strong> Jabatan :</strong> {{ $item->jabatan }}</h6>
            <h6><strong> Email :</strong> {{ $item->email }}</h6>
            <h6><strong> Nomor :</strong> {{ $item->nomor }}</h6>
        </div>
        <h5>Deskripsi</h5>
        <div class="card mb-3 p-2">
            <h6 class="text-start"> {{ $item->deskripsi_singkat }}</h6>
        </div>
        <h5>Surat</h5>
        <div class="card mb-3 p-2">
            <h6 class="text-start"> 
                <a href="{{ route('download.file', $item->id) }}">
                    Surat.pdf
                </a> 
            </h6>
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ url('dashboard/kolaborasi') }}">
                <button type="button" class="btn btn-success">Kembali</button>
            </a>
        </div>
    </div>

@endsection

