<?php
session_start();
$connect=mysqli_connect("localhost","root","","statistika");
if(!$connect){
    echo"Koneksi Gagal";
    die;
}

if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user_query = "SELECT * FROM user WHERE username='$username' AND email='$email'";
    $user_result = mysqli_query($connect, $user_query);
    $user = mysqli_fetch_assoc($user_result);
    
    $admin_query = "SELECT * FROM admin WHERE username='$username' AND email='$email'";
    $admin_result = mysqli_query($connect, $admin_query);
    $admin = mysqli_fetch_assoc($admin_result);

    if($user) { 
        if(password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            header('Location: ../index.php');
            exit();
        } else {
            echo "<script>alert('Kata sandi salah');</script>";
        }
    } elseif($admin) {
        if(password_verify($password, $admin['password'])) {
            $_SESSION['username'] = $admin['username'];
            $_SESSION['email'] = $admin['email'];
            $_SESSION['password'] = $admin['password'];
            header('Location: ../Admin/user.php');
            exit();
        } else {
            echo "<script>alert('Kata sandi salah');</script>";
        }
    } else {
        echo "<script>alert('Username atau email tidak terdaftar');</script>";
    }
}
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Masuk</title>
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
                <div class="col-md-6">
                    <div class="myLeftCtn"> 
                        <form class="myForm text-center" action="" method="post">
                            <header>Masuk</header>
                            <div class="form-group">
                                <i class="fas fa-user" style="color: #00E1FF;"></i>
                                <input class="myInput" type="text" placeholder="Username" id="username" required name="username"> 
                            </div>

                            <div class="form-group">
                                <i class="fas fa-envelope" style="color: #00E1FF;"></i>
                                <input class="myInput" placeholder="Email" type="text" id="email" required name="email"> 
                            </div>

                            <div class="form-group">
                                <i class="fas fa-lock" style="color: #00E1FF;"></i>
                                <input class="myInput" type="password" id="password" placeholder="Password" required name="password"> 
                            </div>

                            <input type="submit" class="butt" value="MASUK" name="masuk">
                            
                        </form>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="myRightCtn">
                            <div class="box"><header style="font-size:30px;">Hallo Yang Disana!</header>
                            
                            <p style="color:white;">Apakah Anda sudah memiliki akun? Jika belum, silakan klik tombol berikut.</p>
                                <a href="daftar.php"><input type="button" class="butt_out" value="Daftar"/></a>
                            <br> <br>
                            <p style="color:white;">Silakan klik tombol berikut jika Anda lupa password.</p>
                                <a href="lupa_password.php"><input type="button" class="butt_out" value="Lupa Password"/></a>
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

