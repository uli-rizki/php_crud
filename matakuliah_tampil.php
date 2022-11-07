<?php 
include 'config.php';

// Ambil data dari database
$sql = "SELECT * FROM matakuliah";
$hasil = $koneksi->query($sql);

?>
<html>
    <head>
        <title>Jurnal UNUHA</title>
    </head>
    <body>
        <h1>Data Matakuliah</h1>
        <a href="matakuliah_tambah.php">
            <button>Tambah Matakuliah</button>
        </a>
        <br/>
        <br/>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Matakuliah</th>
                    <th>SKS</th>
                    <th>Bobot</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no_urut = 1; 
                if ($hasil->num_rows > 0) {
                    while ($row = $hasil->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $no_urut++; ?></td>
                        <td><?php echo $row['nama_matakuliah']; ?></td>
                        <td><?php echo $row['bobot']; ?></td>
                        <td><?php echo $row['semester']; ?></td>
                        <td>
                            <a href="matakuliah_edit.php?id_matakuliah=<?php echo $row['id_matakuliah'] ?>">Edit</a>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                ?>
                <tr>
                    <td colspan="4">Belum Ada Data Matakuliah</td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>

        <br />
        <a href="index.php">Kembali Ke Menu Utama</a>
    </body>
</html>