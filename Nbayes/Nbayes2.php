<?php 
$connect = mysqli_connect("localhost", "root", "", "statistika");
if (!$connect) {
    echo "Koneksi Gagal";
    die;
}

for ($j = 1; $j <= 6435; $j++) {
    $result = mysqli_query($connect, "SELECT temperature, holiday_flag, fuel_price, weekly_sales FROM dataset WHERE id = $j");
    ini_set('max_execution_time', 600);
    $row = mysqli_fetch_assoc($result);
    $kolom1 = $row['weekly_sales'];
    $kolom2 = $row['temperature'];
    $kolom3 = $row['holiday_flag'];
    $kolom4 = $row['fuel_price'];

    if ($kolom1 <= 1201986.2) {
        $out1 = 0;
    } else {
        $out1 = 1;
    }

    if ($kolom2 <= 60.66378244) {
        $out2 = 0;
    } else {
        $out2 = 1;
    }

    if ($kolom4 <= 3) {
        $out4 = 0;
    } else {
        $out4 = 1;
    }

    $kombinasi1 = $out2 . $kolom3 . $out4;
    $kombinasi2 = $out1 . $out2 . $kolom3 . $out4;

    mysqli_query($connect, "UPDATE data4 SET weekly_sales = $out1, temperature = $out2, holiday_flag = $kolom3, fuel_price = $out4, kombinasi_input = '$kombinasi1', kombinasi_inout = '$kombinasi2' WHERE id = $j");
}
?>