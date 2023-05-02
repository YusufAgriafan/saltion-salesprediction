<?php
$connect = mysqli_connect("localhost", "root", "", "statistika");

if (!$connect) {
    echo "Koneksi Gagal";
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../Asset/css1/bootstrap.css">
    <title>DATASET KMEAN</title>
</head>
<body>
<div class="container pt-4">
    <div class="card">
        <div class="card-header text-bg-primary text-white">DATASET KMEAN</div>
        <div class="m-3">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Temperature</th>
                        <th>Holiday Flag</th>
                        <th>Fuel Price</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>Class</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($connect, "SELECT * FROM data");
                    while($row = mysqli_fetch_assoc($data)):
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['temperature'] ?></td>
                        <td><?= $row['holiday_flag'] ?></td>
                        <td><?= $row['fuel_price'] ?></td>
                        <td><?= $row['c1'] ?></td>
                        <td><?= $row['c2'] ?></td>
                        <td><?= $row['class'] ?></td>
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

</body>
</html>

