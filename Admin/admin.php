<?php
$connect = mysqli_connect("localhost", "root", "", "statistika");

if (!$connect) {
    echo "Koneksi Gagal";
    die;
}
if(isset($_POST['hapus'])){
    $id = $_POST['id'];
    $hapus = mysqli_query($connect, "DELETE FROM admin WHERE id=$id");
    if($hapus){
        echo "<script>
                alert('Data Berhasil Dihapus');
                document.location='admin.php';
              </script>";
    }else{
        echo "<script>
                alert('Data Gagal Dihapus');
                document.location='admin.php';
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
	<title>Tabel Admins</title>
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
			<p>Admins</p>
			<br/>
			<table id="example">
                <thead >
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($connect, "SELECT * FROM admin");
                    while($row = mysqli_fetch_assoc($data)):
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['password'] ?></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="submit" value="Hapus" name="hapus" class="submit">
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
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
