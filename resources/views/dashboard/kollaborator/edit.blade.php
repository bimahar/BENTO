@extends('dashboard.layout.main')

@section('isiDashboard')
    <div class="d-flex pt-3 poppins text-black">
      <p>
        <a href="{{ url('dashboard/kolaborator') }}" class="text-black" style="text-decoration:none;">< Back</a>
      </p>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 poppins fw-bold">
        <h1 class="h2">Edit Collaborator</h1>
    </div>

    
    <form method="post" action="/dashboard/kolaborator/{{ $kolaborasi->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class='card p-3 mb-2'>
            <div class="mb-3">
              <label class="form-label" for="Judul">Judul</label>
              <input class="form-control @error('Judul') is-invalid @enderror" name='Judul' id="Judul" type="text" required autofocus value="{{ old('Judul', $kolaborasi->Judul) }}" placeholder="Judul Kolaborasi">
              @error('Judul')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="Tanggal">Tanggal</label>
              <input  class="form-control @error('Tanggal') is-invalid @enderror" name='Tanggal' id="Tanggal" type="date" value="{{ old('Tanggal') ?? (\Carbon\Carbon::parse($kolaborasi->Tanggal))->format('Y-m-d') }}" required >
              @error('Tanggal')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for='Gambar' class="form-label">Upload Gambar</label>
              <input type="hidden" name="oldGambar" value='{{ $kolaborasi->Gambar }}'>
              @if($kolaborasi->Gambar)
                <img src='{{ asset('storage/' . $kolaborasi->Gambar) }}' class='img-preview img-fluid mb-3 col-sm-5 d-block'>
              @else
                <img class='img-preview img-fluid mb-3 col-sm-5'>
              @endif
              <input name='Gambar' id='Gambar' class="form-control img-preview  @error('Gambar') is-invalid @enderror" type="file" onchange="return previewGambar()">
              @error('Gambar')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>
            <div class="mb-3">
              <label class="form-label" for="Status">Opsi positngan</label>
              <select class="form-select @error('Status') is-invalid @enderror" name='Status' id="Status" aria-label="Default select example" value='{{ old('Status') ?? $kolaborasi->Status }}'>
                <option selected="selected" value='notPost'>Pilih Opsi Draft</option>
                <option @if(old('Status') == 'Posted' || $kolaborasi->Status == 'Posted') selected @endif value='Posted'>Posting</option>
                <option @if(old('Status') == 'notPost'|| $kolaborasi->Status == 'notPost') selected @endif value="notPost">Simpan Draft</option>
              </select>
              @error('Status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="Detail">Description</label>
                <textarea class="form-control @error('Detail') is-invalid @enderror" name="Detail" id="Detail" rows="3" placeholder="Description" required >{{ old('Detail', $kolaborasi->Detail) }}"</textarea>
                @error('Detail')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
      </form>
    
      <script>
          
        function previewGambar(){
          const image = document.querySelector('#Gambar');
          const imgPreview = document.querySelector('.img-preview');
      
          imgPreview.style.display = 'block';
      
          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);
      
          console.log('oke');
      
          oFReader.onload = function(oFREvent){
            imgPreview.src = ofREvent.target.result;
          }
        }
      
      </script>
    
@endsection