<?php
include '../koneksi.php';

if (isset($_GET['kodepenerbit'])) {
    $kodepenerbit = $_GET['kodepenerbit'];

    $sql = "DELETE FROM tb_penerbit WHERE kodepenerbit='$kodepenerbit'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}

header("Location: form_penerbit.php");
?>
