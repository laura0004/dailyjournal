<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['user'];
  
  //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
  $password = md5($_POST['pass']);

	//prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	//parameter binding 
  $stmt->bind_param("ss", $username, $password);//username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
	  //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");
  }

	//menutup koneksi database
  $stmt->close();
  $conn->close();
} else {
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
          .img-circle {
            border-radius: 100px;
          }
          .btn-secondary {
            background-color: rgb(83, 33, 129) !important;
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
                <a class="nav-link text-light fs-6" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light fs-6 m-0 ms-lg-3" href="index.php#artikel">Article</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light fs-6 m-0 ms-lg-3" href="index.php#galeri">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light fs-6" href="login.php">Login</a>
              </li>
          </div>
        </div>
      </nav>
      <!-- navbar end -->

      <!-- login start -->
      <section id="home" class="text-sm-start text-center p-5 bg-success-subtle">
        <div class="container">
          <h1 class="text-center p-2">HAI! LOGIN YUK!</h1>
          <div class="text-center ">
            <img src="gambar/ykmr4.jpg" alt="ykmrh" class="img-circle" width="200">
            <br>
            <br>
            <!-- <?php
            $username = "laulua";
            $password = "liuliu";

            ?> -->
            <h4>
              <!-- <?php
              if ($_REQUEST) {
                if ($_POST['user'] == "laulua" and $_POST['pass'] == "liuliu") {
                  echo "Selamat Datang!";
                } else {
                  echo "Username dan Password tidak cocok";
                }
              }
              ?> -->
            </h4>
            
            <br>

            <form method="post">
              <div class="class">
                <input type="text" name="user" class="form-control p-3 text-center" placeholder="username">
              </div>
              <div class="class">
                <input type="password" name="pass" class="form-control p-3 text-center" placeholder="password">
              </div>
              <br>
              <button type="submit" class="btn btn-secondary" width="200">Login</button>
            </form>

            
          </div>
        </div>
      </section>
      <!-- login end -->

      <!-- js bootstrap start-->
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
      ></script>
      <!-- js boststrap end -->
  </body>
  </html>
<?php
}
?>