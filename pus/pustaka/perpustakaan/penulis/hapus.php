<?php
include '../koneksi.php';

if (isset($_GET['kodepenulis'])) {
    $kodepenulis = $_GET['kodepenulis'];

    $sql = "DELETE FROM tb_penulis WHERE kodepenulis='$kodepenulis'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}

header("Location: form_penulis.php");
?>
