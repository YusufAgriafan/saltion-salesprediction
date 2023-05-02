<script href="../Asset/js/bootstrap.js"></script>

<?php
$connect = mysqli_connect("localhost", "root", "", "statistika");
if (!$connect) {
    echo "Koneksi Gagal";
    die;
}

$sum000 = mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '000'");
$sum000_row = mysqli_fetch_array($sum000)[0];
$sum001 = mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '001'");
$sum001_row = mysqli_fetch_array($sum001)[0];
$sum010 = mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '010'");
$sum010_row = mysqli_fetch_array($sum010)[0];
$sum011 = mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '011'");
$sum011_row = mysqli_fetch_array($sum011)[0];
$sum100 = mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '100'");
$sum100_row = mysqli_fetch_array($sum100)[0];
$sum101 = mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '101'");
$sum101_row = mysqli_fetch_array($sum101)[0];
$sum110 = mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '110'");
$sum110_row = mysqli_fetch_array($sum110)[0];
$sum111 = mysqli_query($connect, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '111'");
$sum111_row = mysqli_fetch_array($sum111)[0];
$sum_total_data = mysqli_query($connect, "SELECT COUNT(weekly_sales) FROM data4");
$sum_total_data_row = mysqli_fetch_array($sum_total_data)[0];
$sum_output_1 = mysqli_query($connect, "SELECT COUNT(weekly_sales) FROM data4 WHERE weekly_sales = 1");
$sum_output_1_row = mysqli_fetch_array($sum_output_1)[0];
$sum_output_0 = mysqli_query($connect, "SELECT COUNT(weekly_sales) FROM data4 WHERE weekly_sales = 0");
$sum_output_0_row = mysqli_fetch_array($sum_output_0)[0];

$temperature = $_GET['temperature'];
$holiday_flag = $_GET['holiday_flag'];
$fuel_price = $_GET['fuel_price'];

if ($temperature <= 60.66378244) {
$temperature_out = 0;
} else {
$temperature_out = 1;
}
if ($fuel_price <= 3) {
$fuel_price_out = 0;
} else {
$fuel_price_out = 1;
}
$kombinasi_input = $temperature_out . $holiday_flag . $fuel_price_out;

if ($kombinasi_input == "000") {
    $pA = $sum000_row / $sum_total_data_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '1000'");
    $pB1 = (int) mysqli_fetch_row($query_b1)[0] / $sum_output_1_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '0000'");
    $pB0 = (int) mysqli_fetch_row($query_b0)[0] / $sum_output_0_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "001") {
    $pA = $sum000_row / $sum_total_data_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '1001'");
    $pB1 = (int) mysqli_fetch_row($query_b1)[0] / $sum_output_1_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '0001'");
    $pB0 = (int) mysqli_fetch_row($query_b0)[0] / $sum_output_0_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "010") {
    $pA = $sum000_row / $sum_total_data_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '1010'");
    $pB1 = (int) mysqli_fetch_row($query_b1)[0] / $sum_output_1_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '0010'");
    $pB0 = (int) mysqli_fetch_row($query_b0)[0] / $sum_output_0_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "011") {
    $pA = $sum000_row / $sum_total_data_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '1011'");
    $pB1 = (int) mysqli_fetch_row($query_b1)[0] / $sum_output_1_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '0011'");
    $pB0 = (int) mysqli_fetch_row($query_b0)[0] / $sum_output_0_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "100") {
    $pA = $sum000_row / $sum_total_data_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '1100'");
    $pB1 = (int) mysqli_fetch_row($query_b1)[0] / $sum_output_1_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '0100'");
    $pB0 = (int) mysqli_fetch_row($query_b0)[0] / $sum_output_0_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "101") {
    $pA = $sum000_row / $sum_total_data_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '1101'");
    $pB1 = (int) mysqli_fetch_row($query_b1)[0] / $sum_output_1_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '0101'");
    $pB0 = (int) mysqli_fetch_row($query_b0)[0] / $sum_output_0_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "110") {
    $pA = $sum000_row / $sum_total_data_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '1110'");
    $pB1 = (int) mysqli_fetch_row($query_b1)[0] / $sum_output_1_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '0110'");
    $pB0 = (int) mysqli_fetch_row($query_b0)[0] / $sum_output_0_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}elseif ($kombinasi_input == "111") {
    $pA = $sum000_row / $sum_total_data_row;
    $query_b1 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '1111'");
    $pB1 = (int) mysqli_fetch_row($query_b1)[0] / $sum_output_1_row;
    $query_b0 = mysqli_query($connect, "SELECT COUNT(kombinasi_inout) FROM data4 WHERE kombinasi_inout = '0111'");
    $pB0 = (int) mysqli_fetch_row($query_b0)[0] / $sum_output_0_row;
    $pengali = $pA * $pB1;
    $pembagi = $pA * $pB0;
    $hasil = $pengali / ($pengali + $pembagi);
}

if ($hasil <= 0.5) {
    $hout = 0;
} else {
    $hout = 1;
}

mysqli_query($connect, "INSERT INTO data5 (temperature, holiday_flag, fuel_price, hasil) VALUES ($temperature, $holiday_flag, $fuel_price, $hout)");

echo "<script>";
echo "alert('Kemungkinan penjualan mingguan lebih dari rata-rata adalah sebesar " . $hasil . "%');";
echo "</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../Asset/css1/bootstrap.css">
    <title>DATA NAIVE BAYES</title>
</head>
<body>
<div class="container pt-4">
    <div class="card">
        <div class="card-header text-bg-primary text-white">DATA NAIVE BAYES</div>
        <div class="m-3">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Temperature</th>
                        <th>Holiday Flag</th>
                        <th>Fuel Price</th>
                        <th>Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($connect, "SELECT * FROM data5");
                    while($row = mysqli_fetch_assoc($data)):
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['temperature'] ?></td>
                        <td><?= $row['holiday_flag'] ?></td>
                        <td><?= $row['fuel_price'] ?></td>
                        <td><?= $row['hasil'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<br>
<div class="d-grid gap-2 col-6 mx-auto">
    <a href="Tampilan_Nbayes.php" class="btn btn-primary" role="button">Dataset Nbayes</a>
    <a href="Tampilan_Nbayes2.php" class="btn btn-primary" role="button">Dataset Nbayes 2</a>
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