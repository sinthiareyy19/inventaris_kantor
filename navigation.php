<?php
error_reporting(0);
$sesi = $_SESSION['MEMBER'];
?>
<header class="navigation">
  <div id="navbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg px-0 py-4">
            <a class="navbar-brand" href="index.html">
              Inven<span>Taris.</span>
            </a>
      
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09"
              aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
              <span class="fa fa-bars"></span>
            </button>
      
            <div class="collapse navbar-collapse text-center" id="navbarsExample09">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= $_GET['hal'] == 'home' || !isset($_GET['hal']) ? 'active' : ''; ?>">
                  <a class="nav-link" href="index.php?hal=home">Home</a>
                </li>
                <li class="nav-item <?= $_GET['hal'] == 'about' ? 'active' : ''; ?>"><a class="nav-link" href="index.php?hal=about">About us</a></li>
                <li class="nav-item <?= $_GET['hal'] == 'pinjam_barang' ? 'active' : ''; ?>">
                  <a class="nav-link" href="index.php?hal=pinjam_barang">Peminjaman</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown0501" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data</a>
                  <ul class="dropdown-menu" aria-labelledby="dropdown05">
                    <li><a class="dropdown-item" href="index.php?hal=pegawai">Kepegawaian</a></li>
                    <li><a class="dropdown-item" href="index.php?hal=barang">Barang Inventaris</a></li>
                    <li><a class="dropdown-item" href="index.php?hal=kategori">Kategori Barang</a></li>
                    <li><a class="dropdown-item" href="index.php?hal=peminjaman">Daftar Peminjaman </a></li>
                  </ul>
                </li>
                <?php
                if(!isset($sesi)){ //jika gagal login
                ?>
                <li class="nav-item"><a class="nav-link" href="login_form.php">Login</a></li>
                <?php
                } 
                else {
                  ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown0501" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $sesi['fullname'] ?></a>
                  <ul class="dropdown-menu" aria-labelledby="dropdown05">
                    <li><a class="dropdown-item" href="index.php?hal=profile">Profile</a></li>
                    <?php //untuk admin
                    if($sesi['role'] == 'admin'){ //jika gagal login
                    ?>
                    <li><a class="dropdown-item" href="index.php?hal=member">Kelola User</a></li>
                    <?php } ?>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                </li>
                <?php } ?>
              </ul>
  
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>