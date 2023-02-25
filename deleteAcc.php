<?php
    session_start();
    $idClient= $_SESSION['id_client'];

    require('dabase.php');

        // Delete rows from the announcement and image tables first
        $sql = "DELETE a, i
                FROM annonce a
                INNER JOIN images i ON a.id_annonce= i.id_annonce
                WHERE a.id_client = $idClient";

        $result = mysqli_query($conn, $sql);

        // Delete the row from the member table
        $sql2 = "DELETE FROM client WHERE id_client= $idClient";

        $result = mysqli_query($conn, $sql2);

        echo "Row deleted successfully.";
  
    header("Location:SignOut.php");
?>