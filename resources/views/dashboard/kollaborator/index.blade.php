@extends('dashboard.layout.main')

@section('isiDashboard')
    <div class="d-flex pt-3 poppins text-black">
      <p>
        <a href="{{ url('dashboard/kolaborator') }}" class="text-black" style="text-decoration:none;">Kolaborasi ></a>
      </p>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 poppins fw-bold">
        <h1 class="h2">Daftar Kolaborasi</h1>
    </div>

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif  

    <div class="my-3">
      <div class="d-flex justify-content-start">
        <a href="/dashboard/kolaborator/new">
          <button type="button" class="d-flex allign-item-center btn btn-primary poppins" id='TambahKolaborasi'>
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" style="margin-top:2px;">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
            </svg>
            <p class="m-0">
              Add Collaborator
            </p></button>
        </a>
      </div>
    </div>

    <div class="table-responsive small border-top">
        <table class=" table table-striped table-md">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col" class="px-5">Judul</th>
              <th scope="col"></th>
              <th scope="col">Tanggal</th>
              <th scope="col"></th>
              <th scope="col">Status</th>
              <th scope="col"></th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kolaborator as $kolaborators)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td class="px-5">{{ $kolaborators->Judul }}</td>
              <td class="px-3"></td>
              <td>{{ $kolaborators->Tanggal }}</td>
              <td class="px-5"></td>
              <td>{{ $kolaborators->Status }}</td>
              <td class="px-5"></td>
              <td>
                <a href="{{ route('kollab', $kolaborators->id) }}" class="badge bg-info">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                  </svg>
                </a> 

                <a href="/dashboard/kolaborator/{{ $kolaborators->id }}/edit" class="badge bg-warning" id='editKolaborasi'>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                  </svg>
                </a> 
                <form action="/dashboard/kolaborator/{{ $kolaborators->id }}" method="post" class='d-inline'>
                  @csrf
                  @method('delete')
                  <button class='badge bg-danger border-0' onclick="return confirm('Are you sure you want to delete this?')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                      <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                    </svg>

                  </button>
                </form>
                <a href="" >
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection