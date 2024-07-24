<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Buku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Create Buku</h2>
        <a href="form_buku.php" class="btn btn-primary mb-3">KEMBALI</a>
<form method="post" action="simpan_buku.php">
    Judul: <input type="text" name="judul"><br>
    Penulis: 
    <select name="id_penulis">
        <?php
        $result = $conn->query("SELECT * FROM tb_buku");
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['id_penulis']."'>".$row['nama_penulis']."</option>";
        }
        ?>
    </select><br>
    Penerbit: 
    <select name="id_penerbit">
        <?php
        $result = $conn->query("SELECT * FROM tb_buku");
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['id_penerbit']."'>".$row['nama_penerbit']."</option>";
        }
        ?>
    </select><br>
    Tahun Terbit: <input type="text" name="tahun_terbit"><br>
    <input type="submit" value="Simpan">
</form>
