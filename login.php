<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dinas Lingkungan Hidup | SMART</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/logo/index.png" />
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
   <?php
        if(isset($_POST['username']) && isset($_POST['password'])){
            $user = $_POST['username'];
            $pass = md5($_POST['password']);
            $stmt = $db->prepare("SELECT * from tbl_admin WHERE username='$user' and password='$pass' limit 0,1");
            $stmt->execute();
            $row = $stmt->fetch();
                if($row['username']==$user && $row['password']=$pass){
                    session_start();
                    $_SESSION['id'] = $row['id_admin'];
                    $_SESSION['nama'] = $row['nama_admin'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['level'] = $row['level'];
                    ?>
                    <!-- <div class="progress ani large" id="pb1" data-animate="500" data-color="blue" data-role="progress"></div> -->
                    <script>
                       swal({
                          title: "Sukses!",
                          text: "Selamat Datang!",
                          icon: "success",
                          button: "Ok"
                        }).then(function() {
                            location.href='index.php';
                        });
                    </script>
                    <?php
                } else{
                    ?>
                    <script>
                       swal("Peringatan!", "Username dan Password Salah", "warning");
                    </script>
                    <?php
                }
        }
        ?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="assets/images/logo/index.png" style="display:block; margin:auto;" alt="logo" style="width: 90px;">
              </div>
              <h4>Login System</h4>
              <form  action="" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" autocomplete="off" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="mt-3">
                  <button  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
