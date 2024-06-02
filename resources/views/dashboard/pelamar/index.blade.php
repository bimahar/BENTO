@extends('dashboard.layout.main')

@section('isiDashboard')
    <div class="d-flex pt-3 poppins text-black">
      <p>
        <a href="{{ url('dashboard/pelamar') }}" class="text-black" style="text-decoration:none;">Pelamar ></a>
      </p>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 poppins fw-bold">
        <h1 class="h2">Daftar Pelamar Kerja</h1>
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
              <th scope="col">Nama Lowongan</th>
              <th scope="col">Nama</th>
              <th scope="col">Umur</th>
              <th scope="col">Alamat</th>
              <th scope="col">Pengalaman</th>
              <th scope='col'>Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pelamar as $pelamars)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pelamars->lowongan->judul }}</td>
              <td>{{ $pelamars->nama }}</td>
              <td>{{ $pelamars->umur }} Tahun</td>
              <td>{{ $pelamars->alamat }}</td>
              <td>{{ $pelamars->pengalaman_kerja }}</td>
              <td>{{ $pelamars->status }}</td>
              <td>
                <a href="{{ route('pelamar.show', $pelamars->id) }}" class="badge bg-info" id='showPelamar'>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                  </svg>
                </a>              
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <script>

        function updateStatus(selectElement, pelamarId) {
          const status = selectElement.value;
      
          fetch('/dashboard/pelamar/${pelamarId}', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },
            body: JSON.stringify({
              status: status
            })
          })
          .then(response => {
            if (!response.ok) {
              throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
          })
          .then(data => {
            if (data.success) {
              alert('Status update successfully');
            } else {
              alert('Failed to Update status: ${data.message}');
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('An error occured : ${error.message}');
          });
        }
      </script>
@endsection