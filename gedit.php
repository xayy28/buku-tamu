<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Buku Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<?php
include("koneksi.php");
$edit = mysqli_query($koneksi, "SELECT * FROM tamu WHERE id='$_GET[id]'");
$data = mysqli_fetch_array($edit);

?>

<body>
    <div class="container">
        <form method="post" action="">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="komentar" class="form-label">Komentar</label>
                <textarea class="form-control" id="komentar" name="komentar"
                    rows="3"><?php echo $data['komentar']; ?></textarea>
            </div>
            <button type="reset" value="reset" name="reset" class="btn btn-danger">Reset</button>
            <button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-danger" style="float: right">Kembali</a>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $komentar = $_POST['komentar'];

        $sql = "UPDATE tamu SET nama='$nama', email='$email', komentar='$komentar' WHERE id='$_GET[id]'";
        $query = $koneksi->query($sql); //eksekusi query

        if ($query) {
            echo "<script>
                alert('Terima kasih, data buku tamu berhasil diubah!');
                window.location.href = 'index.php';
              </script>";
        } else {
            echo "<script>
                alert('Maaf, data gagal disimpan. Silakan coba lagi.');
                window.location.href = 'gbook.php';
              </script>";
        }
    }
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>