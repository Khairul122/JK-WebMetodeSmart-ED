   <!-- ========== tab components start ========== -->
      <section class="tab-components">
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
                      <li class="breadcrumb-item"><a href="?page=views&action=subkriteria">Sub Kriteria</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Tambah Sub Kriteria
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

          <!-- ========== form-elements-wrapper start ========== -->
          <div class="form-elements-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <!-- input style start -->
                <div class="card-style mb-30">
                  <h6 class="mb-25">Input Data Sub Kriteria</h6>
                  <form action="" method="POST" onsubmit="return validasi_input(this)">
                   <div class="select-style-2">
                    <div class="select-position">
                        <input type="hidden" name="id" value="<?php echo isset($_GET['id'])? $_GET['id'] : ''; ?>">
                      <select name="kriteria" id="kriteria" class="form-control">
                       
                          <option value="Pilih">Pilih Kriteria</option>
                      <!--    <option value="<?php echo isset($_GET['kriteria'])? $_GET['kriteria'] : ''; ?>"><?php echo isset($_GET['kriteria'])? $_GET['kriteria'] : ''; ?></option> -->
                          <?php
                          $stmt3 = $db->prepare("SELECT * FROM tbl_kriteria");
                          $stmt3->execute();
                          while($row3 = $stmt3->fetch()){
                          ?>
                          <option value="<?php echo $row3['id_kriteria'] ?>"><?php echo $row3['nama_kriteria'] ?></option>
                          <?php
                          }
                          ?>
                    </select>
                    </div>
                  </div>
                    <!-- end input -->
                     <div class="input-style-1">
                      <label>Sub Kriteria</label>
                    <input type="text" id="nama" name="nama" autocomplete="off" placeholder="Nama Sub Kriteria" class="form-control" value="<?php echo isset($_GET['nama'])? $_GET['nama'] : ''; ?>">
                    </div>
                     <div class="input-style-1">
                      <label>Nilai</label>
                    <input type="text" id="nilai" name="nilai" autocomplete="off" placeholder="Nilai Sub Kriteria" class="form-control" value="<?php echo isset($_GET['nilai'])? $_GET['nilai'] : ''; ?>">
                    </div>
                    <button type="submit" name="update" class="btn btn-success btn-xs">Update</button>
                     <a class="btn btn-warning btn-xs" href="?page=views&action=subkriteria">Kembali</a>
                    <!-- end input -->
                  </div>
              </form>
                <!-- end card -->
                <!-- ======= input style end ======= -->            
              </div>
              <!-- end col -->
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== form-elements-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== tab components end ========== -->

 <?php
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $nilai = $_POST['nilai'];
        $kriteria = $_POST['kriteria'];
        $stmt2 = $db->prepare("UPDATE tbl_sub_kriteria SET nama_sub_kriteria=?, nilai_sub_kriteria=?, id_kriteria=? WHERE id_sub_kriteria=?");
        $stmt2->bindParam(1,$nama);
        $stmt2->bindParam(2,$nilai);
        $stmt2->bindParam(3,$kriteria);
        $stmt2->bindParam(4,$id);
        if($stmt2->execute()){
            echo '
                <script type="text/javascript">        
                swal({
                    title: "Sukses!",
                    text: "Data Berhasil Disimpan!",
                    icon: "success",
                    button: "Ok"
                  }).then(function() {
                      window.location = "?page=views&action=subkriteria";
                  });
                </script>';
            ?> 
            ?>
              
            <?php
        } else{
            ?>
             <script type="text/javascript">
                swal("Gagal!", "Data Gagal Disimpan", "error");   
            </script>
            <?php
        }
    }
    ?>

<script type="text/javascript">
function validasi_input(form){
   pola_text=/^[A-Za-z ]{1,}$/;
   pola_angka = /^[0-9 ]{1,}$/;
   if (form.kriteria.value == "Pilih"){
    swal("Peringatan!", "Silahkan Pilih Kriteria.", "warning");
    return (false);
    } else if (form.nama.value == ""){
        swal("Peringatan!", "Sub Kriteria Tidak Boleh Kosong.", "warning");
        form.nama.focus();
        return (false);
        } else if (!pola_angka.test(form.bobot.value)){
        swal("Peringatan!", "Nilai Tidak Boleh Kosong &  Hanya Boleh Angka Saja.", "warning");
        form.bobot.focus();
        return (false);
        }
    return (true);
    } 
</script>