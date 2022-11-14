<?php 
include 'config.php';

// Ambil data dari database
$sql = "SELECT * FROM dosen";
$hasil = $koneksi->query($sql);

?>
<html>
    <head>
        <title>Jurnal UNUHA</title>
    </head>
    <body>
        <h1>Data Dosen</h1>
        <a href="dosen_tambah.php">
            <button>Tambah Dosen</button>
        </a>
        <br/>
        <br/>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIDN</th>
                    <th>Nama Dosen</th>
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
                        <td><?php echo $row['nidn']; ?></td>
                        <td><?php echo $row['gelar_depan']." ".$row['nama_dosen'].", ".$row['gelar_belakang']; ?></td>
                        <td>
                            <a href="dosen_edit.php?id_dosen=<?php echo $row['id_dosen'] ?>">Edit</a>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                ?>
                <tr>
                    <td colspan="4">Belum Ada Data Dosen</td>
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