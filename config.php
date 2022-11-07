<?php 
$server = 'localhost';
$user_db = 'uli';   // root
$password_db = 'homedata123'; // ''
$db_name = 'jurnal_unuha';

$koneksi = new mysqli($server, $user_db, $password_db, $db_name);

if ($koneksi->connect_error) {
    die("<script>alert('Tidak tersambung dengan database')</script>");
}

?>