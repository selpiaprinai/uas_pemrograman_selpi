<?php
include '../koneksi.php';

if (isset($_GET['kodekategori'])) {
    $kodekategori = $_GET['kodekategori'];

    $sql = "DELETE FROM tb_kategori WHERE kodekategori='$kodekategori'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}

header("Location: form_kategori.php");
?>
