<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodepenulis = $_POST['kodepenulis'];
    $namapenulis = $_POST['namapenulis'];
    $alamatpenulis = $_POST['alamatpenulis'];
    $telppenulis = $_POST['telppenulis']; // tambahkan tanda titik koma di akhir

    // Menggunakan prepared statements untuk keamanan
    $sql = $koneksi->prepare("INSERT INTO tb_penulis (kodepenulis, namapenulis, alamatpenulis, telppenulis) 
                              VALUES ('$kodepenulis', '$namapenulis', '$alamatpenulis', '$telppenulis')");
    // $sql->bind_param("ssss", $kodepenulis, $namapenulis, $alamatpenulis, $telppenulis);

    if ($sql->execute() === TRUE) {
        echo "DATA BERHASIL DI TAMBAHKAN";
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah penulis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Tambah penulis</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label>Kode penulis</label>
                <input type="text" name="kodepenulis" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama penulis</label>
                <input type="text" name="namapenulis" class="form-control" required> <!-- Ubah tipe input ke text -->
            </div>
            <div class="form-group">
                <label>Alamat penulis</label>
                <input type="text" name="alamatpenulis" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Telpon penulis</label>
                <input type="text" name="telppenulis" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>
</html>
