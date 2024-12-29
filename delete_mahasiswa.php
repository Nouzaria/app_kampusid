<?php
include 'koneksi.php';

if (isset($_GET['nim'])) {
    // Ambil NIM dari parameter URL
    $nim = $_GET['nim'];

    // Query untuk menghapus data mahasiswa
    $sql = "DELETE FROM tb_mhs WHERE nim = '$nim'";

    // Eksekusi query dan cek hasilnya
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data mahasiswa berhasil dihapus');</script>";
        echo "<script>window.location.href='mahasiswa.php?page=mahasiswa';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "NIM tidak ditemukan.";
}

$conn->close();
?>
