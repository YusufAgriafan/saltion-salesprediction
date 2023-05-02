<?php 
$koneksi = mysqli_connect("localhost", "root", "", "statistika");

$sum000 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '000'"))[0];
$sum001 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '001'"))[0];
$sum010 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '010'"))[0];
$sum011 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '011'"))[0];
$sum100 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '100'"))[0];
$sum101 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '101'"))[0];
$sum110 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '110'"))[0];
$sum111 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(kombinasi_input) FROM data4 WHERE kombinasi_input = '111'"))[0];

$sum_total_data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(weekly_sales) FROM data4"))[0];

$sum_output_1 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(weekly_sales) FROM data4 WHERE weekly_sales = 1"))[0];
$sum_output_0 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(weekly_sales) FROM data4 WHERE weekly_sales = 0"))[0];

mysqli_query($koneksi, "INSERT INTO jumlah (jumlah000, jumlah001, jumlah010, jumlah011, jumlah100, jumlah101, jumlah110, jumlah111, jumlah_total_data, jumlah_output_1, jumlah_output_0) VALUES ('$sum000', '$sum001', '$sum010', '$sum011', '$sum100', '$sum101', '$sum110', '$sum111', '$sum_total_data', '$sum_output_1', '$sum_output_0')");
?>
