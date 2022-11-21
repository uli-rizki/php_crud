<?php 
session_start();
include 'config.php';

if (! isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id_dosen = isset($_GET['id_dosen']) ? $_GET['id_dosen'] : "";

if ($id_dosen == '') {
    echo "Tidak ada id";
} else {
    $sql = "SELECT * FROM dosen WHERE id_dosen=".$id_dosen."";
    $hasil = $koneksi->query($sql);

    if ($hasil->num_rows > 0) {
        $data = $hasil->fetch_object();
        $nidn = $data->nidn;
        $nama_dosen = $data->nama_dosen;
        $gelar_depan = $data->gelar_depan;
        $gelar_belakang = $data->gelar_belakang;
    } else {
        echo "Data tidak ditemukan";
    }

    if (isset($_POST['submit'])) {
        $nidn = $_POST['nidn'];
        $nama_dosen = $_POST['nama_dosen'];
        $gelar_depan = $_POST['gelar_depan'] ? $_POST['gelar_depan'] : "";
        $gelar_belakang = $_POST['gelar_belakang'];

        $query_update = "UPDATE dosen 
                SET nidn='".$nidn."', 
                nama_dosen='".$nama_dosen."', 
                gelar_depan='".$gelar_depan."',
                gelar_belakang='".$gelar_belakang."'  
                WHERE id_dosen=".$id_dosen."
                ";

        $update = $koneksi->query($query_update);

        if ($update) {
            echo "Data berhasil disimpan";
        } else {
            echo "Data Gagal Disimpan";
        }

        $koneksi->close();
    }
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
            <input type="text" id="nidn" name="nidn" value="<?php echo isset($nidn) ? $nidn : ""; ?>" required>
            <br />
            <label>Nama Dosen</label>
            <input type="text" id="nama_dosen" name="nama_dosen" value="<?php echo isset($nama_dosen) ? $nama_dosen : ""; ?>" required>
            <br />
            <label>Gelar Depan</label>
            <input type="text" id="gelar_depan" name="gelar_depan" value="<?php echo isset($gelar_depan) ? $gelar_depan : ""; ?>">
            <br />
            <label>Gelar Belakang</label>
            <input type="text" id="gelar_belakang" name="gelar_belakang" value="<?php echo isset($gelar_belakang) ? $gelar_belakang : ""; ?>" required>
            <br />
            <input type="submit" name="submit" value="Simpan">
        </form>

        <br />
        <a href="dosen_tampil.php">Kembali Ke Daftar Dosen</a>
    </body>
</html>