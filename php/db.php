<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $db     = 'app';
    $dbpass = '';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die(db_conn_error());
?>