<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
        href="assets/images/logo/index.png"
      type="image/x-icon"/>
    <title>Dinas Lingkungan Hidup | Apps SMART</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </head>
  <body>
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
        <a href="index.php">
          <img src="assets/images/logo/index.png" alt="logo" style="width: 80px;" />
        </a>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <?php if ($_SESSION['level'] == 'admin_sdm' or $_SESSION['level'] == 'ka_departemen') {
                        ?>
          <li class="nav-item nav-item-has-children">
             <a href="index.php">
               <span class="icon">
                  <i class="lni lni-home"></i>
              </span>
              <span class="text">Dashboard</span>
            </a>
          
            <ul id="ddmenu_1" class="collapse show dropdown-nav">
            </ul>
          </li>
          <?php } ?>

          <?php if ($_SESSION['level'] == 'admin_sdm') {
              ?>
          <li class="nav-item">
            <a href="?page=views&action=kriteria">
               <span class="icon">
                  <i class="lni lni-control-panel"></i>
              </span>
              <span class="text">Kriteria</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="?page=views&action=subkriteria">
               <span class="icon">
                  <i class="lni lni-files"></i>
              </span>
              <span class="text">Sub Kriteria</span>
            </a>
          </li>
        
          <li class="nav-item">
            <a href="?page=views&action=alternatif">
               <span class="icon">
                  <i class="lni lni-user"></i>
              </span>
              <span class="text">Alternatif</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="?page=views&action=perangkingan">
               <span class="icon">
                  <i class="lni lni-network"></i>
              </span>
              <span class="text">Perangkingan</span>
            </a>
          </li>
          <?php } ?>

          <?php if ($_SESSION['level'] == 'admin_sdm' or $_SESSION['level'] == 'ka_departemen') {
                        ?>
          <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              class="collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_2"
              aria-controls="ddmenu_2"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
               <span class="icon">
                  <i class="lni lni-printer"></i>
              </span>
              <span class="text">Laporan</span>
            </a>
            <ul id="ddmenu_2" class="collapse dropdown-nav">
              <li>
                <a target="blank" href="laporan/lap_kriteria.php"> Laporan Kriteria </a>
              </li>
              <li>
                <a target="blank" href="laporan/lap_utility.php"> Laporan Nilai Utility </a>
              </li>
               <li>
                <a target="blank" href="laporan/lap_perangkingan.php"> Laporan Perangkingan </a>
              </li>
            </ul>
          </li>
           <?php } ?>
        </ul>
      </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-20">
                  <button
                    id="menu-toggle"
                    class="main-btn primary-btn btn-hover"
                  >
                    <i class="lni lni-chevron-left me-2"></i> Menu
                  </button>
                </div>
                <div class="header-search d-none d-md-flex">
                  <form action="#">
                    <input type="text" placeholder="Search..." />
                    <button><i class="lni lni-search-alt"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                
                
                
                <!-- profile start -->
                <div class="profile-box ml-15">
                  <button
                    class="dropdown-toggle bg-transparent border-0"
                    type="button"
                    id="profile"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <div class="profile-info">
                      <div class="info">
                        <h6><?= $_SESSION['nama'] ?></h6>
                        <div class="image">
                          <img
                            src="assets/images/logo/index.png"
                            alt=""
                          />
                          <span class="status"></span>
                        </div>
                      </div>
                    </div>
                    <i class="lni lni-chevron-down"></i>
                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="profile"
                  >
                    <li>
                      <a href="logout.php"> <i class="lni lni-exit"></i> Sign Out </a>
                    </li>
                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- ========== header end ========== -->