<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .menu {
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="menu">
        <h1>Menu Utama</h1>
        <a href="mahasiswa.php?page=mahasiswa">Data Mahasiswa</a>
        <a href="matkul.php?page=matkul">Data Mata Kuliah</a>
        <a href="dosen.php?page=dosen">Data Dosen</a>
    </div>

</body>
</html>
