<?php
include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- css bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <style>
        .bg-warning {
            background-color: rgb(83, 33, 129) !important;
        }
        .bg-success-subtle {
            background-color: rgb(237, 227, 247) !important;
        }
    </style>
</head>
<body>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg shadow-sm p-2 fixed-top bg-warning sticky-top">
      <div class="container">
        <a class="navbar-brand fw-bold fs-5" href="#"> <span class="fs-3 text-light">MY DAILY JOURNAL</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-light fs-6" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light fs-6" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light fs-6 m-0 ms-lg-3" href="#article">Article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light fs-6 m-0 ms-lg-3" href="#galeri">Gallery</a>
            </li>
        </div>
      </div>
    </nav>
    <!-- navbar end -->

    <!-- home start -->
    <section id="home" class="text-sm-start text-center p-5 bg-success-subtle">
        <div class="container p-5">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
              <img src="gambar/ykmr4.jpg" alt="cakep" class="img-fluid" width="500">
              <div class="text">
                <h1 class="fw-bold display-4">Create Memories, Save Memories, Everyday</h1>
                <h4 class="lead display-6">Mencatat lagu yang didengar sehari-hari oleh seorang mahasiswa UDINUS</h4>
              </div>
            </div>
        </div>
    </section>
    <!-- home end -->

    <!-- article start -->
    <section id="article" class="text-center p-5">
    <div class="container">
        <h1 class="fw-bold display-4 pb-3">article</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        <?php
        $sql = "SELECT * FROM article ORDER BY tanggal DESC";
        $hasil = $conn->query($sql); 

        $no = 1;
        while($row = $hasil->fetch_assoc()){
          ?>
            <div class="col">
              <div class="card h-100">
                  <img src="gambar/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                  <div class="card-body">
                    <h5 class="card-title"><?= $row["judul"]?></h5>
                    <p class="card-text">
                        <?= $row["isi"]?>
                    </p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">
                        <?= $row["tanggal"]?>
                    </small>
                  </div>
              </div>
              </div>
            <?php
          }
          ?> 
        </div>
    </div>
    </section>
    <!-- article end -->

    <!-- galeri start -->
    <section id="galeri" class="bg-success-subtle">
        <div class="container p-5">
            <h1 class="text-center p-5">GALLERY</h1>
            <div class="border border-dark d-flex flex-column justify-content-center align-items-center">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="gambar/ykmr1.jpg" class="d-block w-100" alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img src="gambar/ykmr2.jpg" class="d-block w-100" alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img src="gambar/ykmr3.jpg" class="d-block w-100" alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img src="gambar/ykmr4.jpg" class="d-block w-100" alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img src="gambar/ykmr5.jpg" class="d-block w-100" alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img src="gambar/ykmr6.jpg" class="d-block w-100" alt="..." />
                        </div>
                        <div class="carousel-item">
                            <img src="gambar/ykmr7.jpg" class="d-block w-100" alt="..." />
                        </div>
                    </div>
                    <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#carouselExample"
                    data-bs-slide="prev"
                    >
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#carouselExample"
                    data-bs-slide="next"
                    >
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- galeri end -->

    <!-- footer start -->
    <footer class="p-4 bg-light text-center mt-5">
      Copyright © 2024 pemrograman berbasis web dan komputer, By Laura Salsabilla Lutfiardhana
    </footer>
    <!-- footer end -->

    <!-- js bootstrap start-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <!-- js boststrap end -->
</body>
</html>