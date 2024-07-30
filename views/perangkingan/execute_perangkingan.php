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
                   <a class="btn btn-primary shadow btn-xs sharp mr-1" href="?page=views&action=perangkingan">Kembali</a>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Alternatif</th>
                           <?php
                            $stmt2x = $db->prepare("SELECT * FROM tbl_kriteria");
                            $stmt2x->execute();
                            while($row2x = $stmt2x->fetch()){
                            ?>
                            <th><?php echo $row2x['nama_kriteria'] ?></th>
                            <?php
                            }
                            ?>
                            <th class="text-center">Hasil</th>
                            <!-- <th class="text-center">Keterangan</th> -->
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                       <tr>
                        <td class="text-center">-</td>
                        <td class="text-center">Bobot</td>
                        <?php
                        $stmt2x1 = $db->prepare("SELECT * FROM tbl_kriteria");
                        $stmt2x1->execute();
                        while($row2x1 = $stmt2x1->fetch()){
                        ?>
                        <td class="text-center"><?php echo $row2x1['bobot_kriteria'] ?></td>
                        <?php
                        }
                        ?>
                        <td class="text-center">-</td>
                        <!-- <td class="text-center">-</td> -->
                    </tr>
                    <?php
                    $stmtx = $db->prepare("SELECT * FROM tbl_alternatif");
                    $noxx = 1;
                    $stmtx->execute();
                    while($rowx = $stmtx->fetch()){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $noxx++ ?></td>
                        <td class="text-center"><?php echo $rowx['nama_alternatif'] ?></td>
                        <?php
                        $stmt3x = $db->prepare("SELECT * FROM tbl_kriteria");
                        $stmt3x->execute();
                        while($row3x = $stmt3x->fetch()){
                        ?>
                        <td class="text-center">
                            <?php
                            $stmt4x = $db->prepare("SELECT * FROM tbl_alternatif_kriteria WHERE id_kriteria='".$row3x['id_kriteria']."' and id_alternatif='".$rowx['id_alternatif']."'");
                            $stmt4x->execute();
                            while($row4x = $stmt4x->fetch()){
                                $ida = $row4x['id_alternatif'];
                                $idk = $row4x['id_kriteria'];
                                echo $kal = $row4x['nilai_alternatif_kriteria']*$row3x['bobot_kriteria'];
                                $stmt2x3 = $db->prepare("UPDATE tbl_alternatif_kriteria SET bobot_alternatif_kriteria=? WHERE id_alternatif=? and id_kriteria=?");
                                $stmt2x3->bindParam(1,$kal);
                                $stmt2x3->bindParam(2,$ida);
                                $stmt2x3->bindParam(3,$idk);
                                $stmt2x3->execute();
                            }
                            ?>
                        </td>
                        <?php
                        }
                        ?>
                        <td class="text-center">
                            <?php
                            $stmt3x2 = $db->prepare("SELECT sum(bobot_alternatif_kriteria) as bak FROM tbl_alternatif_kriteria WHERE id_alternatif='".$rowx['id_alternatif']."'");
                            $stmt3x2->execute();
                            $row3x2 = $stmt3x2->fetch();
                            $ideas = $rowx['id_alternatif'];
                            echo $hsl = $row3x2['bak'];
                            if($hsl>=85){
                                $ket = "Sangat Layak";
                            } else if($hsl>=80){
                                $ket = "Layak";
                            } else if($hsl>=75){
                                $ket = "Dipertimbangkan";
                            } else{
                                $ket = "Tidak Layak";
                            }
                            $stmt2x3y = $db->prepare("UPDATE tbl_alternatif SET hasil_alternatif=?, ket_alternatif=? WHERE id_alternatif=?");
                            $stmt2x3y->bindParam(1,$hsl);
                            $stmt2x3y->bindParam(2,$ket);
                            $stmt2x3y->bindParam(3,$ideas);
                            $stmt2x3y->execute();
                            ?>
                        </td>
                        <!-- <td class="text-center">
                            <?php
                            if($hsl>=85){
                                $ket2 = "Sangat Layak";
                            } else if($hsl>=80){
                                $ket2 = "Layak";
                            } else if($hsl>=75){
                                $ket2 = "Dipertimbangkan";
                            } else{
                                $ket2 = "Tidak Layak";
                            }
                            echo $ket2;
                            ?>
                        </td> -->
                        </tr>
                        <?php
                        }
                        ?>  
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
