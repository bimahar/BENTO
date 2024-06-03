<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto" style="height:95vh;">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a href="{{ route('dashboard.cashier') }}" class="link-body-emphasis d-inline-flex align-items-center text-decoration-none rounded px-4 my-2 fs-14">Pesanan</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('discounts.create') }}" class="link-body-emphasis d-inline-flex align-items-center text-decoration-none rounded px-4 my-2 fs-14">Masukkan Diskon</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('discounts.show') }}" class="link-body-emphasis d-inline-flex align-items-center text-decoration-none rounded px-4 my-2 fs-14">Lihat Daftar Diskon</a>
        </li>        
      </ul>
    </div>
  </div>
</div>