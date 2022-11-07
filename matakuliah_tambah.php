<?php 
include 'config.php';

if (isset($_POST['submit'])) {
    $nama_matakuliah = $_POST['nama_matakuliah'];
    $bobot = $_POST['bobot'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO matakuliah (nama_matakuliah, bobot, semester) 
        VALUES('".$nama_matakuliah."', '".$bobot."', '".$semester."')";

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
        <h1>Tambah Matakuliah</h1>

        <form action="" method="POST">
            <label>Nama Matakuliah</label>
            <input type="text" id="nama_matakuliah" name="nama_matakuliah" required>
            <br />
            <label>Bobot</label>
            <input type="text" id="bobot" name="bobot" required>
            <br />
            <label>Semester</label>
            <input type="text" id="semester" name="semester" required>
            <br />
            <input type="submit" name="submit" value="Simpan">
        </form>

        <br />
        <a href="matakuliah_tampil.php">Kembali Ke Daftar Makul</a>
    </body>
</html>