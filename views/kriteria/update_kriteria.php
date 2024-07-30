   <!-- ========== tab components start ========== -->
      <section class="tab-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Data Kriteria</h2>
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
                      <li class="breadcrumb-item"><a href="?page=views&action=kriteria">Kriteria</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Tambah Kriteria
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
                  <h6 class="mb-25">Input Data Kriteria</h6>
                  <form action="" method="POST" onsubmit="return validasi_input(this)">
                    <div class="input-style-1">
                      <label>Kriteria</label>
                      <input type="hidden" name="id" value="<?php echo isset($_GET['id'])? $_GET['id'] : ''; ?>">
                      <input type="text" autocomplete="off" class="form-control" id="nama" name="nama" required placeholder="Kriteria" value="<?php echo isset($_GET['nama'])? $_GET['nama'] : ''; ?>">
                    </div>
                    <!-- end input -->
                     <div class="input-style-1">
                      <label>Kriteria</label>
                      <input type="text" autocomplete="off" class="form-control" id="bobot" name="bobot" required placeholder="Bobot" value="<?php echo isset($_GET['bobot'])? $_GET['bobot']*100 : ''; ?>">
                    </div>
                    <button type="submit" name="update" class="btn btn-success btn-xs">Update</button>
                     <a class="btn btn-warning btn-xs" href="?page=views&action=kriteria">Kembali</a>
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
        $stmt = $db->prepare("SELECT sum(bobot_kriteria) AS bbtk FROM tbl_kriteria");
        $stmt->execute();
        $row = $stmt->fetch();
        if($_POST['bobot']<=100){
            $bbt = $_GET['bobot'];
            $bbt2 = $_POST['bobot']/100;
            $bbtk = $row['bbtk']-$bbt;
            $bbtk2 = $bbtk+$bbt2;
            if($bbtk2<=1){
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $bobot = $_POST['bobot']/100;
                $stmt2 = $db->prepare("UPDATE tbl_kriteria SET nama_kriteria=?, bobot_kriteria=? WHERE id_kriteria=?");
                $stmt2->bindParam(1,$nama);
                $stmt2->bindParam(2,$bobot);
                $stmt2->bindParam(3,$id);
                if($stmt2->execute()){
                     echo '
                   <script type="text/javascript">        
                swal({
                    title: "Sukses!",
                    text: "Data Berhasil Diubah!",
                    icon: "success",
                    button: "Ok"
                  }).then(function() {
                      window.location = "?page=views&action=kriteria";
                  });
                </script>';
                    ?>
                    <?php
                } else{
                    ?>
                    <script type="text/javascript"> 
                      swal("Gagal!", "Data Gagal Diubah", "error");   
                  </script>
                    <?php
                }
            } else{
                ?>
                <script type="text/javascript">
                  swal("Peringatan!", "Jumlah Bobot Lebih Dari 100%", "warning");
                </script>
                <?php
            }
        } else{
            ?>
                <script type="text/javascript">
                  swal("Peringatan!", "Jumlah Bobot Lebih Dari 100%", "warning");
              </script>
            <?php
        }
    }
 ?>

<script type="text/javascript">
function validasi_input(form){
   pola_text=/^[A-Za-z ]{1,}$/;
   pola_angka = /^[0-9 ]{1,}$/;
   if (!pola_text.test(form.nama.value)){
     swal("Peringatan!", "Kriteria Tidak Boleh Kosong &  Hanya Boleh Huruf Saja.", "warning");
      form.nama.focus();
      return false;      
    } else if (!pola_angka.test(form.bobot.value)){
        swal("Peringatan!", "Bobot Tidak Boleh Kosong &  Hanya Boleh Angka Saja.", "warning");
        form.bobot.focus();
        return (false);
        }
    return (true);
    } 
</script>