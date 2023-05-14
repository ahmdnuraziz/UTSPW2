<!DOCTYPE html>
<html lang="en">

<?php

include 'koneksi.php';

?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Arsha Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">Arsha</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Detail</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
      data-aos="fade-up" data-aos-delay="200">
      <h1>Toko Vintage Helmets</h1>
      <h2>Produk kami sangat cocok untuk anda yang memiliki hobi bermotor</h2>
    </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
      <img src="assets/img/logooribinal.jpg" class="img-fluid animated" alt="">
    </div>
  </div>
</div>

</section><!-- End Hero -->
        <section id="skills" class="skills">
            <div class="container" data-aos="fade-up">

                <?php $id = $_GET['id'];
                // $sql    = mysqli_query($mysqli, "SELECT * FROM produk WHERE id='$_GET[id]'"); SELECT * FROM produk, kategori WHERE produk.id_kategori = kategori.id
                $sql = mysqli_query($mysqli, "SELECT * FROM produk,kategori_produk WHERE produk.kategori_produk_id = kategori_produk.id_kg AND id='$id'");
                $produk = mysqli_fetch_array($sql);
                ?>
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
                        <img src="<?php echo "admin/gambar/" . $produk['gambar']; ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
                        <h3>
                            <?= $produk['nama'] ?>
                        </h3>
                        <p class="fst-italic">
                            Deskripsi :
                            <?= $produk['deskripsi'] ?>
                        </p>

                        <div class="skills-content">

                            <form action="proses_pesanan.php" method="post">
                                <div class="mb-3">
                                    <label for="nama_pesanan" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama_pesanan" name="nama_pesanan">
                                    <input type="hidden" class="form-control" id="produk_id" name="produk_id" value="<?= $produk['id'] ?>">
                                    <input type="hidden" class="form-control" id="stok" name="stok" value="<?= $produk['stok'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_pesanan" class="form-label">Alamat pesanan</label>
                                    <input type="text" class="form-control" id="alamat_pesanan" name="alamat_pesanan">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No Hp</label>
                                    <input type="number" class="form-control" id="no_hp" name="no_hp">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_pesanan" class="form-label">Jumlah pesanan</label>
                                    <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit" is="submit">Submit</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

            </div>
        </section><!-- End Skills Section -->

        <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>ORIBINAL HELMETS CUSTOM</h3>
            <p>
              Jln.karawitan no:42D  <br>
              nitiprayan kasihan Btl YK<br>
              United States <br><br>
              <strong>Phone:</strong> 082135288100<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Tentang</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Detail</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Produk Kami</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Helm Slimhead</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Helm Fullface</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Helm Minihead</a></li>
              
            </ul>
          </div>

          

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>