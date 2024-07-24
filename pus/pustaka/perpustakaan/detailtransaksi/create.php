<?php
include '../koneksi.php';

// Proses input form jika ada data POST yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari form
    $kodetransaksi = $_POST['kodetransaksi'];
    $kodebuku = $_POST['kodebuku'];
    $tglpinjam = $_POST['tglpinjam'];
    $tglkembali = $_POST['tglkembali'];
    $jumlahbuku = $_POST['jumlahbuku'];
    $status = $_POST['status'];

    // Query SQL untuk menyimpan data ke dalam tabel detailtransaksi
    $sql = "INSERT INTO tb_detailtransaksi (kodetransaksi, kodebuku, tglpinjam, tglkembali, jumlahbuku, status) 
            VALUES ('$kodetransaksi', '$kodebuku', '$tglpinjam', '$tglkembali', '$jumlahbuku''$status')";

    // Eksekusi query dan periksa hasilnya
    if ($koneksi->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>data berhasil di tambahkan</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $koneksi->error . "</div>";
    }

    // Tutup koneksi database
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Tambah Data Transaksi</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label>Kode Transaksi</label>
                <input type="text" name="kodetransaksi" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kode Buku</label>
                <input type="text" name="kodebuku" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tglpinjam" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tanggal Kembali</label>
                <input type="date" name="tglkembali" class="form-control">
            </div>
            <div class="form-group">
                <label>Jumlah Buku</label>
                <input type="number" name="jumlahbuku" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" name="status" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>
</html>
