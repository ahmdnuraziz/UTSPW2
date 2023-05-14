<?php 

include_once("../koneksi.php");
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $id_kg = $_POST['id_kg'];
    $generet = random_bytes(4);
    $token = (bin2hex($generet));
    $kode = str_replace(' ', '', $token);
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $min_stok = $_POST['min_stok'];
    $deskripsi = $_POST['deskripsi'];
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = 'gambar/';

    move_uploaded_file($source, $folder . $nama_file);


    $result = mysqli_query($mysqli, "INSERT INTO produk(kode, nama, harga_jual, harga_beli, stok, min_stok, deskripsi, kategori_produk_id, gambar) VALUES('$kode', '$nama', '$harga_jual','$harga_beli','$stok', '$min_stok', '$deskripsi', '$id_kg', '$nama_file')");

    echo '<script language="javascript">
                                alert ("Berhasil Input Data produk");
                                window.location="index.php";
                                </script>';
} else {
    echo '<script language="javascript">
                                    alert ("Gagal");
                                    window.location="index.php"";
                                    </script>';
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $min_stok = $_POST['min_stok'];
    $deskripsi = $_POST['deskripsi'];
    $id_kg = $_POST['id_kg'];
    $gambar = $_POST['gambar'];

    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = 'gambar/';





    if (empty($nama)) {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Mohon Isi Semua');
    window.location.href='index.php';
    </script>");
    } else {

        if (empty($nama_file)) {
            // update user data
            $result = mysqli_query($mysqli, "UPDATE produk SET nama='$nama',kategori_produk_id='$id_kg',harga_jual='$harga_jual',harga_beli='$harga_beli',stok='$stok',min_stok='$min_stok',deskripsi='$deskripsi' WHERE id=$id");
            // Redirect to homepage to display updated user in list
            header("Location: index.php");
        } else {
            // var_dump($nama_file);
            // die;
            // update user data
            unlink($folder . $lm_gambar);
            move_uploaded_file($source, $folder . $nama_file);
            $result = mysqli_query($mysqli, "UPDATE produk SET nama='$nama',kategori_produk_id='$id_kg',harga_jual='$harga_jual',harga_beli='$harga_beli',stok='$stok',min_stok='$min_stok',deskripsi='$deskripsi', gambar='$nama_file' WHERE id=$id");
            // Redirect to homepage to display updated user in list
            header("Location: index.php");
        }
    }
}

// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM produk WHERE id=$id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");

?>