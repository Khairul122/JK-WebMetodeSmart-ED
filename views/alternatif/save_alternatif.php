<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Input Data Alternatif</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Sertakan file CSS Anda jika ada -->
    <script>
        function showAlert(message, type) {
            alert(type + ": " + message);
        }
    </script>
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
                                        Tambah Alternatif
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
                            <h6 class="mb-25">Input Data Alternatif</h6>
                            <form action="" method="POST" onsubmit="return validasi_input(this)">
                                <div class="input-style-1">
                                    <label>Nama Kantor</label>
                                    <input type="text" autocomplete="off" class="form-control" id="nama" name="nama" placeholder="Alternatif" required>
                                </div>
                                <!-- end input -->
                                <button type="submit" name="simpan" class="btn btn-primary btn-xs">Submit</button>
                                <a class="btn btn-warning btn-xs" href="?page=views&action=alternatif">Kembali</a>
                                <!-- end input -->
                            </form>
                        </div>
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
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smart_kantor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['simpan'])) {
    // Get the form data
    $nama = $_POST['nama'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO tbl_alternatif (nama_alternatif) VALUES (?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $nama);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>showAlert('New record created successfully', 'Success');</script>";
    } else {
        echo "<script>showAlert('Error: " . $stmt->error . "', 'Error');</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
