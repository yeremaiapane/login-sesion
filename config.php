<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "pertemuan 12";
 
$conn = mysqli_connect($server, $user, $pass, $database);
 
if (!$conn) {
    die("alert('Gagal tersambung dengan database.')");
}
?>