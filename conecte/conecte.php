
<?php
    $connect = new mysqli('localhost','root','','gestimmo');
    if(!$connect) {
        printf("Connect is failed!");
    }
?>