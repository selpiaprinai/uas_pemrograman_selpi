<?php
include '../koneksi.php';

$sql = "SELECT * FROM tb_detailtransaksi";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Daftar Transaksi</h2>
        <a href="create.php" class="btn btn-success mb-3">Tambah Transaksi Baru</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Kode Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jumlah Buku</th>
                    <th>Status</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["kodetransaksi"]. "</td>";
                        echo "<td>" . $row["kodebuku"]. "</td>";
                        echo "<td>" . $row["tglpinjam"]. "</td>";
                        echo "<td>" . $row["jumlahbuku"]. "</td>";
                        echo "<td>" . $row["status"]. "</td>";
                        echo "<td>" . $row["tglkembali"]. "</td>";
                        echo "<td><a href='update.php?kodetransaksi=".$row["kodetransaksi"]."' class='btn btn-warning'>Edit</a> 
                        <a href='delete.php?kodetransaksi=".$row["kodetransaksi"]."' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

