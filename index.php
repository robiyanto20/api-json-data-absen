<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Absensi Pemrogramman Mobile 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
// Ambil data API
$data = file_get_contents('https://api.steinhq.com/v1/storages/642a1ee5eced9b09e9c762e8/21a1');
// Ubah data JSON menjadi array PHP
$data = json_decode($data, true);
$total_data = count($data);
$jumlah_per_halaman = 10;
$total_halaman = ceil($total_data / $jumlah_per_halaman);
$halaman_aktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awal_data = ($jumlah_per_halaman * $halaman_aktif) - $jumlah_per_halaman;

echo "<table border=''>";
echo "<tr><th>No</th><th>NIM</th><th>NAMA</th><th>1</th><th>2</th><th>3</th><th>4</th></tr>";
// Looping untuk menampilkan data dalam tabel
$no = $awal_data + 1;
for ($i=$awal_data; $i<$awal_data+$jumlah_per_halaman; $i++) {
    if (isset($data[$i])) {
        $item = $data[$i];

        echo "<tr>";
        echo "<td>" . $no."</td>";
        echo "<td>" . $item['NIM'] . "</td>";
        echo "<td>" . $item['Nama'] . "</td>";
        echo "<td>" . $item['1'] . "</td>";
        echo "<td>" . $item['2'] . "</td>";
        echo "<td>" . $item['3'] . "</td>";
        echo "<td>" . $item['4'] . "</td>";

        echo "<tr>";
        $no++;
    }
}
echo "</table>";

echo "<br>";

// Tampilkan pagination
echo "<ul>";
for ($i=1; $i<=$total_halaman; $i++) {
    if ($i == $halaman_aktif) {
        echo "<li><a href='?halaman=$i' style='font-weight:bold;'>$i</a></li>";
    } else {
        echo "<li><a href='?halaman=$i'>$i</a></li>";
    }
}
echo "</ul>";
?>

</body>
</html>

