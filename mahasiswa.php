<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .menu, .action-buttons {
            margin-bottom: 20px;
        }
        .action-buttons a {
            margin-right: 10px;
            padding: 5px 10px;
            color: white;
            background-color: #28a745;
            border-radius: 5px;
            text-decoration: none;
        }
        .action-buttons a.delete {
            background-color: #dc3545;
        }
        a:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <h1>Data Mahasiswa</h1>
    <div class="menu">
        <a href="tambah_mahasiswa.php" style="text-decoration: none; background-color: #007bff; color: white; padding: 8px 12px; border-radius: 5px;">Tambah Mahasiswa</a>
        <a href="index.php" style="text-decoration: none; background-color: #6c757d; color: white; padding: 8px 12px; border-radius: 5px;">Kembali ke Menu Utama</a>
    </div>
    
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>No Telpon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result_mhs = $conn->query("SELECT * FROM tb_mhs");
        if ($result_mhs->num_rows > 0) {
            while($row = $result_mhs->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['nim']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['jurusan']}</td>
                        <td>{$row['tempat_lahir']}</td>
                        <td>{$row['tgl_lahir']}</td>
                        <td>{$row['jkl']}</td>
                        <td>{$row['telp']}</td>
                        <td>{$row['alamat']}</td>
                        <td class='action-buttons'>
                            <a href='edit_mahasiswa.php?nim={$row['nim']}' class='edit'>Edit</a>
                            <a href='delete_mahasiswa.php?nim={$row['nim']}' class='delete' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Tidak ada data mahasiswa</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
$conn->close();
?>
