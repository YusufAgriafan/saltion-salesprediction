<?php

// Establish database connection
$connect = mysqli_connect("localhost", "root", "", "statistika");
if (!$connect) {
    echo "Koneksi Gagal";
    die;
}

// Loop through each row in the data table

for ($j = 1; $j <= 4500; $j++) {
    ini_set('max_execution_time', 600);

    $result = mysqli_query($connect, "SELECT temperature, holiday_flag, fuel_price FROM data_training WHERE no = $j");
    $row = mysqli_fetch_assoc($result);
    $temperature = $row['temperature'];
    $holiday_flag = $row['holiday_flag'];
    $fuel_price = $row['fuel_price'];

    // Update cluster centers for each class
    $result = mysqli_query($connect, "SELECT 
    (SELECT AVG(temperature) FROM data_training WHERE class = 0) as avgC1,
    (SELECT AVG(holiday_flag) FROM data_training WHERE class = 0) as avgC2,
    (SELECT AVG(fuel_price) FROM data_training WHERE class = 0) as avgC3,
    (SELECT AVG(temperature) FROM data_training WHERE class = 1) as avgC4,
    (SELECT AVG(holiday_flag) FROM data_training WHERE class = 1) as avgC5,
    (SELECT AVG(fuel_price) FROM data_training WHERE class = 1) as avgC6");

    $row = mysqli_fetch_assoc($result);
    $avgC1 = $row['avgC1'];
    $avgC2 = $row['avgC2'];
    $avgC3 = $row['avgC3'];
    $avgC4 = $row['avgC4'];
    $avgC5 = $row['avgC5'];
    $avgC6 = $row['avgC6'];

    mysqli_query($connect, "UPDATE cluster SET 
    center1 = $avgC1, center2 = $avgC2, center3 = $avgC3 WHERE class = 0");
    mysqli_query($connect, "UPDATE cluster SET 
    center1 = $avgC4, center2 = $avgC5, center3 = $avgC6 WHERE class = 1");

    $jarak0 = sqrt(($temperature - $avgC1) ** 2 + ($holiday_flag - $avgC2) ** 2 + ($fuel_price - $avgC3) ** 2);

    $jarak1 = sqrt(($temperature - $avgC4) ** 2 + ($holiday_flag - $avgC5) ** 2 + ($fuel_price - $avgC6) ** 2);

    $minimum = min($jarak0, $jarak1);
    if ($minimum == $jarak0) {
        $out = 0;
    } else {
        $out = 1;
    }

    mysqli_query($connect, "UPDATE training_data SET kmean = $out WHERE id = $j");
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
    <title>DATA TRAINING KMEAN</title>
</head>
<body>
<div class="container pt-4">
    <div class="card">
        <div class="card-header text-bg-primary text-white">DATA TRAINING KMEAN</div>
        <div class="m-3">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Weekly Sales</th>
                        <th>Temperature</th>
                        <th>Holiday Flag</th>
                        <th>Fuel Price</th>
                        <th>Kmean</th>
                        <th>Naive Bayes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($connect, "SELECT * FROM training_data");
                    while($row = mysqli_fetch_assoc($data)):
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['weekly_sales'] ?></td>
                        <td><?= $row['temperature'] ?></td>
                        <td><?= $row['holiday_flag'] ?></td>
                        <td><?= $row['fuel_price'] ?></td>
                        <td><?= $row['kmean'] ?></td>
                        <td><?= $row['nbayes'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<br>
<div class="d-grid gap-2 col-6 mx-auto">
    <a href="../Main/TombolTraining.php" class="btn btn-primary" role="button">Kembali</a>
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