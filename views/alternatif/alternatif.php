 <!-- ========== table components start ========== -->
      <section class="table-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Data Alternatif</h2>
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
                        Alternatif
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
                   <a class="btn btn-primary shadow btn-xs sharp mr-1" href="?page=views&action=save_alternatif">Tambah Data</a>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-center"><h6>Nomor</h6></th>
                          <th class="text-center"><h6>Nama Kantor</h6></th>
                          <th class="text-center"><h6>Form Penilaian</h6></th>
                          <th class="text-center"><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                        <tr>
                         <?php
                          $stmt = $db->prepare("SELECT * from tbl_alternatif");
                          $stmt->execute();
                          $no = 1;
                          while($row = $stmt->fetch()){
                          ?>
                          <tr>
                              <td class="text-center"><?php echo $no++ ?></td>
                              <td class="text-center"><?php echo $row['nama_alternatif'] ?></td>
                              <td class="text-center">
                                  <a target="blank" href="laporan/penilaian.php?id=<?php echo $row['id_alternatif'] ?>&nama=<?php echo $row['nama_alternatif'] ?>" class="btn btn-primary shadow btn-xs"><span class="lni lni-printer"></span></a>
                              </td>
                              <td class="text-center">
                                  <a href="?page=views&action=update_alternatif&id=<?php echo $row['id_alternatif'] ?>&nama=<?php echo $row['nama_alternatif'] ?>" class="btn btn-success shadow btn-xs"><span class="lni lni-pencil"></span></a>
                                  <a href="?page=views&action=delete_alternatif&id=<?php echo $row['id_alternatif'] ?>"  class="btn btn-danger shadow btn-xs"><span class="lni lni-trash-can"></span></a>
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
