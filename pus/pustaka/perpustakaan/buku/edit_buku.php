<?php
include '../koneksi.php';

$row = null; // Inisialisasi variabel $row

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodebuku'])) {
    $kodebuku = $_GET['kodebuku'];

    // Tambahkan debugging
    echo "<div class='alert alert-info'>DEBUG: kodebuku = $kodebuku</div>";

    $sql = "SELECT * FROM tb_buku WHERE kodebuku='$kodebuku'";
    $result = $koneksi->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-warning'>buku tidak ditemukan. Query: $sql</div>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodebuku = $_POST['kodebuku'];
    $judulbuku = $_POST['judulbuku'];
    $isbn = $_POST['ISBN'];
    $kodepenulis = $_POST['kodepenulis'];
    $kodepenerbit = $_POST['kodepenerbit'];
    $kodekategori = $_POST['kodekategori'];
    $tglterbit = $_POST['tglterbit'];
    $jlhhalaman = $_POST['jlhhalaman'];

    $sql = "UPDATE tb_buku SET judulbuku='$judulbuku', ISBN='$isbn', kodepenulis='$kodepenulis', kodepenerbit='$kodepenerbit', kodekategori='$kodekategori', tglterbit='$tglterbit', jlhhalaman='$jlhhalaman' WHERE kodebuku='$kodebuku'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Record updated successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $koneksi->error . "</div>";
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Buku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Update Buku</h2>
        <?php if ($row): ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="kodebuku" value="<?php echo $row['kodebuku']; ?>">
            <div class="form-group">
                <label>judul buku</label>
                <input type="text" name="judulbuku" class="form-control" value="<?php echo $row['judulbuku']; ?>" required>
            </div>
            <div class="form-group">
                <label>isbn</label>
                <input type="text" name="ISBN" class="form-control" value="<?php echo $row['ISBN']; ?>" required>
            </div>
            <div class="form-group">
                <label>kode penulis</label>
                <input type="text" name="kodepenulis" class="form-control" value="<?php echo $row['kodepenulis']; ?>" required>
            </div>
            <div class="form-group">
                <label>kode penerbit</label>
                <input type="text" name="kodepenerbit" class="form-control" value="<?php echo $row['kodepenerbit']; ?>" required>
            </div>
            <div class="form-group">
                <label>kode kategori</label>
                <input type="text" name="kodekategori" class="form-control" value="<?php echo $row['kodekategori']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tanggal terbit</label>
                <input type="text" name="tglterbit" class="form-control" value="<?php echo $row['tglterbit']; ?>" required>
            </div>
            <div class="form-group">
                <label>jumlah halaman</label>
                <input type="text" name="jlhhalaman" class="form-control" value="<?php echo $row['jlhhalaman']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php else: ?>
        <div class="alert alert-warning">Data buku tidak ditemukan. Silakan kembali ke <a href="form_buku.php">halaman utama</a>.</div>
        <?php endif; ?>
    </div>
</body>
</html>
