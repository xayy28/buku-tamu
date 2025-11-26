<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>List Data Buku Tamu</h1>
        <a href="create.php" class="btn btn-primary">Input Buku Tamu</a>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Komentar</th>
      <th scope="col">Jam Masuk</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
        require 'koneksi.php';
        $tampil = $koneksi->query("SELECT * from tamu");
        $no     = 1;
        while ($data = mysqli_fetch_assoc($tampil)) {
            $time = $data['date_created'];
        ?>
    <tr>
        <th scope ="row" ><?php echo $no++?></th>
            <td><?php echo $data['nama']?></td>
            <td><?php echo $data['email']?></td>
            <td><?php echo $data['komentar']?></td>
            <td><?php echo date('d M Y H:i:s', strtotime($time))?></td>
            <td>
    <a href="gedit.php?id=<?php echo $data['id']?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="ghapus.php?id=<?php echo $data['id']?>"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
</td>


    </tr>
    <?php }?>
  </tbody>
</table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>