@extends('layout/main')


@section('isiPage')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif  
    <h1 class="mt-4">Lowongan Pekerjaan</h1>
    <div class="row mb-3 text-center">
        <div class="col-md-8 themed-grid-col"></div>
    </div>
    <!-- Three columns of text below the carousel -->
    <div class="row">
        @foreach ($items as $item)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <img class="bd-placeholder-img rounded-circle img-fluid" style="max-height:150px"
                                src="{{ $item->gambar() }}" alt="Placeholder">
                        </div>
                        <h2 class="fw-normal">{{ $item->judul }}</h2>
                        <p><a class="btn btn-secondary" href="{{ route('lowongan.show', $item->id) }}">View details
                                &raquo;</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div><!-- /.row -->
@endsection
