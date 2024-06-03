<header class="navbar sticky-top bg-grey flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-40 fs-6 text-white poppins fw-bold bg-green" href="/">BentoKopi</a>
  
    <div class='navbar-nav'>
      <div class="nav-item text-nowrap">
          <form action="/logout" method="post">
              @csrf
              <button type="submit" class="nav-link px-3 bg-grey border-0"><a>Logout</a></button>
          </form>
      </div>
    </div>
  
    <ul class="navbar-nav flex-row d-md-none">
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
          <svg class="bi"><use xlink:href="#search"/></svg>
        </button>
      </li>
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <svg class="bi"><use xlink:href="#list"/></svg>
        </button>
      </li>
    </ul>
  
    <div id="navbarSearch" class="navbar-search w-100 collapse">
      <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </div>
</header>