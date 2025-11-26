<?php

include("koneksi.php");
$sql = "DELETE FROM tamu WHERE id='$_GET[id]'";
$query = $koneksi->query($sql); //eksekusi query
if ($query) {
    header("location:index.php");
} else {
    echo "Gagal menghapus data";
}
