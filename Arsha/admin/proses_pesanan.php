<?php

include_once("../koneksi.php");

//mengambil id pesanan dan id produk dari query string
$id_psn = $_GET['id_psn'];
$produk_id = $_GET['produk_id'];

//mengambil jumlah stok dari tabel produk
$query_stok = "SELECT stok FROM produk WHERE id = $produk_id";
$result_stok = mysqli_query($mysqli, $query_stok);
$stok = mysqli_fetch_assoc($result_stok)['stok'];

$query_jumlah = "SELECT jumlah_pesanan FROM pesanan WHERE id_psn = $id_psn";
$result_jumlah = mysqli_query($mysqli, $query_jumlah);
$jumlah = mysqli_fetch_assoc($result_jumlah)['jumlah_pesanan'];

//mengupdate stok barang di tabel produk
$query_update_stok = "UPDATE produk SET stok = " . ($stok + $jumlah) . " WHERE id = $produk_id";
mysqli_query($mysqli, $query_update_stok);

//menghapus pesanan dari tabel pesanan
$query_hapus_pesanan = "DELETE FROM pesanan WHERE id_psn = $id_psn";
mysqli_query($mysqli, $query_hapus_pesanan);

header("Location:pesanan.php");