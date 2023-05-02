<?php 
$connect=mysqli_connect("localhost","root","","statistika");
if(!$connect){
    echo"Koneksi Gagal";
    die;
}

if(isset($_POST["simpan"])){
    $new_password = $_POST["password"];
    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    $username = $_POST["username"];
    $email = $_POST["email"];

    $check_email = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND email = '$email'");
    $count = mysqli_num_rows($check_email);
    if($count > 0) {
        $update_password = mysqli_query($connect, "UPDATE user SET password = '$new_password_hash' WHERE username = '$username' AND email = '$email'");
        if($update_password){
            echo"<script>
                alert('Password berhasil diubah');
                window.location='masuk.php';
            </script>";
        }else{
            echo"<script>
                alert('Password gagal diubah');
                window.location='lupa_password.php';
            </script>";
        }
    } else {
        echo"<script>
            alert('Username atau Email yang diberikan tidak sesuai dengan akun yang terdaftar.');
            window.location='lupa_password.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Asset/css2/lupa_password.css">
    <link rel="stylesheet" href="../Asset/css2/menu.css">
</head>
<body> 

    <div class="container">
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn"> 
                        <form class="myForm text-center" action="" method="post" id="form">
                            <header>Lupa Password</header>
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
                                <input class="myInput" type="password" id="password" placeholder="Password Baru" required name="password"> 
                            </div>

                            <input type="submit" class="butt" value="SIMPAN" name="simpan">
                            
                        </form>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="myRightCtn">
                            <div class="box"><header>Hallo Yang Disana!</header>
                            
                            <p style="color:white;">Kembali ke menu Masuk</p>
                                <a href="masuk.php"><input type="button" class="butt_out" value="Masuk"/></a>
                            </div>
                                
                    </div>
                </div>
            </div>
        </div>
</div>
      
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#form').submit(function(e){
        var password = $('#password').val();
        
        if(!/[A-Z]/.test(password) || !/[0-9]/.test(password)){
            alert("Password harus terdiri dari minimal 1 huruf besar dan 1 angka.");
            e.preventDefault();
        }
    });
});
</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</body>
</html>