<script href="../Asset/js/bootstrap.js"></script>

<?php 

$connect = mysqli_connect("localhost", "root", "", "statistika");

if (!$connect) {
    echo "Koneksi Gagal";
    die;
}

$KTP = 0;
$KTN = 0;
$KFP = 0;
$KFN = 0;
$NTP = 0;
$NTN = 0;
$NFP = 0;
$NFN = 0;

for ($j = 1; $j <= 4500; $j++) {
    ini_set('max_execution_time', 600);

    $result = mysqli_query($connect, "SELECT weekly_sales, kmean, nbayes FROM training_data WHERE id = $j");
    $row = mysqli_fetch_assoc($result);
    $weekly_sales = $row['weekly_sales'];
    $kmean = $row['kmean'];
    $nbayes = $row['nbayes'];
    
    if ($weekly_sales == 1 && $kmean == 1) {
        $KTP++;
    } else if ($weekly_sales == 0 && $kmean == 0) {
        $KTN++;
    } else if ($weekly_sales == 1 && $kmean == 0) {
        $KFN++;
    } else if ($weekly_sales == 0 && $kmean == 1) {
        $KFP++;
    }
    
    if ($weekly_sales == 1 && $nbayes == 1) {
        $NTP++;
    } else if ($weekly_sales == 0 && $nbayes == 0) {
        $NTN++;
    } else if ($weekly_sales == 1 && $nbayes == 0) {
        $NFN++;
    } else if ($weekly_sales == 0 && $nbayes == 1) {
        $NFP++;
    }
}

echo "<script>";
$total_kmean = $KTP + $KTN + $KFP + $KFN;
if ($total_kmean > 0) {
    $average_kmean = (($KTP + $KTN) / $total_kmean) * 100;
    $presisi_kmean = $KTP / ($KTP + $KFP);
    $recall_kmean = $KTP / ($KTP + $KFN);
    echo "alert('Akurasi dari program kmean adalah " . $average_kmean . "%, presisi kmean adalah " . $presisi_kmean . ", dan recall kmean adalah " . $recall_kmean . "');";
    $Pkmean = ($KTP + $KTN) / ($KTP + $KTN + $KFP + $KFN);
    mysqli_query($connect, "UPDATE training SET K_TP = $KTP, K_TN = $KTN, K_FP = $KFP, K_FN = $KFN, akurasi_kmean = $Pkmean, presisi_kmean = $presisi_kmean, recall_kmean = $recall_kmean WHERE id = 1");
} else {
    echo "alert('Tidak ada akurasi kmean');";
}

$total_nbayes = $NTP + $NTN + $NFP + $NFN;
if ($total_nbayes > 0) {
    $average_nbayes = (($NTP + $NTN) / $total_nbayes) * 100;
    $presisi_nbayes = $NTP / ($NTP + $NFP);
    $recall_nbayes = $NTP / ($NTP + $NFN);
    echo "alert('Akurasi dari program nbayes adalah " . $average_nbayes . "%, presisi nbayes adalah " . $presisi_nbayes . ", dan recall nbayes adalah " . $recall_nbayes . "');";
    $Pnbayes = ($NTP + $NTN) / ($NTP + $NTN + $NFP + $NFN);
    mysqli_query($connect, "UPDATE training SET N_TP = $NTP, N_TN = $NTN, N_FP = $NFP, N_FN = $NFN, akurasi_nbayes = $Pnbayes, presisi_nbayes = $presisi_nbayes, recall_nbayes = $recall_nbayes WHERE id = 1");
} else {
    echo "alert('Tidak ada akurasi nbayes');";
}
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
    <title>DATA TRAINING</title>
</head>
<body>
<div class="container pt-4">
    <div class="card">
        <div class="card-header text-bg-primary text-white">DATA TRAINING</div>
        <div class="m-3">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kmean True Positive</th>
                        <th>Kmean True Negative</th>
                        <th>Kmean False Positive</th>
                        <th>Kmean False Negative</th>
                        <th>Nbayes True Positive</th>
                        <th>Nbayes True Negative</th>
                        <th>Nbayes False Positive</th>
                        <th>Nbayes False Negative</th>
                        <th>Akurasi Kmean</th>
                        <th>Presisi Kmean</th>
                        <th>Recall Kmean</th>
                        <th>Akurasi Nbayes</th>
                        <th>Presisi Nbayes</th>
                        <th>Recall Nbayes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($connect, "SELECT * FROM training");
                    while($row = mysqli_fetch_assoc($data)):
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['K_TP'] ?></td>
                        <td><?= $row['K_TN'] ?></td>
                        <td><?= $row['K_FP'] ?></td>
                        <td><?= $row['K_FN'] ?></td>
                        <td><?= $row['N_TP'] ?></td>
                        <td><?= $row['N_TN'] ?></td>
                        <td><?= $row['N_FP'] ?></td>
                        <td><?= $row['N_FN'] ?></td>
                        <td><?= $row['akurasi_kmean'] ?></td>
                        <td><?= $row['presisi_kmean'] ?></td>
                        <td><?= $row['recall_kmean'] ?></td>
                        <td><?= $row['akurasi_nbayes'] ?></td>
                        <td><?= $row['presisi_nbayes'] ?></td>
                        <td><?= $row['recall_nbayes'] ?></td>
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