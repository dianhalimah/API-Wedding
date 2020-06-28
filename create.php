<?php 
include_once('connection.php');

// $gambar_utama = addslashes(htmlentities($_POST['gambar_utama']));
// $gambar_pengantin_wanita = addslashes(htmlentities($_POST['gambar_pengantin_wanita']));
// $gambar_pengantin_pria = addslashes(htmlentities($_POST['gambar_pengantin_pria']));
$nama_pengantin_wanita = addslashes(htmlentities($_POST['nama_pengantin_wanita']));
$nama_pengantin_pria = addslashes(htmlentities($_POST['nama_pengantin_pria']));
$tanggal_pernikahan = addslashes(htmlentities($_POST['tanggal_pernikahan']));
$alamat_resepsi = addslashes(htmlentities($_POST['alamat_resepsi']));

//Move the file to the uploads folder
move_uploaded_file($_FILES["gambar_utama"]["tmp_name"], "gambar/" .$_FILES["gambar_utama"]["name"]);
move_uploaded_file($_FILES["gambar_pengantin_wanita"]["tmp_name"], "gambar/" .$_FILES["gambar_pengantin_wanita"]["name"]);
move_uploaded_file($_FILES["gambar_pengantin_pria"]["tmp_name"], "gambar/" .$_FILES["gambar_pengantin_pria"]["name"]);
$gambar_utama = $_FILES["gambar_utama"]["name"];
$gambar_pengantin_wanita = $_FILES["gambar_pengantin_wanita"]["name"];
$gambar_pengantin_pria = $_FILES["gambar_pengantin_pria"]["name"];

$insert = "INSERT INTO undangan(id,gambar_utama,gambar_pengantin_pria,gambar_pengantin_wanita,nama_pengantin_wanita,nama_pengantin_pria,tanggal_pernikahan,alamat_resepsi) 
VALUES (NULL,'$gambar_utama','$gambar_pengantin_pria','$gambar_pengantin_wanita','$nama_pengantin_wanita','$nama_pengantin_pria','$tanggal_pernikahan','$alamat_resepsi')";


$exeinsert = mysqli_query($koneksi, $insert);


$response = array();


if ($exeinsert) {
    $last_id = $koneksi->insert_id;
    $response['code'] = 1;
    $response['message'] = "Success! Data Inserted";
    $response['link'] = "http://localhost:8080/honey/index.html?id=".$last_id;

} else {
    $response['code'] = 0;
    $response['message'] = "Failed! Data Not Inserted";
}

echo json_encode($response);

?>