<?php
include 'koneksi.php';

if (isset($_GET['nim'])) {
    // Ambil NIM dari parameter URL
    $nim = $_GET['nim'];

    // Query untuk mengambil data mahasiswa
    $result = $conn->query("SELECT * FROM tb_mhs WHERE nim = '$nim'");
    $mahasiswa = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jkl = $_POST['jkl'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    // Query untuk update data mahasiswa
    $sql = "UPDATE tb_mhs SET 
                nama = '$nama', 
                jurusan = '$jurusan', 
                tempat_lahir = '$tempat_lahir', 
                tgl_lahir = '$tgl_lahir', 
                jkl = '$jkl', 
                telp = '$telp', 
                alamat = '$alamat' 
            WHERE nim = '$nim'";

    // Eksekusi query dan cek hasilnya
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data mahasiswa berhasil diperbarui');</script>";
        echo "<script>window.location.href='mahasiswa.php?page=mahasiswa';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <h1>Edit Data Mahasiswa</h1>
    <form action="edit_mahasiswa.php" method="POST">
        <input type="hidden" name="nim" value="<?php echo $mahasiswa['nim']; ?>">

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $mahasiswa['nama']; ?>" required>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo $mahasiswa['jurusan']; ?>" required>

        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo $mahasiswa['tempat_lahir']; ?>" required>

        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?php echo $mahasiswa['tgl_lahir']; ?>" required>

        <label for="jkl">Jenis Kelamin:</label>
        <select id="jkl" name="jkl" required>
            <option value="Laki-laki" <?php if ($mahasiswa['jkl'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
            <option value="Perempuan" <?php if ($mahasiswa['jkl'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
        </select>

        <label for="telp">No Telepon:</label>
        <input type="text" id="telp" name="telp" value="<?php echo $mahasiswa['telp']; ?>" required>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?php echo $mahasiswa['alamat']; ?>" required>

        <button type="submit">Update Mahasiswa</button>
    </form>

    <a href="index.php?page=mahasiswa">Kembali ke Data Mahasiswa</a>

</body>
</html>
