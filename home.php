  <!-- ========== section start ========== -->
  <style>
    /* Contoh selector, sesuaikan dengan HTML Anda */
    .tables-wrapper {
      background: url('path/to/your/image.png') no-repeat center center fixed;
      background-size: cover;
      padding: 20px;
      /* Sesuaikan padding sesuai kebutuhan */
    }
  </style>
  <section class="section">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title mb-30">
              <h2>Dashboard</h2>
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-6">
            <div class="breadcrumb-wrapper mb-30">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#0">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Dinas Lingkungan Hidup | SMART
                  </li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- ========== title-wrapper end ========== -->
      <?php if ($_SESSION['level'] == 'admin_sdm') {
      ?>
        <div class="row">
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon purple">
                <i class="lni lni-control-panel"></i>
              </div>
              <div class="content">
                <a href="?page=views&action=kriteria" style="list-style: none; text-decoration: none;">
                  <h6 class="mb-10">Kriteria</h6>
                  <h3 class="text-bold mb-10"></h3>
                  <p class="text-sm text-success">
                    <i class="lni lni-arrow-up"></i>
                    <span class="text-gray"></span>
                  </p>
                </a>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <!-- End Col -->
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon success">
                <i class="lni lni-files"></i>
              </div>
              <div class="content">
                <a href="?page=views&action=subkriteria" style="list-style: none; text-decoration: none;">
                  <h6 class="mb-10">Sub Kriteria</h6>
                  <h3 class="text-bold mb-10"></h3>
                  <p class="text-sm text-success">
                    <i class="lni lni-arrow-up"></i>
                    <span class="text-gray"></span>
                  </p>
                </a>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <!-- End Col -->
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon primary">
                <i class="lni lni-user"></i>
              </div>
              <div class="content">
                <a href="?page=views&action=alternatif" style="list-style: none; text-decoration: none;">
                  <h6 class="mb-10">Alternatif</h6>
                  <h3 class="text-bold mb-10"></h3>
                  <p class="text-sm text-danger">
                    <i class="lni lni-arrow-up"></i>
                    <span class="text-gray"></span>
                  </p>
                </a>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <!-- End Col -->
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon orange">
                <i class="lni lni-network"></i>
              </div>
              <div class="content">
                <a href="?page=views&action=perangkingan" style="list-style: none; text-decoration: none;">
                  <h6 class="mb-10">Perangkingan</h6>
                  <h3 class="text-bold mb-10"></h3>
                  <p class="text-sm text-danger">
                    <i class="lni lni-arrow-up"></i>
                    <span class="text-gray"> </span>
                  </p>
                </a>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
        <?php } ?>
        <!-- End Col -->
        <center>
          <img src="assets/images/logo/index.png" alt="logo" style="width: 40%;" />
        </center>
        </div>
        <!-- End Row -->
    </div>
    <!-- end container -->
  </section>
  <!-- ========== section end ========== -->