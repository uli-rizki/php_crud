<?php 
include 'config.php';

$id_matakuliah = isset($_GET['id_matakuliah']) ? $_GET['id_matakuliah'] : "";
if ($id_matakuliah == "") {
    echo "Tidak ada ID Matakuliah";
} else {
    $sql = "SELECT * FROM matakuliah WHERE id_matakuliah=".$id_matakuliah."";
    $hasil = $koneksi->query($sql);

    if ($hasil->num_rows > 0) {
        $data = $hasil->fetch_object();
        $nama_matakuliah = $data->nama_matakuliah;
        $bobot = $data->bobot;
        $semester = $data->semester;
    } else {
        echo "Data tidak ditemukan";
    }
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
            <input type="text" id="nama_matakuliah" name="nama_matakuliah" value="<?php echo isset($nama_matakuliah) ? $nama_matakuliah : ""; ?>" required>
            <br />
            <label>Bobot</label>
            <input type="text" id="bobot" name="bobot" value="<?php echo isset($bobot) ? $bobot : ""; ?>" required>
            <br />
            <label>Semester</label>
            <input type="text" id="semester" name="semester" value="<?php echo isset($semester) ? $semester : ""; ?>" required>
            <br />
            <input type="submit" name="submit" value="Simpan">
        </form>

        <br />
        <a href="matakuliah_tampil.php">Kembali Ke Daftar Makul</a>
    </body>
</html>