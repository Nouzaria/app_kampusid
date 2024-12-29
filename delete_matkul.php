<?php
include 'koneksi.php';

if (isset($_GET['kode'])) {
    // Ambil Kode dari parameter URL
    $kode = $_GET['kode'];

    // Query untuk menghapus data mata kuliah
    $sql = "DELETE FROM tb_matkul WHERE kode = '$kode'";

    // Eksekusi query dan cek hasilnya
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data mata kuliah berhasil dihapus');</script>";
        echo "<script>window.location.href='matkul.php?page=matkul';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Kode tidak ditemukan.";
}

$conn->close();
?>
