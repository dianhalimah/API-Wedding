<?php
include_once('connection.php');

$id = addslashes(htmlentities($_POST['id']));
$getdata = mysqli_query($koneksi, "SELECT * FROM undangan WHERE id = '$id'");
$rows = mysqli_num_rows($getdata);

$delete = "DELETE FROM undangan WHERE id = '$id'";
$exedelete = mysqli_query($koneksi, $delete);

$respose = array();
if ($rows > 0) {
    if ($exedelete) {
        $respose['code'] = 1;
        $respose['message'] = "Deleted Success";
    } else {
        $respose['code'] = 0;
        $respose['message'] = "Failed to Delete";
    }
} else {
    $respose['code'] = 0;
    $respose['message'] = "Failed to Delete, data Not Found";
}


echo json_encode($respose);
