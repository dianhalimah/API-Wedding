<?php
include_once('connection.php');
$id = htmlspecialchars($_GET["id"]);
$query = "SELECT * FROM undangan where id = " .$id;
$result = mysqli_query($koneksi, $query);
$array_data = array();
while ($baris = mysqli_fetch_assoc($result)) {
    $array_data[] = $baris;
}

echo json_encode($array_data);

?>