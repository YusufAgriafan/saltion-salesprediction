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
    <title>DATASET NAIVE BAYES 2</title>
</head>
<body>
<div class="container pt-4">
    <div class="card">
        <div class="card-header text-bg-primary text-white">DATASET NAIVE BAYES 2</div>
        <div class="m-3">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah 000</th>
                        <th>Jumlah 001</th>
                        <th>Jumlah 010</th>
                        <th>Jumlah 011</th>
                        <th>Jumlah 100</th>
                        <th>Jumlah 101</th>
                        <th>Jumlah 110</th>
                        <th>Jumlah 111</th>
                        <th>Jumlah Total Data</th>
                        <th>Jumlah Output 1</th>
                        <th>Jumlah Output 0</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($connect, "SELECT * FROM jumlah");
                    while($row = mysqli_fetch_assoc($data)):
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['jumlah000'] ?></td>
                        <td><?= $row['jumlah001'] ?></td>
                        <td><?= $row['jumlah010'] ?></td>
                        <td><?= $row['jumlah011'] ?></td>
                        <td><?= $row['jumlah100'] ?></td>
                        <td><?= $row['jumlah101'] ?></td>
                        <td><?= $row['jumlah110'] ?></td>
                        <td><?= $row['jumlah111'] ?></td>
                        <td><?= $row['jumlah_total_data'] ?></td>
                        <td><?= $row['jumlah_output_1'] ?></td>
                        <td><?= $row['jumlah_output_0'] ?></td>
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
