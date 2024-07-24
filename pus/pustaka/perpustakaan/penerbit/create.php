<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodepenerbit = $_POST['kodepenerbit'];
    $namapenerbit = $_POST['namapenerbit'];
    $alamatpenerbit = $_POST['alamatpenerbit'];
    $tlppenerbit = $_POST['tlppenerbit']; // tambahkan tanda titik koma di akhir

    // Menggunakan prepared statements untuk keamanan
    $sql = $koneksi->prepare("INSERT INTO tb_penerbit (kodepenerbit, namapenerbit, alamatpenerbit, tlppenerbit) 
                              VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $kodepenerbit, $namapenerbit, $alamatpenerbit, $tlppenerbit);

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
    <title>Tambah penerbit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Tambah penerbit</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label>Kode penerbit</label>
                <input type="text" name="kodepenerbit" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama penerbit</label>
                <input type="text" name="namapenerbit" class="form-control" required> <!-- Ubah tipe input ke text -->
            </div>
            <div class="form-group">
                <label>Alamat penerbit</label>
                <input type="text" name="alamatpenerbit" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Telpon penerbit</label>
                <input type="text" name="tlppenerbit" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>
</html>
