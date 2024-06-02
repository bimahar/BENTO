<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title> <!-- Hapus pageTitle -->
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      display: flex;
    }

    header {
      background-color: #fff;
      color: #fff;
      padding: 1em;
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      height: 60px;
      box-sizing: border-box;
    }

    .logo {
      font-size: 1.5em;
      font-weight: bold;
      color: #67BC67;
    }

    nav {
      background-color: #67BC67;
      padding: 1em;
      height: 100vh;
      width: 200px;
      position: fixed;
      top: 60px;
      left: 0;
      box-sizing: border-box;
    }

    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      margin-bottom: 1em;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 0.5em 0;
    }

    nav ul li ul {
      display: none;
      list-style: none;
      padding-left: 1em;
    }

    nav ul li ul li {
      margin-bottom: 0.5em;
    }

    nav ul li ul li a {
      padding: 0.5em 0;
      background-color: #6FCF6F;
    }

    nav ul li a:hover {
      background-color: #555;
    }

    nav ul li a.active + ul {
      display: block;
    }

    main {
      margin-left: 220px;
      padding: 2em;
      width: calc(100% - 220px);
      margin-top: 60px;
      box-sizing: border-box;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    main h1 {
      margin-top: 0;
    }

    /* Memperbarui warna tombol */
    button {
      background-color: #ccc;
    }

    /* Memberikan hover effect pada tombol */
    button:hover {
      background-color: #999;
    }

    /* Styling untuk header Riwayat Transaksi dan Waktu Transaksi */
    .header-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      margin-bottom: 20px;
      box-sizing: border-box;
      padding: 0 20px; /* Padding untuk memperjelas batas */
    }

    .header-container h2 {
      margin: 0;
      padding: 0;
    }

    .header-border {
      border-top: 2px solid #333; /* Garis batas */
      width: 100%;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">Bento kopi</div>
  </header>
  <nav>
    <ul>
      <li><a href="/admin/dashboard">Dashboard</a></li>
      <li>
        <a href="#!" class="menu-toggle">Menu</a>
        <ul>
          <li><a href="/admin/menu/add">Tambah Menu</a></li>
          <li><a href="/admin/menu/food">Menu Makanan</a></li>
          <li><a href="/admin/menu/drinks">Menu Minuman</a></li>
        </ul>
      </li>
      <li><a href="/admin/transactions">Riwayat Transaksi</a></li>
      <li><a href="/admin/collaboration">Kolaborasi</a></li>
      <li><a href="/admin/jobs">Lowongan Kerja</a></li>
      <li><a href="/admin/location">Lokasi</a></li>
      <li><a href="/admin/articles">Artikel</a></li>
    </ul>
  </nav>
  <main>
    <div class="header-container">
      <h2>Riwayat Transaksi</h2>
      <div class="header-border"></div>
      <h2>Waktu Transaksi</h2>
    </div>
    <h1></h1> <!-- Hapus pageTitle -->
  </main>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const menuToggle = document.querySelector('.menu-toggle');
      menuToggle.addEventListener('click', () => {
        menuToggle.classList.toggle('active');
      });
    });
  </script>
</body>
</html>
