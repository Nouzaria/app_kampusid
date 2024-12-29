<?php
include 'koneksi.php';

if (isset($_GET['kode'])) {
    // Ambil Kode dari parameter URL
    $kode = $_GET['kode'];

    // Query untuk mengambil data mahasiswa
    $result = $conn->query("SELECT * FROM tb_matkul WHERE kode = '$kode'");
    $matkul = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $kode = $_POST['kode'];
    $matkul = $_POST['matkul'];
    $sks = $_POST['sks'];
    $dosen = $_POST['dosen'];
    $kelas = $_POST['kelas'];
    $ruang = $_POST['ruang'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];

    // Query untuk update data mata kuliah
    $sql = "UPDATE tb_matkul SET 
                matkul = '$matkul', 
                sks = '$sks', 
                dosen = '$dosen', 
                kelas = '$kelas', 
                ruang = '$ruang', 
                hari = '$hari', 
                jam = '$jam' 
            WHERE kode = '$kode'";

    // Eksekusi query dan cek hasilnya
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data mata kuliah berhasil diperbarui');</script>";
        echo "<script>window.location.href='matkul.php?page=matkul';</script>";
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
    <title>Edit Data Mata Kuliah</title>
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

    <h1>Edit Data Mata Kuliah</h1>
    <form action="edit_matkul.php" method="POST">
        <input type="hidden" name="kode" value="<?php echo $matkul['kode']; ?>">

        <label for="matkul">Mata Kuliah:</label>
        <input type="text" id="matkul" name="matkul" value="<?php echo $matkul['matkul']; ?>" required>

        <label for="sks">SKS:</label>
        <input type="text" id="sks" name="sks" value="<?php echo $matkul['sks']; ?>" required>

        <label for="dosen">Dosen Pengampu:</label>
        <input type="text" id="dosen" name="dosen" value="<?php echo $matkul['dosen']; ?>" required>

        <label for="kelas">Kelas:</label>
        <input type="text" id="kelas" name="kelas" value="<?php echo $matkul['kelas']; ?>" required>

        <label for="ruang">Ruang:</label>
        <input type="text" id="ruang" name="ruang" value="<?php echo $matkul['ruang']; ?>" required>

        <label for="hari">Hari:</label>
        <input type="text" id="hari" name="hari" value="<?php echo $matkul['hari']; ?>" required>

        <label for="jam">Jam:</label>
        <input type="time" id="jam" name="jam" value="<?php echo $matkul['jam']; ?>" required>

        <button type="submit">Update Mahasiswa</button>
    </form>

    <a href="index.php?page=matkul">Kembali ke Data Mata Kuliah</a>

</body>
</html>
