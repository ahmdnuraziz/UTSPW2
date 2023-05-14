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

                                    <?php
                                    $sql = mysqli_query($mysqli, "SELECT * FROM pesanan, produk WHERE produk.id = pesanan.produk_id") or die(mysqli_error($mysqli));
                                    ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Nama Pesanan</th>
                                                <th scope="col">Alamat Pesanan</th>
                                                <th scope="col">No Hp</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Jumlah Pesanan</th>
                                                <th scope="col">Produk</th>
                                                <th scope="col">Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nomor = 1;
                                            while ($pesanan = mysqli_fetch_array($sql)) { ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $nomor++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $pesanan['tanggal'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $pesanan['nama_pesanan'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $pesanan['alamat_pesanan'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $pesanan['no_hp'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $pesanan['email'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $pesanan['jumlah_pesanan'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $pesanan['nama'] ?>
                                                    </td>
                                                    <td>
                                                        <a href="detail_pesanan.php?id_psn=<?php echo $pesanan['id_psn'] ?>"
                                                            class="btn btn-primary">detail</a>
                                                        <a href="proses_pesanan.php?id_psn=<?php echo $pesanan['id_psn'] ?>&produk_id=<?php echo $pesanan['produk_id'] ?>"
                                                            class="btn btn-danger">batal</a>
                                                    </td>


                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="proses_produk.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama Produk</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                            </div>
                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="text" class="form-control" id="harga_jual" name="harga_jual"
                                    placeholder="harga jual">
                            </div>
                            <div class="form-group">
                                <label for="harga_beli">Harga Beli</label>
                                <input type="text" class="form-control" id="harga_beli" name="harga_beli"
                                    placeholder="harga beli">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" class="form-control" id="stok" name="stok" placeholder="stok">
                            </div>
                            <div class="form-group">
                                <label for="min_stok">Min Stok</label>
                                <input type="text" class="form-control" id="min_stok" name="min_stok"
                                    placeholder="min stok">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                    placeholder="deskripsi">
                            </div>
                            <div class="form-group">
                                <label for="id_kg" class="form-label">Kategori</label>
                                <select class="form-select" id="id_kg" name="id_kg"
                                    aria-label="Floating label select example">
                                    <option selected>Open this select menu</option>
                                    <?php
                                    $kg = mysqli_query($mysqli, "SELECT * FROM kategori_produk") or die(mysqli_error($mysqli));

                                    while ($kategori = mysqli_fetch_array($kg)) {
                                        echo "<option value=$kategori[id_kg]>$kategori[nama_kategori]</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" placeholder="gambar">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="submit" name="submit">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php

        include 'master/footer.php';

        ?>