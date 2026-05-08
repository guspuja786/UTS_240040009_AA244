<?php

include 'koneksi.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <style>

        table{
            width:100%;
            border-collapse: collapse;
        }

        table, th, td{
            border:1px solid black;
            padding:10px;
        }

        .warning{
            color:red;
            font-weight:bold;
        }

    </style>

</head>

<body>

<h2>Data Produk</h2>

<table>

    <tr>

        <th>No</th>
        <th>Nama Produk</th>
        <th>Jenis</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Status</th>

    </tr>

    <?php

    $no = 1;

    $data = mysqli_query(
        $koneksi,
        "SELECT * FROM produk"
    );

    while($d = mysqli_fetch_array($data)){

        echo "<tr>";

        echo "<td>".$no++."</td>";
        echo "<td>".$d['nama_produk']."</td>";
        echo "<td>".$d['jenis_produk']."</td>";
        echo "<td>".$d['harga']."</td>";
        echo "<td>".$d['stok']."</td>";

        if($d['stok'] < 5){

            echo "
            <td class='warning'>
            Stok Menipis
            </td>";

        } else {

            echo "<td>Stok Aman</td>";
        }

        echo "</tr>";
    }

    ?>

</table>

<br><br>

<h2>Rekap Transaksi</h2>

<table>

    <tr>

        <th>No</th>
        <th>Nama Produk</th>
        <th>Jumlah Beli</th>
        <th>Tanggal</th>

    </tr>

    <?php

    $no = 1;

    $transaksi = mysqli_query(

        $koneksi,

        "SELECT transaksi.*,
        produk.nama_produk

        FROM transaksi

        JOIN produk

        ON transaksi.id_produk = produk.id"

    );

    while($t = mysqli_fetch_array($transaksi)){

        echo "<tr>";

        echo "<td>".$no++."</td>";
        echo "<td>".$t['nama_produk']."</td>";
        echo "<td>".$t['jumlah_beli']."</td>";
        echo "<td>".$t['tanggal']."</td>";

        echo "</tr>";
    }

    ?>

</table>

</body>
</html>