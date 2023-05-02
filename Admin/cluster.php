<?php
$connect = mysqli_connect("localhost", "root", "", "statistika");
if (!$connect) {
    echo "Koneksi Gagal";
    die;
}
if(isset($_POST['save'])){
    $update = mysqli_query($connect, "UPDATE cluster SET 
                                        center1 = '$_POST[center1]',
                                        center2 = '$_POST[center2]',
                                        center3 = '$_POST[center3]'
                                      WHERE class = '$_POST[class]'
                                    ");
    if($update){
        echo "<script>
                alert('Update Sukses!');
                document.location='cluster.php';
            </script>";
    } else{
        echo "<script>
                alert('Update Gagal!');
                document.location='cluster.php';
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
	<title>Ubah Cluster Kmean</title>
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
                    <header>Ubah Cluster Kmean</header>
                    <div class="card-body">
                        <div class="mb-3 form-group">
                            <label for="class" class="form-label">Class</label>
                            <input type="text" class="form-control" id="class" name="class" placeholder="Masukkan class Anda">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="center1" class="form-label">center1</label>
                            <input type="text" class="form-control" id="center1" name="center1" placeholder="Masukkan center1 untuk temperature">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="center2" class="form-label">center2</label>
                            <input type="text" class="form-control" id="center2" name="center2" placeholder="Masukkan center2 untuk holiday flag">
                        </div>
                        <div class="mb-3 form-group" >
                            <label for="center3" class="form-label">center3</label>
                            <input type="text" class="form-control" id="center3" name="center3" placeholder="Masukkan center3 untuk fuel price">
                        </div>
                        <button name="save" class="btn btn-success submit" type="submit">Kirim</button>
                        <button class="btn btn-danger submit" type="reset">Hapus</button>
                    </div>
                </form>
		    </div>
	    </div>
	</div>

    <br>

    <div class="col-div-12">
		<div>
		    <div class="box">
            <p>Tabel Cluster</p>
			<br/>
			<table id="example">
                <thead >
                    <tr>
                        <th>Class</th>
                        <th>Center 1</th>
                        <th>Center 2</th>
                        <th>Center 3</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($connect, "SELECT * FROM cluster");
                    while($row = mysqli_fetch_assoc($data)):
                    ?>
                    <tr>
                        <td><?= $row['class'] ?></td>
                        <td><?= $row['center1'] ?></td>
                        <td><?= $row['center2'] ?></td>
                        <td><?= $row['center3'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
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
