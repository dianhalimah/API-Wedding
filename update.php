<?php
require_once('connection.php');

$id = addslashes(htmlentities($_POST['id']));
$gambar_utama = addslashes(htmlentities($_POST['gambar_utama']));
$gambar_pengantin_wanita = addslashes(htmlentities($_POST['gambar_pengantin_wanita']));
$gambar_pengantin_pria = addslashes(htmlentities($_POST['gambar_pengantin_pria']));
$nama_pengantin_wanita = addslashes(htmlentities($_POST['nama_pengantin_wanita']));
$nama_pengantin_pria = addslashes(htmlentities($_POST['nama_pengantin_pria']));
$tanggal_pernikahan = addslashes(htmlentities($_POST['tanggal_pernikahan']));
$alamat_resepsi = addslashes(htmlentities($_POST['alamat_resepsi']));

$getdata = mysqli_query($koneksi, "SELECT * FROM undangan WHERE id='$id'");
$rows = mysqli_num_rows($getdata);

$update = "UPDATE undangan SET gambar_utama='$gambar_utama',gambar_pengantin_wanita='$gambar_pengantin_wanita',
gambar_pengantin_pria='$gambar_pengantin_pria',nama_pengantin_wanita='$gambar_pengantin_wanita',nama_pengantin_pria='$nama_pengantin_pria',
tanggal_pernikahan='$tanggal_pernikahan',alamat_resepsi='$alamat_resepsi' WHERE id='$id'";
$exequery = mysqli_query($koneksi, $update);

$respose = array();

if ($rows > 0) {
    if ($exequery) {
        $respose['code'] = 1;
        $respose['message'] = "Updated Success";
    } else {
        $respose['code'] = 0;
        $respose['message'] = "Updated Failed";
    }
} else {
    $respose['code'] = 0;
    $respose['message'] = "Updated Failed, Not data selected";
}
echo json_encode($respose);

?>