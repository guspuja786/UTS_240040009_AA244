<?php

class Produk {

    public $nama;
    public $jenis;
    public $harga;
    public $stok;

    public function __construct(
        $nama,
        $jenis,
        $harga,
        $stok
    ){

        if($stok < 0){

            die("Stok tidak boleh negatif");

        }

        $this->nama = $nama;
        $this->jenis = $jenis;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public function cekStok(){

        if($this->stok < 5){

            return "Stok Menipis";

        } else {

            return "Stok Aman";
        }
    }
}

?>