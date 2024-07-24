<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodekategori = $_POST['kodekategori'];
    $namakategori= $_POST['namakategori'];
    

    $sql = "INSERT INTO tb_kategori (kodekategori, namakategori) VALUES ('$kodekategori', '$namakategori')";

    if ($koneksi->query($sql) === TRUE) {
        echo "DATA BERHASIL DI TAMBAHKAN";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Create Anggota</h2>
        <a href="form_kategori.php" class="btn btn-primary mb-3">KEMBALI</a>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="kodekategori">Kode kategori:</label>
                <input type="text" class="form-control" id="kodekategori" name="kodekategori">
            </div>
            <div class="form-group">
                <label for="namakategori">Nama kategori:</label>
                <input type="text" class="form-control" id="namakategori" name="namakategori">
            </div>
            
            
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>
