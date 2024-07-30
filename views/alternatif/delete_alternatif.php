<?php
    if(isset($_GET['id'])){
        $stmt = $db->prepare("DELETE FROM tbl_alternatif WHERE id_alternatif='".$_GET['id']."'");
        if($stmt->execute()){
            echo '<script type="text/javascript">        
          swal({
              title: "Sukses!",
              text: "Data Berhasil Dihapus!",
              icon: "success",
              button: "Ok"
            }).then(function() {
                window.location = "?page=views&action=alternatif";
            });
                </script>';
      
    } else {
        echo '<script type="text/javascript">
                    swal("Gagal!", "Data Gagal Dihapus", "error");   
                </script>';
    }
}
?>