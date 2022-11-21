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
        <h2>Selamat Datang <?php echo $_SESSION['username']; ?></h2>
        <h3>Akses anda adalah : <?php echo $_SESSION['akses']; ?></h3>
        <div>
            <ul>
                <?php if($_SESSION['akses'] == 'superadmin'){ ?>
                <li>
                    <a href="matakuliah_tampil.php">Data Matakuliah</a>
                </li>
                <li>
                    <a href="dosen_tampil.php">Data Dosen</a>
                </li>
                <li>
                    <a href="jurnal_tampil.php">Data Jurnal</a>
                </li>
                <?php } else { ?>
                <li>
                    <a href="jurnal_tampil.php">Data Jurnal</a>
                </li>
                <?php } ?>
                <li>
                    <a href="logout.php">Keluar</a>
                </li>
            </ul>
        </div>
    </body>
</html>