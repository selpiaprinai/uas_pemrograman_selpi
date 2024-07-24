<?php
include '../koneksi.php';

$row = null; // Inisialisasi variabel $row

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodekategori'])) {
    $kodekategori = $_GET['kodekategori'];

    // Tambahkan debugging
    echo "<div class='alert alert-info'>DEBUG: kodekategori = $kodekategori</div>";

    $sql = "SELECT * FROM tb_kategori WHERE kodekategori='$kodekategori'";
    $result = $koneksi->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-warning'>Anggota tidak ditemukan. Query: $sql</div>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodekategori = $_POST['kodekategori'];
    $namakategori = $_POST['namakategori'];
    

    $sql = "UPDATE tb_kategori SET namakategori='$namakategori' WHERE kodekategori='$kodekategori'";

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
    <title>Update kategori</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Update kategori</h2>
        <?php if ($row): ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="kodekategori" value="<?php echo $row['kodekategori']; ?>">
            <div class="form-group">
                <label>Nama kategori</label>
                <input type="text" name="namakategori" class="form-control" value="<?php echo $row['namakategori']; ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php else: ?>
        <div class="alert alert-warning">Data kategori tidak ditemukan. Silakan kembali ke <a href="form_kategori.php">halaman utama</a>.</div>
        <?php endif; ?>
    </div>
</body>
</html>
