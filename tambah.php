<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nickgame = $_POST['nickgame'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $paket_harga = $_POST['paket_harga'];

    // Tambah data ke tabel koleksi_pembeli
    $sql_pembeli = "INSERT INTO koleksi_pembeli (nama, email, nickgame, nomor_telepon) VALUES ('$nama', '$email', '$nickgame', '$nomor_telepon')";
    $result_pembeli = $koneksi->query($sql_pembeli);

    // Ambil ID pembeli yang baru ditambahkan
    $id_pembeli = $koneksi->insert_id;

    // Tambah data ke tabel orderjoki dengan menghubungkannya ke ID pembeli
    $sql_order = "INSERT INTO orderjoki (id_pembeli, paket_harga) VALUES ('$id_pembeli', '$paket_harga')";
    $result_order = $koneksi->query($sql_order);

    if ($result_pembeli && $result_order) {
        header("Location: index.php");
    } else {
        echo "Gagal menambahkan data: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembeli</title>
 <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #000;
            color: #fff;
        }

        h2 {
            color: #3498db;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #3498db;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            background-color: #333;
            color: #fff;
            border: 1px solid #3498db;
        }

        select {
            margin-bottom: 15px;
            font-size: 16px; /* Increased font size */
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <h2>Tambah Pembeli</h2>
    <form method="post">
        <label for="nama">Nama Pembeli:</label>
        <input type="text" name="nama" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="nickgame">Nick Game:</label>
        <input type="text" name="nickgame" required>
        <br>
        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="tel" name="nomor_telepon" required>
        <br>
        <label for="paket_harga">Paket Harga:</label>
        <select name="paket_harga">
            <option value="paket1">Paket 1 - 50k</option>
            <option value="paket2">Paket 2 - 70k</option>
            <option value="paket3">Paket 3 - 100k</option>
        </select>
        <br>
        <input type="submit" value="Tambah">
    </form>
</body>

</html>
