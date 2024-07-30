<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Input Data Perangkingan</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Sertakan file CSS Anda jika ada -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- Sertakan SweetAlert -->
</head>
<body>
    <!-- ========== tab components start ========== -->
    <section class="tab-components">
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
                                    <li class="breadcrumb-item"><a href="?page=views&action=perangkingan">Perangkingan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Tambah Perangkingan
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
                                <div class="select-style-2">
                                    <div class="select-position">
                                        <select name="alt" class="form-control">
                                            <option value="Pilih">Pilih Alternatif</option>
                                            <?php
                                            // Koneksi database
                                            $db = new PDO('mysql:host=localhost;dbname=smart_kantor', 'root', ''); // Sesuaikan dengan koneksi database Anda
                                            $stmt3 = $db->prepare("SELECT * FROM tbl_alternatif");
                                            $stmt3->execute();
                                            while($row3 = $stmt3->fetch()){
                                            ?>
                                            <option value="<?php echo htmlspecialchars($row3['id_alternatif']); ?>"><?php echo htmlspecialchars($row3['nama_alternatif']); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <?php
                                $stmt4 = $db->prepare("SELECT * FROM tbl_kriteria");
                                $stmt4->execute();
                                while($row4 = $stmt4->fetch()){
                                ?>
                                <!-- end input -->
                                <div class="input-style-1">
                                    <input type="hidden" class="form-control" name="kri[<?php echo htmlspecialchars($row4['id_kriteria']); ?>]" value="<?php echo htmlspecialchars($row4['id_kriteria']); ?>">
                                    <?php echo htmlspecialchars($row4['nama_kriteria']); ?>
                                </div>
                                <div class="select-style-2">
                                    <div class="select-position">
                                        <select class="form-control" name="altkri[<?php echo htmlspecialchars($row4['id_kriteria']); ?>]">
                                            <?php
                                            $stmt5 = $db->prepare("SELECT * FROM tbl_sub_kriteria WHERE id_kriteria = ?");
                                            $stmt5->bindParam(1, $row4['id_kriteria']);
                                            $stmt5->execute();
                                            while($row5 = $stmt5->fetch()){
                                            ?>
                                            <option value="<?php echo htmlspecialchars($row5['nilai_sub_kriteria']); ?>"><?php echo htmlspecialchars($row5['nama_sub_kriteria']); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                                <button type="submit" name="simpan" class="btn btn-primary btn-xs">Submit</button>
                                <a class="btn btn-warning btn-xs" href="?page=views&action=perangkingan">Kembali</a>
                            </form>
                        </div>
                        <!-- end card -->
                        <!-- ======= input style end ======= -->
                    </div>
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
if(isset($_POST['simpan'])){
    try {
        $alt = $_POST['alt'];
        if ($alt != "Pilih") {
            $stmtx4 = $db->prepare("SELECT * FROM tbl_kriteria");
            $stmtx4->execute();
            $all_success = true;
            while($rowx4 = $stmtx4->fetch()){
                $idkri = $rowx4['id_kriteria'];
                $kri = $_POST['kri'][$idkri];
                $altkri = $_POST['altkri'][$idkri];
                $stmt2 = $db->prepare("INSERT INTO tbl_alternatif_kriteria(id_alternatif, id_kriteria, nilai_alternatif_kriteria) VALUES (?, ?, ?)");
                $stmt2->bindParam(1, $alt);
                $stmt2->bindParam(2, $kri);
                $stmt2->bindParam(3, $altkri);
                if (!$stmt2->execute()) {
                    $all_success = false;
                    break;
                }
            }
            if ($all_success) {
                echo '
                <script type="text/javascript">        
                    swal({
                        title: "Sukses!",
                        text: "Data Berhasil Disimpan!",
                        icon: "success",
                        button: "Ok"
                    }).then(function() {
                        window.location = "?page=views&action=perangkingan";
                    });
                </script>';
            } else {
                echo '<script type="text/javascript">swal("Gagal!", "Data Gagal Disimpan", "error");</script>';
            }
        } else {
            echo '<script type="text/javascript">swal("Peringatan!", "Silahkan Pilih Alternatif.", "warning");</script>';
        }
    } catch (Exception $e) {
        echo '<script type="text/javascript">swal("Kesalahan!", "Terjadi kesalahan: ' . $e->getMessage() . '", "error");</script>';
    }
}
?>

<script type="text/javascript">
function validasi_input(form){
    if (form.alt.value == "Pilih"){
        swal("Peringatan!", "Silahkan Pilih Alternatif.", "warning");
        return false;
    }
    return true;
}
</script>
</body>
</html>
