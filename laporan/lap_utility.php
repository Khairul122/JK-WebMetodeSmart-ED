<?php
include "../config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Dinas Lingkungan Hidup | Apps SMART</title>
    <link href="../assets/css/metro.css" rel="stylesheet">
    <link href="../assets/css/metro-icons.css" rel="stylesheet">
    <link href="../assets/css/metro-schemes.css" rel="stylesheet">
    <link href="../assets/css/metro-responsive.css" rel="stylesheet">
     <link
      rel="shortcut icon"
        href="../assets/images/logo/index.png"
      type="image/x-icon"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@500;600&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Roboto', sans-serif;">

    <div class="container">
        <br><br><br>
        <H2 style="text-align:center; margin-top: -9px; font-family: 'Fira code';">DINAS LINGKUNGAN HIDUP</H2>
        <h4 style="text-align:center; margin-top: -9px; font-family: 'Roboto', sans-serif;">KABUPATEN DHARMASRAYA </h4>
        <h4 style="text-align:center; margin-top: -9px; font-family: 'Roboto', sans-serif;">ECO OFFICE AWARD</h4>
        <p style="text-align:center; margin-top: -9px; font-family: 'Roboto', sans-serif;"><i>Sungai Dareh, Pulau Punjung, Kabupaten Dharmasraya, Sumatera Barat 27612</i></p>
        <p style="text-align:center; margin-top: -9px; font-family: 'Roboto', sans-serif;"><i>Website: https://dlh.dharmasrayakab.go.id/ | Phone: (0754) 451506</i></p>
       <hr style="background: #000;"></hr>
          <img src="../assets/images/logo/index.png" alt="logo" width="100px" style="margin-top: -190px; margin-left: 50px;">
	<p><strong>Nilai Kriteria</strong></p>
	<table class="table  hovered cell-hovered border bordered">
    <thead>
        <tr>
            <th width="50" style="text-align: center; color: #000;">No</th>
            <th style="text-align: center; color: #000;">Alternatif</th>
            <?php
            $stmt2 = $db->prepare("SELECT * from tbl_kriteria");
            $stmt2->execute();
            while($row2 = $stmt2->fetch()){
            ?>
            <th style="text-align: center; color: #000;"><?php echo $row2['nama_kriteria'] ?></th>
            <?php
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $stmt = $db->prepare("SELECT * from tbl_alternatif");
        $nox = 1;
        $stmt->execute();
        while($row = $stmt->fetch()){
        ?>
        <tr>
            <td align="center"><?php echo $nox++ ?></td>
            <td align="center"><?php echo $row['nama_alternatif'] ?></td>
            <?php
            $stmt3 = $db->prepare("SELECT * from tbl_kriteria");
            $stmt3->execute();
            while($row3 = $stmt3->fetch()){
            ?>
            <td align="center">
                <?php
                $stmt4 = $db->prepare("SELECT * from tbl_alternatif_kriteria where id_kriteria='".$row3['id_kriteria']."' and id_alternatif='".$row['id_alternatif']."'");
                $stmt4->execute();
                while($row4 = $stmt4->fetch()){
                    echo $row4['nilai_alternatif_kriteria'];
                    ?>
                    <!--<a href="?page=form&alt=<?php echo $row['id_alternatif'] ?>&kri=<?php echo $row3['id_kriteria'] ?>&nilai=<?php echo $row4['nilai_alternatif_kriteria'] ?>" style="color:orange"><span class="mif-pencil icon"></span></a>-->
                    <?php
                }
                ?>
            </td>
            <?php
            }
            ?>
        </tr>
        <?php
        }
        ?>
    </tbody>
    </table>
    <br/>
    <p><strong>Nilai Utility</strong></p>
    <table class="table hovered cell-hovered border bordered">
    <thead>
        <tr>
            <th width="50" style="text-align: center; color: #000;">No</th>
            <th style="text-align: center; color: #000;">Alternatif</th>
            <?php
            $stmt2x = $db->prepare("SELECT * from tbl_kriteria");
            $stmt2x->execute();
            while($row2x = $stmt2x->fetch()){
            ?>
            <th style="text-align: center; color: #000;"><?php echo $row2x['nama_kriteria'] ?></th>
            <?php
            }
            ?>
            <th style="text-align: center; color: #000;">Hasil</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="center"></td>
            <td align="center">Bobot</td>
            <?php
            $stmt2x1 = $db->prepare("SELECT * from tbl_kriteria");
            $stmt2x1->execute();
            while($row2x1 = $stmt2x1->fetch()){
            ?>
            <td align="center"><?php echo $row2x1['bobot_kriteria'] ?></td>
            <?php
            }
            ?>
            <td align="center"></td>
           
        </tr>
        <?php
        $stmtx = $db->prepare("SELECT * from tbl_alternatif");
        $noxx = 1;
        $stmtx->execute();
        while($rowx = $stmtx->fetch()){
        ?>
        <tr>
            <td align="center"><?php echo $noxx++ ?></td>
            <td align="center"><?php echo $rowx['nama_alternatif'] ?></td>
            <?php
            $stmt3x = $db->prepare("SELECT * from tbl_kriteria");
            $stmt3x->execute();
            while($row3x = $stmt3x->fetch()){
            ?>
            <td align="center">
                <?php
                $stmt4x = $db->prepare("SELECT * from tbl_alternatif_kriteria where id_kriteria='".$row3x['id_kriteria']."' and id_alternatif='".$rowx['id_alternatif']."'");
                $stmt4x->execute();
                while($row4x = $stmt4x->fetch()){
                    $ida = $row4x['id_alternatif'];
                    $idk = $row4x['id_kriteria'];
                    echo $kal = $row4x['nilai_alternatif_kriteria']*$row3x['bobot_kriteria'];
                    $stmt2x3 = $db->prepare("update smart_alternatif_kriteria set bobot_alternatif_kriteria=? where id_alternatif=? and id_kriteria=?");
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
            <td align="center">
                <?php
                $stmt3x2 = $db->prepare("SELECT sum(bobot_alternatif_kriteria) as bak from tbl_alternatif_kriteria where id_alternatif='".$rowx['id_alternatif']."'");
                $stmt3x2->execute();
                $row3x2 = $stmt3x2->fetch();
                $ideas = $rowx['id_alternatif'];
                echo $hsl = $row3x2['bak'];
                if($hsl>=80){
                    $ket = "Sangat Layak";
                } else if($hsl>=60){
                    $ket = "Layak";
                } else if($hsl>=40){
                    $ket = "Dipertimbangkan";
                } else{
                    $ket = "Tidak Layak";
                }
                ?>
            </td>
           
        </tr>
        <?php
        }
        ?>
    </tbody>
    </table>    	
	<p><br/></p>
	</div>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/metro.js"></script>
    <script>
    	window.print();
    </script>
 
</body>
</html>