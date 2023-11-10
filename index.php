<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>LOGISTIK FII</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">LOGISTIK DEPARTEMENT</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DAILY LEADER REPORT</center></h4>
    
    <?php 
		include 'db\koneksi.php';
		?>
 
		<br/><br/><br/>
 
		<form method="get">
			<label>PILIH TANGGAL</label>
			<input type="date" name="date2">
			<input type="submit" value="FILTER">
		</form>
 
		<br/> <br/>
 
		<table border="1">
			<tr>
                <th>No</th>
				<th>Date</th>
                <th>Shift</th>
				<th>Nama Customer</th>
				<th>Cycle</th>
				<th>Status</th>
                <th>Abnormality</th>
                <th>Note</th>
			</tr>
			<?php 
			$no = 1;
 
			if(isset($_GET['date2'])){
				$date2 = $_GET['date2'];
				$sql = mysqli_query($kon,"select * from delivery where date='$date2'");
			}else{
				$sql = mysqli_query($kon,"select * from delivery");
			}
			
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['date']; ?></td>
                <td><?php echo $data['shift']; ?></td>
				<td><?php echo $data['nama_customer']; ?></td>
				<td><?php echo $data['cycle']; ?></td>
                <td><?php echo $data['status']; ?></td>
                <td><?php echo $data['abnormality']; ?></td>
                <td><?php echo $data['note']; ?></td>
			</tr>
			<?php 
			}
			?>
		</table>
 
       
<?php

    include "db/koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['date'])) {
        $date=htmlspecialchars($_GET["date"]);

        $sql="delete from delivery where date='$date' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">
            <th>No</th>    
            <th>Date</th>
            <th>Shift</th>        
            <th>Nama Customer</th>
            <th>Cycle</th>
            <th>Status</th>
            <th>Abnormality</th>
            <th>Note</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "db\koneksi.php";
        $sql="select * from delivery order by date";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) { 
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                 <td><?php echo $data["date"]; ?></td>
                 <td><?php echo $data["shift"]; ?></td>
                <td><?php echo $data["nama_customer"]; ?></td>
                <td><?php echo $data["cycle"];   ?></td>
                <td><?php echo $data["status"];   ?></td>
                <td><?php echo $data["abnormality"];   ?></td>
                <td><?php echo $data["note"];   ?></td>
                <td>
                    <a href="db\update.php?no_date=<?php echo htmlspecialchars($data['date']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?date=<?php echo $data['date']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="db\create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
