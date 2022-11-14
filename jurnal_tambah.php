<?php
include 'config.php';

$query_matakuliah = "SELECT * FROM matakuliah";
$data_matakuliah = $koneksi->query($query_matakuliah);

?>

<html>
    <head>
        <title>Jurnal UNUHA</title>
    </head>
    <body>
        <h1>Tambah Jurnal</h1>

        <form action="" method="POST">
            <label>Nama Matakuliah</label>
            <select id="id_matakuliah" name="id_matakuliah" required>
                <option value="">-- Pilih Matakuliah --</option>
                <?php
                if ($data_matakuliah->num_rows > 0) {
                while($row_makul = $data_matakuliah->fetch_assoc()) {
                ?>
                <option value="<?php echo $row_makul['id_matakuliah']?>"><?php echo $row_makul['nama_matakuliah']?></option>
                <?php
                }}
                ?>
            </select>
            <br />
            <br />
            <input type="submit" name="submit" value="Simpan">
        </form>

        <br />
        <a href="jurnal_tampil.php">Kembali Ke Daftar Makul</a>
    </body>
</html>