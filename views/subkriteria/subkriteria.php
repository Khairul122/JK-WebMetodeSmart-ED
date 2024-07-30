 <!-- ========== table components start ========== -->
      <section class="table-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Data Sub Kriteria</h2>
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
                        Sub Kriteria
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
                   <a class="btn btn-primary shadow btn-xs sharp mr-1" href="?page=views&action=save_subkriteria">Tambah Data</a>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                           <th class="text-center">No</th>
                          <th class="text-center">Kriteria</th>
                          <th class="text-center">Sub Kriteria</th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                        <tr>
                        <?php
                          $stmt = $db->prepare("SELECT * FROM tbl_kriteria");
                          $stmt->execute();
                          $no =1;
                          while($row = $stmt->fetch()){
                          ?>
                          <tr>
                              <td class="text-center"><?php echo $no++ ?></td>
                              <td class="text-center"><?php echo $row['nama_kriteria'] ?></td>
                              <td class="text-center">
                              <?php
                              //$stmt2 = $db->prepare("SELECT * FROM tbl_sub_kriteria a left join smart_kriteria b on a.id_kriteria=b.id_kriteria");
                              $stmt2 = $db->prepare("SELECT * FROM tbl_sub_kriteria where id_kriteria='".$row['id_kriteria']."'");
                              $stmt2->execute();
                              while($row2 = $stmt2->fetch()){
                              ?>

                              <?php echo $row2['nilai_sub_kriteria'] ?>&nbsp;<?php echo $row2['nama_sub_kriteria'] ?>&nbsp;
                                  <a href="?page=views&action=update_subkriteria&id=<?php echo $row2['id_sub_kriteria'] ?>&nama=<?php echo $row2['nama_sub_kriteria'] ?>&nilai=<?php echo $row2['nilai_sub_kriteria'] ?>&kriteria=<?php echo $row2['id_kriteria'] ?>" ><span class="lni lni-pencil" style="color: green;"></span></a>
                                  <a href="?page=views&action=delete_subkriteria&id=<?php echo $row2['id_sub_kriteria'] ?>"><span class="lni lni-trash-can"  style="color: red;"></span></a><br>
                              <?php
                              }
                              ?>
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
