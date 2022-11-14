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

    if (isset($_POST['submit'])) {
        $nama_matakuliah = $_POST['nama_matakuliah'];
        $bobot = $_POST['bobot'];
        $semester = $_POST['semester'];

        $query_update = "UPDATE matakuliah SET nama_matakuliah='".$nama_matakuliah."', bobot=".$bobot.", semester=".$bobot." WHERE id_matakuliah=".$id_matakuliah."";

        $update = $koneksi->query($query_update);

        if ($update) {
            echo "Data berhasil disimpan";
        } else {
            echo "Data gagal disimpan";
        }
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