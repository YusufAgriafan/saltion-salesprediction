<?php 
$connect=mysqli_connect("localhost","root","","statistika");
if(!$connect){
    echo"Koneksi Gagal";
    die;
}

if(isset($_POST["daftar"])){
    $password = $_POST["password"];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $daftar = mysqli_query($connect, "INSERT INTO user (username,email,password) 
                                    VALUES ('$_POST[username]',
                                            '$_POST[email]',
                                            '$password_hash')
                                            ");

    if($daftar){
        echo"<script>
                alert('Simpan Sukses');
                document.location='daftar_admin.php';
            </script>";
    }else{
        echo"<script>
                alert('Simpan Gagal');
                document.location='daftar_admin.php';
            </script>";
    }
    
}
?>

<!Doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah User</title>
	<link rel="stylesheet" href="../Asset/css2/admin.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Asset/css2/daftarAdmin.css">
</head>
<body>

<?php
	session_start();
    if (!isset($_SESSION['username']) && !isset($_SESSION['email']) && !isset($_SESSION['password'])) {
		header("Location: ../Main/masuk.php");
	}
    
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
?>
	
<div id="mySidenav" class="sidenav">
	<p class="logo"><span>K</span>-Twelve</p>
    <a href="user.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Users</a>
    <a href="admin.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Admins</a>
    <a href="daftar_admin.php"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Tambah Admin</a>
    <a href="daftar_user.php"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Tambah User</a>
    <a href="cluster.php"class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;Cluster</a>
    <a href="keluar.php"class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;Keluar</a>
</div>

<div id="main">
	<div class="head">
        <div class="col-div-6">
            <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Dashboard</span>
            <span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >&#9776; Dashboard</span>
        </div>
	    <div class="clearfix"></div>
    </div>

    <div class="col-div-12">
		<div>
		    <div class="box">
                <form class="myForm text-center" action="" method="post" id="form">
                    <header>Tambah User</header>
                    <div class="form-group">
                        <input class="myInput" type="text" placeholder="Username" id="username" required name="username"> 
                    </div>

                    <div class="form-group">
                        <input class="myInput" placeholder="Email" type="text" id="email" required name="email"> 
                    </div>

                    <div class="form-group">
                        <input class="myInput" type="password" id="password" placeholder="Password" required name="password"> 
                    </div>
                    <input type="submit" class="submit" value="DAFTAR" name="daftar">
                </form>
		    </div>
	    </div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  $(".nav").click(function(){
    $("#mySidenav").css('width','70px');
    $("#main").css('margin-left','70px');
    $(".logo").css('visibility', 'hidden');
    $(".logo span").css('visibility', 'visible');
     $(".logo span").css('margin-left', '-10px');
     $(".icon-a").css('visibility', 'hidden');
     $(".icons").css('visibility', 'visible');
     $(".icons").css('margin-left', '-8px');
      $(".nav").css('display','none');
      $(".nav2").css('display','block');
  });

$(".nav2").click(function(){
    $("#mySidenav").css('width','300px');
    $("#main").css('margin-left','300px');
    $(".logo").css('visibility', 'visible');
     $(".icon-a").css('visibility', 'visible');
     $(".icons").css('visibility', 'visible');
     $(".nav").css('display','block');
      $(".nav2").css('display','none');
 });

</script>

</body>
</html>
