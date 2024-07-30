<?php
    if(isset($_GET['id'])){
        $stmt = $db->prepare("DELETE FROM tbl_kriteria where id_kriteria='".$_GET['id']."'");
        if($stmt->execute()){
            echo '<script type="text/javascript">        
          swal({
              title: "Sukses!",
              text: "Data Berhasil Dihapus!",
              icon: "success",
              button: "Ok"
            }).then(function() {
                window.location = "?page=views&action=kriteria";
            });
                </script>';
      
    } else {
        echo '<script type="text/javascript">
                    swal("Gagal!", "Data Gagal Dihapus", "error");   
                </script>';
    }
}
?>