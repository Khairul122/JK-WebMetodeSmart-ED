<?php
include "../koneksi.php";
if (isset($_GET['id'])) {
	//membuat variabel $id untuk menyimpan id dari GET id di URL
	$id = $_GET['id'];

	//query ke database SELECT tabel whrpg berdasarkan id = $id
	$select = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif WHERE id_alternatif='$id'") or die(mysqli_error($koneksi));

	//jika hasil query = 0 maka muncul pesan error
	if (mysqli_num_rows($select) == 0) {
		echo '<div class="alert alert-warning">Id tidak ada dalam database.</div>';
		exit();
		//jika hasil query > 0
	} else {
		//membuat variabel $data dan menyimpan data row dari query
		$data = mysqli_fetch_assoc($select);
	}
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
          
    <p><strong>FORM PENILAIAN</strong></p>
    <?php
        //query ke database SELECT tabel unit urut berdasarkan id yang paling besar
        $sql = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif WHERE id_alternatif='$id'") or die(mysqli_error($koneksi));
        
        //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
        if(mysqli_num_rows($sql) > 0){
            //membuat variabel $no untuk menyimpan nomor urut
            $no = 1;
            //melakukan perulangan while dengan dari dari query $sql
            while($data = mysqli_fetch_assoc($sql)){
                //menampilkan data perulangan
                ?>
<pre>
Nama Kantor      : <?php echo $data['nama_alternatif']; ?>
</pre>
                <?php
            
                    }
                }
            ?>

            <?php
            $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria WHERE id_kriteria =1") or die(mysqli_error($koneksi));
            //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
            if(mysqli_num_rows($sql) > 0){
                //membuat variabel $no untuk menyimpan nomor urut
                $no = 1;
                //melakukan perulangan while dengan dari dari query $sql
                while($data = mysqli_fetch_assoc($sql)){
            ?>
            <strong style="text-align: center;"><?php echo $data['nama_kriteria'] ?></strong>

            <table class="table  hovered cell-hovered border bordered">
    <thead>
        <tr>
            <th style="text-align: center;">Senin</th>
            <th style="text-align: center;">Selasa</th>
            <th style="text-align: center;">Rabu</th>
            <th style="text-align: center;">Kamis</th>
            <th style="text-align: center;">Jum'at</th>
            <th style="text-align: center;">Total Nilai</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        </tr>
    </tbody>
    </table>   
            <?php
            }
        }
            ?>



<?php
            $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria WHERE id_kriteria =2") or die(mysqli_error($koneksi));
            //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
            if(mysqli_num_rows($sql) > 0){
                //membuat variabel $no untuk menyimpan nomor urut
                $no = 1;
                //melakukan perulangan while dengan dari dari query $sql
                while($data = mysqli_fetch_assoc($sql)){
            ?>
            <strong style="text-align: center;"><?php echo $data['nama_kriteria'] ?></strong>

            <table class="table  hovered cell-hovered border bordered">
    <thead>
        <tr>
            <th style="text-align: center;">Senin</th>
            <th style="text-align: center;">Selasa</th>
            <th style="text-align: center;">Rabu</th>
            <th style="text-align: center;">Kamis</th>
            <th style="text-align: center;">Jum'at</th>
            <th style="text-align: center;">Total Nilai</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        </tr>
    </tbody>
    </table>   
            <?php
            }
        }
            ?>

<?php
            $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria WHERE id_kriteria =3") or die(mysqli_error($koneksi));
            //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
            if(mysqli_num_rows($sql) > 0){
                //membuat variabel $no untuk menyimpan nomor urut
                $no = 1;
                //melakukan perulangan while dengan dari dari query $sql
                while($data = mysqli_fetch_assoc($sql)){
            ?>
            <strong style="text-align: center;"><?php echo $data['nama_kriteria'] ?></strong>

            <table class="table  hovered cell-hovered border bordered">
    <thead>
        <tr>
            <th style="text-align: center;">Senin</th>
            <th style="text-align: center;">Selasa</th>
            <th style="text-align: center;">Rabu</th>
            <th style="text-align: center;">Kamis</th>
            <th style="text-align: center;">Jum'at</th>
            <th style="text-align: center;">Total Nilai</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        
        </tr>
    </tbody>
    </table>   
            <?php
            }
        }
            ?>

<?php
            $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria WHERE id_kriteria =4") or die(mysqli_error($koneksi));
            //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
            if(mysqli_num_rows($sql) > 0){
                //membuat variabel $no untuk menyimpan nomor urut
                $no = 1;
                //melakukan perulangan while dengan dari dari query $sql
                while($data = mysqli_fetch_assoc($sql)){
            ?>
            <strong style="text-align: center;"><?php echo $data['nama_kriteria'] ?></strong>

            <table class="table  hovered cell-hovered border bordered">
    <thead>
        <tr>
            <th style="text-align: center;">Senin</th>
            <th style="text-align: center;">Selasa</th>
            <th style="text-align: center;">Rabu</th>
            <th style="text-align: center;">Kamis</th>
            <th style="text-align: center;">Jum'at</th>
            <th style="text-align: center;">Total Nilai</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
       
        </tr>
    </tbody>
    </table>   
            <?php
            }
        }
            ?>

<?php
            $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria WHERE id_kriteria =5") or die(mysqli_error($koneksi));
            //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
            if(mysqli_num_rows($sql) > 0){
                //membuat variabel $no untuk menyimpan nomor urut
                $no = 1;
                //melakukan perulangan while dengan dari dari query $sql
                while($data = mysqli_fetch_assoc($sql)){
            ?>
            <strong style="text-align: center;"><?php echo $data['nama_kriteria'] ?></strong>

            <table class="table  hovered cell-hovered border bordered">
    <thead>
        <tr>
            <th style="text-align: center;">Senin</th>
            <th style="text-align: center;">Selasa</th>
            <th style="text-align: center;">Rabu</th>
            <th style="text-align: center;">Kamis</th>
            <th style="text-align: center;">Jum'at</th>
            <th style="text-align: center;">Total Nilai</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        
        </tr>
    </tbody>
    </table>   
            <?php
            }
        }
            ?>

<?php
            $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria WHERE id_kriteria =1") or die(mysqli_error($koneksi));
            //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
            if(mysqli_num_rows($sql) > 0){
                //membuat variabel $no untuk menyimpan nomor urut
                $no = 1;
                //melakukan perulangan while dengan dari dari query $sql
                while($data = mysqli_fetch_assoc($sql)){
            ?>
            <strong style="text-align: center;"><?php echo $data['nama_kriteria'] ?></strong>

            <table class="table  hovered cell-hovered border bordered">
    <thead>
        <tr>
            <th style="text-align: center;">Senin</th>
            <th style="text-align: center;">Selasa</th>
            <th style="text-align: center;">Rabu</th>
            <th style="text-align: center;">Kamis</th>
            <th style="text-align: center;">Jum'at</th>
            <th style="text-align: center;">Total Nilai</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
       
        </tr>
    </tbody>
    </table>   
            <?php
            }
        }
            ?>
       
   
      
    
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