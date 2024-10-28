<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="home">
          <img src="assets/icon/ubsi.png" alt="home" width="100" height="100">
        </a>
        <a class="navbar-brand" href="home" style="font-weight:bold;">
          Inventory Kantor Notaris
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="margin-left: auto;">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" aria-current="page" href="home">Dashboard</a>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Master Barang</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="supplier">Supplier</a></li>
                <li><a class="dropdown-item" href="barang">Data Barang</a></li>
                <li><a class="dropdown-item" href="barangmasuk">Barang Masuk</a></li>
              </ul>
            </div>
            <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
              <ul class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="login" id="login" onclick="logout()">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>