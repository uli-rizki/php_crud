<?php 
session_start();
if (! isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>
<html>
    <head>
        <title>Jurnal UNUHA</title>
    </head>
    <body>
        <h1>Menu Utama</h1>
        <div>
            <ul>
                <li>
                    <a href="matakuliah_tampil.php">Data Matakuliah</a>
                </li>
                <li>
                    <a href="dosen_tampil.php">Data Dosen</a>
                </li>
                <li>
                    <a href="jurnal_tampil.php">Data Jurnal</a>
                </li>
                <li>
                    <a href="logout.php">Keluar</a>
                </li>
            </ul>
        </div>
    </body>
</html>