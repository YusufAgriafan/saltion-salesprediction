<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALTION</title>
    <link rel="stylesheet" type="text/css" href="Asset/css1/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Asset/css2/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="Asset/css2/coba2.css">
    <link rel="stylesheet" href="Asset/css2/coba3.css">
</head>
<body>
<?php
	session_start();

	if (isset($_SESSION['username']) && isset($_SESSION['email']) && isset($_SESSION['password'])) {
		$username = $_SESSION['username'];
    	$email = $_SESSION['email'];
    	$password = $_SESSION['password'];
	} else {

	}
?>


    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="Asset/img/logo.png"style="size:50%;" ></a>
                <button 
                    class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <?php
                        	if (!isset($_SESSION['username']) && !isset($_SESSION['email']) && !isset($_SESSION['password'])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="Main/masuk.php">MASUK</a>
                        </li>
                        <?php }?>
                        <li class="nav-item">
                            <a class="nav-link" href="#top">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#objective">METODE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">LAYANAN</a>
                        </li>
                        <?php
                        	if (isset($_SESSION['username']) && isset($_SESSION['email']) && isset($_SESSION['password'])) {
                        ?>
		                        <li class="nav-item">
		                            <a class="nav-link" href="Kmean/input_Kmean.php">KMEAN</a>
		                        </li>
		                        <li class="nav-item">
		                            <a class="nav-link" href="Nbayes/input_Nbayes.php">NAIVE BAYES</a>
		                        </li>
		                        <li class="nav-item">
		                            <a class="nav-link" href="Main/TombolTraining.php">TRAINING</a>
		                        </li>
		                        <li class="nav-item">
		                            <a class="nav-link" href="Main/TombolTesting.php">TESTING</a>
		                        </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Main/keluar.php">KELUAR</a>
                                </li>
                           <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <!-- Banner Section -->
    <section id="perkenalan-diri">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>Hi,Yang Disana.</h3>
                    <h3>Masuk terlebih dahulu untuk mengakses fitur-fitur kami</h3>
                    <h1>We Are <span class="input"></span></h1>
                    <p>
                        Selamat datang di website kami yang membahas tentang prediksi probabilitas penjualan yang naik atau turun berdasarkan data rata-rata probabilitas penjualan dari 45 toko di berbagai wilayah. Kami menggunakan dua metode, yaitu k-means dan naive Bayes, untuk mengolah data dan membuat prediksi yang akurat.
                    </p>
                    <a href="https://www.kaggle.com/datasets/yasserh/walmart-dataset">
                        <button type="button" class="btn btn-warning btn-lg">Download Dataset</button>
                    </a>
                </div>
                <div class="col-md-4">
                    <img src="Asset/img/Walmart 2.png" class="img-fluid" width="400" height="500">
                </div>
            </div>
        </div>
        <img src="Asset/img/images/wave1.png" class="bottom-img">
    </section>

    <!-- About Me -->
    <section id="objective">
        <div class="container">
            <h1 class="title text-center">METODE</h1>
            <div class="row">
                <div class="col-md-6">
                    <img src="Asset/img/Walmart.png" class="img-fluid">
                </div> 
                <div class="col-md-6 about-me" >
                    <p class="about-title">Metode-metode yang kami gunakan</p>
                    <ul>
                        <li>Metode k-means digunakan untuk melakukan analisis klastering pada data probabilitas penjualan dari setiap toko. Dengan menggunakan teknik ini, kami dapat mengelompokkan toko-toko yang memiliki pola penjualan yang serupa ke dalam klaster yang sama. Dengan cara ini, kami dapat memahami lebih baik karakteristik penjualan dari setiap klaster dan memperkirakan probabilitas penjualan di masa depan.</li>
                        <li>Sementara itu, metode naive Bayes digunakan untuk membuat prediksi probabilitas penjualan di masa depan berdasarkan data rata-rata probabilitas penjualan dari seluruh toko. Metode ini mengasumsikan bahwa setiap toko memiliki pengaruh yang sama terhadap rata-rata probabilitas penjualan, sehingga kami dapat membuat prediksi yang akurat berdasarkan data historis.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="services">
        <div class="container">
            <h1 class="title text-center">LAYANAN</h1>
            <p align="center" style="font-size: 20px; color: black; align-self:center; font-weight: 500;">Layanan kami memperkirakan apakah penjualan di toko Walmart akan melampaui rata-rata atau tidak dengan menggunakan beberapa variabel seperti suhu, jenis hari, dan biaya bahan bakar. Dengan mempertimbangkan faktor-faktor ini, kami memberikan hasil akurat dan berguna bagi pelanggan kami di industri ritel. Kami selalu berusaha memberikan solusi inovatif bagi pelanggan kami untuk mengambil keputusan bisnis yang tepat dan strategis.</p>
            <br>
            <div class="container">
                <div class="row main-row p-2">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="blog-img">
                            <img src="Asset/img/Walmart.JPG" alt="projectfoto" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="blog-titte mb-3">
                            <h3>Probabilitas Penjualan dengan KMEAN</h3>
                        </div>
                        <div class="blog-desc mb-2">
                            <p>Untuk membantu Anda dalam menganalisis probabilitas penjualan toko Anda, kami menyediakan fitur yang disebut "Probabilitas Penjualan dengan KMEAN". Dengan fitur ini, Anda dapat memperoleh prediksi akurat mengenai apakah penjualan toko Anda akan melampaui rata-rata atau tidak. Untuk menggunakan fitur ini, Anda dapat mengklik menu "KMEAN" pada navigation bar setelah Anda masuk terlebih dahulu.</p>
                        </div>
                    </div>
                </div>

                <div class="row main-row p-2">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="blog-img">
                            <img src="Asset/img/Walmart-2.PNG" alt="projectfoto" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="blog-titte mb-3">
                            <h3>Probabilitas Penjualan dengan NAIVE BAYES</h3>
                        </div>
                        <div class="blog-desc mb-2">
                            <p>Kami juga menyediakan fitur "Probabilitas Penjualan dengan Naive Bayes" untuk membantu Anda menganalisis penjualan toko Anda. Dengan menggunakan algoritma Naive Bayes, kami dapat memproses data penjualan Anda dengan lebih akurat dan cepat. Untuk menggunakan fitur ini, Anda dapat mengklik menu "NBAYES" pada navigation bar setelah Anda masuk terlebih dahulu.</p>
                        </div>
                    </div>
                </div>

                <div class="row main-row p-2">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="blog-img">
                            <img src="Asset/img/Walmart-3.JPG" alt="projectfoto" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="blog-titte mb-3">
                            <h3>TRAINING DAN TESTING</h3>
                        </div>
                        <div class="blog-desc mb-2">
                            <p>Kami menyediakan layanan untuk membantu Anda menentukan algoritma yang paling optimal untuk menganalisis data penjualan Anda, yaitu Naive Bayes atau KMEAN. Untuk mengetahui algoritma mana yang paling cocok untuk data Anda, kami telah menyediakan fitur "Training dan Testing" yang memungkinkan Anda untuk membandingkan kinerja kedua algoritma tersebut. Untuk menggunakan fitur ini, Anda dapat mengklik menu "TESTING" ataupun "TRAINING" pada navigation bar setelah Anda masuk terlebih dahulu. </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Footer Section -->
    <section id="footer">
        <img src="Asset/img/images/wave2.png" class="footer-img">
        <div class="container">
            <div class="row">
                <div class="col-md-6 footer-box">
                    <img src="Asset/img/logo.png">
                    <p>Kami berharap informasi yang kami sajikan dapat membantu Anda dalam memprediksi probabilitas penjualan di masa depan. Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau saran.</p>
                </div>
                <div class="col-md-6 footer-box">
                    <p><b>CONTACT ME</b></p>
                    <p><i class="fa-solid fa-map-location-dot"></i>Malang, Indonesia</p>
                    <p><i class="fa-solid fa-phone"></i> +64 234567891011</p>
                    <p><i class="fa-solid fa-envelope"></i> kelompok_12@gmail.com</p>
                </div>
                <div>
                    <hr>
                    <p class="copyright">Website Created by Group 12</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Smooth Scroll -->
    <script src="Asset/js2/smooth-scroll.js"></script>
    <script>
        var scroll = new SmoothScroll('a[href*="#"]');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var typed = new Typed(".input", {
            strings:["Walmart.","Biggest Retail.","Be In Demand."],
            typeSpeed: 70,
            backSpeed: 60,
            loop:true
        });
    </script>

    <script src="Asset/js/bootstrap.bundle.min.js"></script>

</body>
</html>