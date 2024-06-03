<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Tag head lainnya -->
  </head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bento Kopi | Dashboard</title>    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    {{-- Style CSS --}}
    <link rel="stylesheet" href="dashboard/style.css">
    
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <div>
      
<main>
  
        @include('dashboardcashier.layouts.header')
        
        <div class="row">

          @include('dashboardcashier.layouts.sidebar')
      
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            
            @yield('container')
          </main>
        </div>


    
</main>
    </div>
</body>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

