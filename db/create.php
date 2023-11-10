<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $date=input($_POST["date"]);
        $shift=input($_POST["shift"]);
        $nama_customer=input($_POST["nama_customer"]);
        $cycle=input($_POST["cycle"]);
        $status=input($_POST["status"]);
        $abnormality=input($_POST["abnormality"]);
        $note=input($_POST["note"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into delivery (date,shift,nama_customer,cycle,status,abnormality,note) values
		('$date','$shift','$nama_customer','$cycle','$status','$abnormality','$note')";

       

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);













        

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-group">
            <label>Date:</label>
            <input type="date" name="date" class="form-control" placeholder="Masukan Tanggal" required />

        </div>
        <div class="form-group">
            <label>Shift:</label>
            <input type="text" name="shift" class="form-control" placeholder="Masukan Shift" required />

        </div>
        <div class="form-group">
            <label>Nama Customer:</label>
            <input type="text" name="nama_customer" class="form-control" placeholder="Masukan Nama Customer" required />

        </div>
        <div class="form-group">
            <label>Cycle:</label>
            <input type="text" name="cycle" class="form-control" placeholder="Masukan Nomor Cycle" required/>
        </div>
       <div class="form-group">
            <label>Status :</label>
            <input type="text" name="status" class="form-control" placeholder="Masukan Status Delivery" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Abnormality:</label>
            <input type="text" name="abnormality" class="form-control" placeholder="Jelaskan Abnormality" required/>
        </div>
        <div class="form-group">
            <label>Note:</label>
            <textarea name="note" class="form-control" rows="5"placeholder="Masukan Note" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>