<?php

include 'koneksi.php';
include 'Produk.php';

if(isset($_POST['simpan'])){

    $nama   = $_POST['nama'];
    $jenis  = $_POST['jenis'];
    $harga  = $_POST['harga'];
    $stok   = $_POST['stok'];

    $produk = new Produk(
        $nama,
        $jenis,
        $harga,
        $stok
    );

    $query = "INSERT INTO produk
    (nama_produk, jenis_produk, harga, stok)

    VALUES

    ('$nama','$jenis','$harga','$stok')";

    mysqli_query($koneksi, $query);

    echo "Produk berhasil ditambahkan";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>

<body>

<h2>Tambah Produk</h2>

<form method="POST">

    <input type="text"
    name="nama"
    placeholder="Nama Produk"
    required>

    <br><br>

    <select name="jenis" required>

        <option value="">Pilih Jenis</option>
        <option value="Laptop">Laptop</option>
        <option value="Smartphone">Smartphone</option>

    </select>

    <br><br>

    <input type="number"
    name="harga"
    placeholder="Harga">

    <br><br>

    <input type="number"
    name="stok"
    placeholder="Stok">

    <br><br>

    <button type="submit" name="simpan">
        Simpan
    </button>

</form>

</body>
</html>