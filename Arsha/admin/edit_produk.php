<?php

include 'master/header.php';

?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php

        include 'master/topbar.php';
        include 'master/sidebar.php';

        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Starter Page</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php $id = $_GET['id'];
                                    // $sql    = mysqli_query($mysqli, "SELECT * FROM produk WHERE id='$_GET[id]'"); SELECT * FROM produk, kategori WHERE produk.id_kategori = kategori.id
                                    $sql = mysqli_query($mysqli, "SELECT * FROM produk,kategori_produk WHERE produk.kategori_produk_id = kategori_produk.id_kg AND id='$id'");
                                    $produk = mysqli_fetch_array($sql);
                                    ?>

                                    <form method="post" action="proses_produk.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="id" name="id"
                                                value="<?= $produk['id'] ?>" \>

                                        </div>
                                        <div class="form-group">
                                            <label for="nama_kategori">Nama Kategori</label>
                                            <select class="form-select" id="id_kg" name="id_kg"
                                                aria-label="Floating label select example">
                                                <option value="<?= $produk['kategori_produk_id'] ?>"><?= $produk['nama_kategori'] ?>"</option>
                                                <?php
                                                $kg = mysqli_query($mysqli, "SELECT * FROM kategori_produk") or die(mysqli_error($mysqli));

                                                while ($kategori = mysqli_fetch_array($kg)) {
                                                    echo "<option value=$kategori[id_kg]>$kategori[nama_kategori]</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Produk</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                value="<?= $produk['nama'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_jual">Harga Jual</label>
                                            <input type="text" class="form-control" id="harga_jual" name="harga_jual"
                                                value="<?= $produk['harga_jual'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_beli">Harga Beli</label>
                                            <input type="text" class="form-control" id="harga_beli" name="harga_beli"
                                                value="<?= $produk['harga_beli'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="stok">Stok</label>
                                            <input type="text" class="form-control" id="stok" name="stok"
                                                value="<?= $produk['stok'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="min_stok">Min Stok</label>
                                            <input type="text" class="form-control" id="min_stok" name="min_stok"
                                                value="<?= $produk['min_stok'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                value="<?= $produk['deskripsi'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" class="form-control" id="gambar" name="gambar"
                                                placeholder="gambar">
                                        </div>


                                        <button type="submit" name="update" class="btn btn-primary">Edit</button>
                                    </form>


                                </div>
                            </div>


                        </div>
                        <!-- /.col-md-6 -->

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Button trigger modal -->


        <!-- Modal -->
        <?php

        include 'master/footer.php';

        ?>