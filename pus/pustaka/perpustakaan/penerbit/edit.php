<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodepenerbit'])) {
    $kodepenerbit = $_GET['kodepenerbit'];

    $sql = "SELECT * FROM tb_penerbit WHERE kodepenerbit='$kodepenerbit'";
    $result = $koneksi->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-warning'>Transaksi tidak ditemukan.</div>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodepenerbit = $_POST['kodepenerbit'];
    $namapenerbit = $_POST['namapenerbit'];
    $alamatpenerbit = $_POST['alamatpenerbit'];
    $tlppenerbit = $_POST['tlppenerbit'];


    $sql = "UPDATE tb_penerbit SET namapenerbit='$namapenerbit', alamatpenerbit='$alamatpenerbit', tlppenerbit='$tlppenerbit' WHERE kodepenerbit='$kodepenerbit'";

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
    <title>Update penerbit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Update penerbit</h2>
        <?php if (isset($row)): ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="kodepenerbit" value="<?php echo $row['kodepenerbit']; ?>">
            <div class="form-group">
                <label>nama penerbit</label>
                <input type="date" name="namapenerbit" class="form-control" value="<?php echo $row['namapenerbit']; ?>" required>
            </div>
            <div class="form-group">
                <label>alamat penerbit</label>
                <input type="text" name="alamatpenerbit" class="form-control" value="<?php echo $row['alamatpenerbit']; ?>" required>
            </div>
            <div class="form-group">
                <label>tlppenerbit</label>
                <input type="text" name="tlppenerbit" class="form-control" value="<?php echo $row['tlppenerbit']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php else: ?>
        <div class="alert alert-warning">Data transaksi tidak ditemukan. Silakan kembali ke <a href="index.php">halaman utama</a>.</div>
        <?php endif; ?>
    </div>
</body>
</html>
