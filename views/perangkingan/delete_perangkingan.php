<?php
if(isset($_GET['alt'])){
        $stmt = $db->prepare("DELETE FROM tbl_alternatif_kriteria WHERE id_alternatif='".$_GET['alt']."'");
        if($stmt->execute()){
            echo '<script type="text/javascript">        
          swal({
              title: "Sukses!",
              text: "Data Berhasil Dihapus!",
              icon: "success",
              button: "Ok"
            }).then(function() {
                window.location = "?page=views&action=perangkingan";
            });
                </script>';
      
    } else {
        echo '<script type="text/javascript">
                    swal("Gagal!", "Data Gagal Dihapus", "error");   
                </script>';
    }
}
?>