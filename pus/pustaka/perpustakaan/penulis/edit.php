<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodepenulis'])) {
    $kodepenulis = $_GET['kodepenulis'];

    $sql = "SELECT * FROM tb_penulis WHERE kodepenulis='$kodepenulis'";
    $result = $koneksi->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-warning'>Transaksi tidak ditemukan.</div>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodepenulis = $_POST['kodepenulis'];
    $namapenulis = $_POST['namapenulis'];
    $alamatpenulis = $_POST['alamatpenulis'];
    $telppenulis = $_POST['telppenulis'];


    $sql = "UPDATE tb_penulis SET namapenulis='$namapenulis', alamatpenulis='$alamatpenulis', telppenulis='$telppenulis' WHERE kodepenulis='$kodepenulis'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Data berhasil diupdate</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $koneksi->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update penulis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Update penulis</h2>
        <?php if (isset($row)): ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="kodepenulis" value="<?php echo $row['kodepenulis']; ?>">
            <div class="form-group">
                <label>nama penulis</label>
                <input type="date" name="namapenulis" class="form-control" value="<?php echo $row['namapenulis']; ?>" required>
            </div>
            <div class="form-group">
                <label>alamat penulis</label>
                <input type="text" name="alamatpenulis" class="form-control" value="<?php echo $row['alamatpenulis']; ?>" required>
            </div>
            <div class="form-group">
                <label>telpon penulis</label>
                <input type="text" name="telppenulis" class="form-control" value="<?php echo $row['telppenulis']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php else: ?>
        <div class="alert alert-warning">Data transaksi tidak ditemukan. Silakan kembali ke <a href="index.php">halaman utama</a>.</div>
        <?php endif; ?>
    </div>
</body>
</html>
