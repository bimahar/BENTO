<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto" style="height:95vh;">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 poppins px-40 {{ Request::is('dashboard') ? 'active' : 'fw-normal'}}" aria-current="page" href="/dashboard">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>

          <li class="nav-item">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 gap-2 poppins px-40 fs-14 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
              <svg class="bi"><use xlink:href="#people"/></svg>
                Kolaborasi
            </button>
            <div class="collapse" id="dashboard-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small gap-2 poppins px-40">
                <li>
                  <a href="/dashboard/kolaborator" class="link-body-emphasis d-inline-flex text-decoration-none rounded px-4 my-2 fs-14 {{ Request::is('dashboard/kolaborator') ? 'active' : ''}}">
                    Daftar Kolaborasi
                  </a>
                </li>
                <li>
                  <a href="/dashboard/kolaborasi" class="link-body-emphasis d-inline-flex text-decoration-none rounded px-4 fs-14 {{ Request::is('dashboard/kolaborasi') ? 'active' : ''}}">
                    Daftar Kolaborator
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 gap-2 poppins px-40 fs-14 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
              <svg class="bi"><use xlink:href="#people"/></svg>
                Lowongan Kerja
            </button>
            <div class="collapse" id="dashboard-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small gap-2 poppins px-40">
                <li>
                  <a href="/dashboard/kolaborator" class="link-body-emphasis d-inline-flex text-decoration-none rounded px-4 my-2 fs-14 {{ Request::is('dashboard/kolaborator') ? 'active' : ''}}">
                    Daftar Lowongan
                  </a>
                </li>
                <li>
                  <a href="{{ route('pelamar.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded px-4 fs-14 {{ Request::is('dashboard/pelamar') ? 'active' : ''}}">
                    Pelamar
                  </a>
                </li>
              </ul>
            </div>
          </li>
          
        </ul>
      </div>
    </div>
  </div>