<?php
$connect = mysqli_connect("localhost", "root", "", "statistika");
if (!$connect) {
    echo "Koneksi Gagal";
    die;
}
if(isset($_POST['save'])){
    $save = mysqli_query($connect, "INSERT INTO cluster (class,center1, center2, center3)
                                    VALUES ('$_POST[class]',
                                            '$_POST[center1]',
                                            '$_POST[center2]',
                                            '$_POST[center3]')
                                            ");
    if($save){
        echo "<script>
                alert('Simpan Sukses!');
                document.location='cluster.php';
            </script>";
    } else{
        echo "<script>
                alert('Simpan Gagal!');
                document.location-'cluster.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Asset/css1/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"></script>
    <title>FORM CLUSTER</title>
</head>
<body>
<form action="" method="POST">
    <div class="container pt-5">
        <div class="card">
            <div class="card-header text-bg-primary">
                FORM DATA CLUSTER
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="class" class="form-label">Class</label>
                    <input type="text" class="form-control" id="class" name="class" placeholder="Masukkan class Anda">
                </div>
                <div class="mb-3">
                    <label for="center1" class="form-label">center1</label>
                    <input type="text" class="form-control" id="center1" name="center1" placeholder="Masukkan center1 untuk temperature">
                </div>
                <div class="mb-3">
                    <label for="center2" class="form-label">center2</label>
                    <input type="text" class="form-control" id="center2" name="center2" placeholder="Masukkan center2 untuk holiday flag">
                </div>
                <div class="mb-3">
                    <label for="center3" class="form-label">center3</label>
                    <input type="text" class="form-control" id="center3" name="center3" placeholder="Masukkan center3 untuk fuel price">
                </div>
                <button name="save" class="btn btn-success" type="submit">Kirim</button>
                <button class="btn btn-danger" type="reset">Hapus</button>
                <a class="btn btn-info" href="Kmean.php" role="button">Kmean</a>
            </div>
        </div>
    </div>
</form>
</body>
</html>