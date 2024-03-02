<?php
    $server = 'localhost';
    $user = 'root';
    $pass ='';
    $db = 'db_catalogue_film';

    $koneksi = mysqli_connect($server, $user, $pass, $db);

    if ($koneksi->connect_error){
        die("koneksi error: ".conn->connect_error);
    } else echo 'koneksi suskses';
?>