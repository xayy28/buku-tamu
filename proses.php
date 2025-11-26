<?php 
//include |require|include_once|require_once
require 'koneksi.php';

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $komentar = $_POST['komentar'];

    $sql = "INSERT INTO tamu(nama,email,komentar)
            Values ('$nama','$email','$komentar')";
    $query = $koneksi->query($sql); //eksekusi query

if($query){
    echo "Berhasil menyimpan data";
}else{
    echo "Gagal menyimpan data";
}

}

?>