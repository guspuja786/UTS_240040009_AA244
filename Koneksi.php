<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "inventaris_toko"
);

if(!$koneksi){
    die("Koneksi database gagal");
}

?>