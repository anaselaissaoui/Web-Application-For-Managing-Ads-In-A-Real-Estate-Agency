<?php
require "dabase.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    // First, delete all images associated with the house
    $sql = "DELETE FROM images WHERE id_annonce = $id";
$result = mysqli_query($conn, $sql);

$sql = "DELETE FROM annonce WHERE id_annonce = $id";
$result = mysqli_query($conn, $sql);

// Then, delete the house record itself

    header ("location: MyAds.php");
}
 ?>