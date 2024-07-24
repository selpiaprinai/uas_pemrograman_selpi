<?php
include '../koneksi.php';

if (isset($_GET['kodetransaksi'])) {
    $kodetransaksi = $_GET['kodetransaksi'];

    $sql = "DELETE FROM tb_detailtransaksi WHERE kodetransaksi='$kodetransaksi'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}

header("Location: form_datatransaksi.php");
?>
