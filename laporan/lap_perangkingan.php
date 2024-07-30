

<?php
include "../config.php";
?>

<?php
include "../config.php";
session_start();
if(!isset($_SESSION['username'])){
    ?>
    <script>window.location.assign("login.php")</script>
    <?php
}
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Roboto', sans-serif;">

    <div class="container">
        <br><br><br>
        <H2 style="text-align:center; margin-top: -9px; font-family: 'Roboto', sans-serif;">DINAS LINGKUNGAN HIDUP</H2>
        <h4 style="text-align:center; margin-top: -9px; font-family: 'Roboto', sans-serif;">KABUPATEN DHARMASRAYA </h4>
        <h4 style="text-align:center; margin-top: -9px; font-family: 'Roboto', sans-serif;">ECO OFFICE AWARD</h4>
        <p style="text-align:center; margin-top: -9px; font-family: 'Roboto', sans-serif;"><i>Sungai Dareh, Pulau Punjung, Kabupaten Dharmasraya, Sumatera Barat 27612</i></p>
        <p style="text-align:center; margin-top: -9px; font-family: 'Roboto', sans-serif;"><i>Website: https://dlh.dharmasrayakab.go.id/ | Phone: (0754) 451506</i></p>
       <hr style="background: #000;"></hr>
          <img src="../assets/images/logo/index.png" alt="logo" width="100px" style="margin-top: -190px; margin-left: 50px;">
	<p><strong>Nilai Perangkingan</strong></p>
	<table class="table  hovered cell-hovered border bordered">
	<thead>
		<tr>
			<th width="50" style="text-align: center; color: #000;">No</th>
			<th style="text-align: center; color: #000;" >Alternatif</th>
           
			<th  style="text-align: center; color: #000;">Hasil</th>
			<!-- <th  style="text-align: center; color: #000;">Keterangan</th> -->
		</tr>
	</thead>
	<tbody>
		<tr>
		
		<?php
		$stmtx = $db->prepare("SELECT * from tbl_alternatif ORDER BY hasil_alternatif DESC");
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
	            if($hsl>=85){
                    $ket = "Sangat Layak";
                } else if($hsl>=80){
                    $ket = "Layak";
                } else if($hsl>=75){
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
	  <p style="margin-left: 66%;">Pulau Punjung,  <?php
                                        date_default_timezone_set('Asia/Jakarta'); 
                                        echo date ("d F Y") 
                                    ?> </p>
        <p style="margin-left: 67%;">Ka Dinas Lingkungan Hidup</p>
        <br><br><br>
        <p style="margin-left: 70%; font-weight-bold">Budi Waluyo</p>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/metro.js"></script>
   <script>
   		window.print();
   </script>
</body>
</html>