<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>
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

    <h1>Data Mata Kuliah</h1>
    <div class="menu">
        <a href="tambah_matkul.php" style="text-decoration: none; background-color: #007bff; color: white; padding: 8px 12px; border-radius: 5px;">Tambah Mata Kuliah</a>
        <a href="index.php" style="text-decoration: none; background-color: #6c757d; color: white; padding: 8px 12px; border-radius: 5px;">Kembali ke Menu Utama</a>
    </div>
    
    <table>
        <tr>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Dosen Pengampu</th>
            <th>Kelas</th>
            <th>Ruang</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result_matkul = $conn->query("SELECT * FROM tb_matkul");
        if ($result_matkul->num_rows > 0) {
            while($row = $result_matkul->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['kode']}</td>
                        <td>{$row['matkul']}</td>
                        <td>{$row['sks']}</td>
                        <td>{$row['dosen']}</td>
                        <td>{$row['kelas']}</td>
                        <td>{$row['ruang']}</td>
                        <td>{$row['hari']}</td>
                        <td>{$row['jam']}</td>
                        <td class='action-buttons'>
                            <a href='edit_matkul.php?kode={$row['kode']}' class='edit'>Edit</a>
                            <a href='delete_matkul.php?kode={$row['kode']}' class='delete' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Tidak ada data mata kuliah</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
$conn->close();
?>
