<?php
include_once("koneksi.php");

date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia

// Check If form submitted, insert form data into users table.
if (isset($_POST['submit'])) {
    $nama_pesanan = $_POST['nama_pesanan'];
    $produk_id = $_POST['produk_id'];
    $alamat_pesanan = $_POST['alamat_pesanan'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $jumlah_pesanan = $_POST['jumlah_pesanan'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $stok = $_POST['stok'];
    $apd_stok = $stok - $jumlah_pesanan;
    // var_dump($apd_stok);
    // die;






    $result = mysqli_query($mysqli, "INSERT INTO pesanan(produk_id,nama_pesanan,alamat_pesanan,no_hp,email,jumlah_pesanan,deskripsi,tanggal) VALUES('$produk_id','$nama_pesanan','$alamat_pesanan','$no_hp','$email','$jumlah_pesanan','$deskripsi','$tanggal')");

    $update_stok = mysqli_query($mysqli, "UPDATE produk SET stok='$apd_stok' WHERE id=$produk_id");

    echo '<script language="javascript">
                                alert ("Pesanan Berhasil");
                                window.location="index.php";
                                </script>';
} else {
    echo '<script language="javascript">
                                    alert ("Pesanan Gagal");
                                    window.location="pesanan.php"";
                                    </script>';
}