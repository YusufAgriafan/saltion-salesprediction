<?php
$connect = mysqli_connect("localhost", "root", "", "statistika");
if (!$connect) {
    echo "Koneksi Gagal";
    die;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Walmart Naive Bayes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Asset/css2/login.css">
    <link rel="stylesheet" href="../Asset/css2/menu.css">
</head>
<body> 

    <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-5">
                    <div class="myLeftCtn"> 
                        <form class="myForm text-center" action="Nbayes.php" method="get">
                            <header style="color: #29008A;">Naive Bayes</header>
                            <div class="form-group">
                                <input class="myInput" type="text" placeholder="temperature" id="temperature" required name="temperature"> 
                            </div>

                            <div class="form-group">
                                <select class="myInput form-select" name="holiday_flag" id="holiday_flag" required>
                                    <option select hidden value="">select day</option>    
                                    <option value="0">Non Holiday</option>
                                    <option value="1">Holiday</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input class="myInput" type="fuel_price" id="fuel_price" placeholder="fuel price" required name="fuel_price"> 
                            </div>

                            <input type="submit" class="butt" value="COUNT" name="count">
                            
                        </form>
                    </div>
                </div> 
                <div class="col-md-7">
                    <div class="myRightCtn">
                            <div class="box"><header style="font-size:30px;">Halo yang disana!</header>
                            
                            <p style="color:white;">Jika ingin kembali ke menu utama klik tombol berikut</p>
                                <a href="../index.php"><input type="button" class="butt_out" value="menu"/></a>
                            <br> <br>
                            <p style="color:white;">Untuk dapat menggunakan fitur "Probabilitas Penjualan dengan Naive Bayes", pengguna harus memasukkan variabel-variabel penting dalam analisis penjualan toko, seperti temperature, holiday flag, dan fuel price. Variabel-variabel ini akan digunakan sebagai input pada algoritma Naive Bayes untuk memprediksi apakah penjualan toko akan naik atau turun.</p>
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>
</html>

