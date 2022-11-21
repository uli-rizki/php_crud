<?php
session_start(); 
include 'config.php';

if (! isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $nidn = $_POST['nidn'];
    $nama_dosen = $_POST['nama_dosen'];
    $gelar_depan = $_POST['gelar_depan'] ? $_POST['gelar_depan'] : "";
    $gelar_belakang = $_POST['gelar_belakang'];

    $sql = "INSERT INTO dosen (nidn, nama_dosen, gelar_depan, gelar_belakang) 
        VALUES('".$nidn."', '".$nama_dosen."', '".$gelar_depan."', '".$gelar_belakang."')";

    $simpan = $koneksi->query($sql);

    if ($simpan) {
        echo "Data berhasil disimpan";
    } else {
        echo "Data Gagal Disimpan";
    }

    $koneksi->close();
}

?>
<html>
    <head>
        <title>Jurnal UNUHA</title>
    </head>
    <body>
        <h1>Tambah Dosen</h1>

        <form action="" method="POST">
            <label>NIDN</label>
            <input type="text" id="nidn" name="nidn" required>
            <br />
            <label>Nama Dosen</label>
            <input type="text" id="nama_dosen" name="nama_dosen" required>
            <br />
            <label>Gelar Depan</label>
            <input type="text" id="gelar_depan" name="gelar_depan">
            <br />
            <label>Gelar Belakang</label>
            <input type="text" id="gelar_belakang" name="gelar_belakang" required>
            <br />
            <input type="submit" name="submit" value="Simpan">
        </form>

        <br />
        <a href="dosen_tampil.php">Kembali Ke Daftar Dosen</a>
    </body>
</html>