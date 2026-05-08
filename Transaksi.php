<?php

include 'koneksi.php';

if(isset($_POST['transaksi'])){

    $id_produk = $_POST['id_produk'];
    $jumlah    = $_POST['jumlah'];

    $ambil = mysqli_query(
        $koneksi,
        "SELECT * FROM produk
        WHERE id='$id_produk'"
    );

    $data = mysqli_fetch_assoc($ambil);

    $stok_lama = $data['stok'];

    if($jumlah > $stok_lama){

        echo "Stok tidak mencukupi";

    } else {

        $stok_baru = $stok_lama - $jumlah;

        mysqli_query(
            $koneksi,
            "UPDATE produk
            SET stok='$stok_baru'
            WHERE id='$id_produk'"
        );

        mysqli_query(
            $koneksi,
            "INSERT INTO transaksi
            (id_produk, jumlah_beli)

            VALUES

            ('$id_produk','$jumlah')"
        );

        echo "Transaksi berhasil";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi</title>
</head>

<body>

<h2>Form Transaksi</h2>

<form method="POST">

    <select name="id_produk">

        <?php

        $produk = mysqli_query(
            $koneksi,
            "SELECT * FROM produk"
        );

        while($p = mysqli_fetch_array($produk)){

            echo "
            <option value='".$p['id']."'>
            ".$p['nama_produk']."
            </option>";
        }

        ?>

    </select>

    <br><br>

    <input type="number"
    name="jumlah"
    placeholder="Jumlah beli">

    <br><br>

    <button type="submit" name="transaksi">
        Proses
    </button>

</form>

</body>
</html>