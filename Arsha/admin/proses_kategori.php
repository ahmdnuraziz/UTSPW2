<?php 
include_once("../koneksi.php");
if (isset($_POST['submit'])) {
    $nama_kategori = $_POST['nama_kategori'];

    $result = mysqli_query($mysqli, "INSERT INTO kategori_produk(nama_kategori) VALUES('$nama_kategori')");


    echo '<script language="javascript">
                                alert ("Berhasil Input Data kategori");
                                window.location="kategori.php";
                                </script>';
} else {
    echo '<script language="javascript">
                                    alert ("Gagal");
                                    window.location="kategori.php"";
                                    </script>';
}

if (isset($_POST['update'])) {
    $id_kg = $_POST['id_kg'];

    $nama_kategori = $_POST['nama_kategori'];



    if (empty($nama_kategori)) {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Mohon Isi Semua');
    window.location.href='kategori.php';
    </script>");
    } else {
        // update user data
        $result = mysqli_query($mysqli, "UPDATE kategori_produk SET nama_kategori='$nama_kategori' WHERE id_kg=$id_kg");
        // Redirect to homepage to display updated user in list
        header("Location: kategori.php");
    }
}

// Get id from URL to delete that user
$id_kg = $_GET['id_kg'];

// Delete user row from table based on given id_kg
$result = mysqli_query($mysqli, "DELETE FROM kategori_produk WHERE id_kg=$id_kg");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:kategori.php");



?>