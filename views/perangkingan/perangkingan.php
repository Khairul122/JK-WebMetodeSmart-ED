<!-- ========== table components start ========== -->
<section class="table-components">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title mb-30">
            <h2>Data Perangkingan</h2>
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
          <div class="breadcrumb-wrapper mb-30">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Perangkingan
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

    <!-- ========== tables-wrapper start ========== -->
    <div class="tables-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">
            <a class="btn btn-primary shadow btn-xs sharp mr-1" href="?page=views&action=save_perangkingan">Tambah Data</a>
            <a class="btn btn-warning shadow btn-xs sharp mr-1" href="?page=views&action=execute_perangkingan">Hitung Perangkingan</a>

            <!-- Form Tanggal -->
            <form method="GET" action="">
              <input type="hidden" name="page" value="views">
              <input type="hidden" name="action" value="perangkingan">
              <div class="row">
                <div class="col-md-4">
                  <input type="date" name="tanggal_awal" class="form-control" placeholder="Tanggal Awal">
                </div>
                <div class="col-md-4">
                  <input type="date" name="tanggal_akhir" class="form-control" placeholder="Tanggal Akhir">
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-success">Cari</button>
                </div>
              </div>
            </form>

            <div class="table-wrapper table-responsive mt-4">
              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Alternatif</th>
                    <?php
                    $stmt2 = $db->prepare("SELECT * FROM tbl_kriteria");
                    $stmt2->execute();
                    while($row2 = $stmt2->fetch()){
                    ?>
                    <th class="text-center"><?php echo $row2['nama_kriteria'] ?></th>
                    <?php
                    }
                    ?>
                    <th class="text-center">Action</th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody>
                  <tr>
                  <?php
                    $query = "SELECT * FROM tbl_alternatif";
                    if (isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])) {
                      $tanggal_awal = $_GET['tanggal_awal'];
                      $tanggal_akhir = $_GET['tanggal_akhir'];
                      $query .= " WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
                    }
                    $stmt = $db->prepare($query);
                    $nox = 1;
                    $stmt->execute();
                    while($row = $stmt->fetch()){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $nox++ ?></td>
                        <td class="text-center"><?php echo $row['nama_alternatif'] ?></td>
                        <?php
                        $stmt3 = $db->prepare("SELECT * FROM tbl_kriteria");
                        $stmt3->execute();
                        while($row3 = $stmt3->fetch()){
                        ?>
                        <td class="text-center">
                            <?php
                            $stmt4 = $db->prepare("SELECT * FROM tbl_alternatif_kriteria WHERE id_kriteria='".$row3['id_kriteria']."' and id_alternatif='".$row['id_alternatif']."'");
                            $stmt4->execute();
                            while($row4 = $stmt4->fetch()){
                                echo $row4['nilai_alternatif_kriteria'];
                            }
                            ?>
                        </td>
                        <?php
                        }
                        ?>
                        <td class="text-center">
                            <a href="?page=views&action=delete_perangkingan&alt=<?php echo $row['id_alternatif'] ?>"  class="btn btn-danger shadow btn-xs"><span class="lni lni-trash-can"></span></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>        
                  </tr>
                  <!-- end table row -->
                </tbody>
              </table>
              <!-- end table -->
            </div>
          </div>
          <!-- end card -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== tables-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
<!-- ========== table components end ========== -->
