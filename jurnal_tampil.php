<?php 
include 'config.php';

?>
<html>
    <head>
        <title>Jurnal UNUHA</title>
    </head>
    <body>
        <h1>Data Jurnal</h1>
        <a href="jurnal_tambah.php">
            <button>Tambah Jurnal</button>
        </a>
        <br/>
        <br/>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Matakuliah</th>
                    <th>Nama Dosen</th>
                    <th>Tanggal Kuliah</th>
                    <th>Pokok Bahasan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">Belum Ada Data Jurnal</td>
                </tr>
            </tbody>
        </table>

        <br />
        <a href="index.php">Kembali Ke Menu Utama</a>
    </body>
</html>