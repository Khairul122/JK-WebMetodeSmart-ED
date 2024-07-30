   <!-- ========== tab components start ========== -->
      <section class="tab-components">
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
                      <li class="breadcrumb-item"><a href="?page=views&action=alternatif">Alternatif</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Update Alternatif
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
                  <h6 class="mb-25">Update Data Alternatif</h6>
                  <form action="" method="POST" onsubmit="return validasi_input(this)">
                    <div class="input-style-1">
                      <label>Alternatif</label>
                       <input type="hidden" name="id" value="<?php echo isset($_GET['id'])? $_GET['id'] : ''; ?>">
                      <input type="text" autocomplete="off" class="form-control" id="nama" name="nama" required placeholder="Alternatif" value="<?php echo isset($_GET['nama'])? $_GET['nama'] : ''; ?>">
                    </div>
                    <!-- end input -->
                    
                    <button type="submit" name="update" class="btn btn-success btn-xs">Update</button>
                     <a class="btn btn-warning btn-xs" href="?page=views&action=alternatif">Kembali</a>
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
        $stmt2 = $db->prepare("UPDATE tbl_alternatif SET nama_alternatif=? WHERE id_alternatif=?");
        $stmt2->bindParam(1,$nama);
        $stmt2->bindParam(2,$id);
        if($stmt2->execute()){
                    echo '
               <script type="text/javascript">        
                swal({
                    title: "Sukses!",
                    text: "Data Berhasil Diubah!",
                    icon: "success",
                    button: "Ok"
                  }).then(function() {
                      window.location = "?page=views&action=alternatif";
                  });
                </script>';
            ?>                
            <?php
        } else {
            ?>
                <script type="text/javascript">alert('Gagal menyimpan data')</script>
            <?php
        }
    }
 ?>

<script type="text/javascript">
function validasi_input(form){
  if (form.nama.value == ""){
     swal("Peringatan!", "Alternatif  Tidak Boleh Kosong.", "warning");
      form.nama.focus();
      return false;      
        }
    return (true);
    } 
</script>