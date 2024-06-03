
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand fs-2 fw-bold" href="/" style="color: #007200;">BentoKopi</a>
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse  " id="navbarTogglerDemo03">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Beranda") ? 'active' : '' }}" href="/">Beranda</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Menu") ? 'active' : '' }}" href="{{route('allmenu')}}">Menu</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Reservasi") ? 'active' : '' }}" href="reservasi">Reservasi</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Kolaborasi") ? 'active' : '' }}" href="kolaborasi">Kolaborasi</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Artikel") ? 'active' : '' }}" href="artikel">Artikel</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Location") ? 'active' : '' }}" href="location">Location</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "Apply") ? 'active' : '' }}" href="apply">Apply</a></li>
              <li class="nav-item hoverG"> <a class="nav-link{{ ($title === "About") ? 'active' : '' }}" href="about">About us</a></li>
          </ul>


          <ul class="navbar-nav my-4  ">
            
            <li>
              <a class="nav-link" dusk='cart' href="/cart"><i class="m-0 "  aria-controls="offcanvasRight" data-feather = "shopping-cart"></i></a>
            </li>

            <li>
              <a class="nav-link" href="/"><i class="m-0 " data-feather = "user"></i></a>
            </li>
            
            @auth
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" dusk="modalLogout">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Logout</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          Apakah anda yakin ingin logout?
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                          <form action="{{ route('logout') }}" method="post" dusk="logoutForm">
                              @csrf
                              <button type="submit" class="btn btn-primary">Logout</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
  
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" dusk="userDropdown">
                  Welcome back, {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#" dusk="logoutLink">Logout</a></li>

              </ul>
              {{-- <ul class="dropdown-menu">
                  @if(auth()->user()->username === 'App')
                      <li><a class="dropdown-item" href="/dashboard">My dashboard</a></li>
                      <li><hr class="dropdown-divider"></li>
                  @elseif(auth()->user()->username === 'Cashier')
                      <li><a class="dropdown-item" href="{{ route('dashboard.cashier') }}">My dashboard</a></li>
                      <li><hr class="dropdown-divider"></li>
                  @endif
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#" dusk="logoutLink">Logout</a></li>
              </ul> --}}
          </li>
            @else
            <li class="nav-item ">
              <a href="/login" class="nav-link {{ ( $title === "Login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i>
                Login</a>
            </li>
            @endauth
        </ul>
          
        </div>

  </div>
</nav>
<div class="line w-10"></div>