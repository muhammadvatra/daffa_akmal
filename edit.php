<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pembeli = $_POST['id_pembeli'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nickgame = $_POST['nickgame'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $paket_harga = $_POST['paket_harga'];

    // Update data di tabel koleksi_pembeli
    $sql_pembeli = "UPDATE koleksi_pembeli SET nama='$nama', email='$email', nickgame='$nickgame', nomor_telepon='$nomor_telepon' WHERE id_pembeli='$id_pembeli'";
    $result_pembeli = $koneksi->query($sql_pembeli);

    // Update data di tabel orderjoki
    $sql_order = "UPDATE orderjoki SET paket_harga='$paket_harga' WHERE id_pembeli='$id_pembeli'";
    $result_order = $koneksi->query($sql_order);

    if ($result_pembeli && $result_order) {
        header("Location: index.php");
    } else {
        echo "Gagal mengedit data: " . $koneksi->error;
    }
} elseif (isset($_GET['id'])) {
    $id_pembeli = $_GET['id'];

    // Ambil data dari tabel koleksi_pembeli dan orderjoki
    $sql = "SELECT p.*, o.paket_harga FROM koleksi_pembeli p LEFT JOIN orderjoki o ON p.id_pembeli = o.id_pembeli WHERE p.id_pembeli='$id_pembeli'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan";
        exit;
    }
} else {
    echo "ID Pembeli tidak diberikan";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pembeli</title>
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
    <h2>Edit Pembeli</h2>
    <form method="post">
        <input type="hidden" name="id_pembeli" value="<?php echo $row['id_pembeli']; ?>">
        <label for="nama">Nama Pembeli:</label>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        <br>
        <label for="nickgame">Nick Game:</label>
        <input type="text" name="nickgame" value="<?php echo $row['nickgame']; ?>" required>
        <br>
        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="tel" name="nomor_telepon" value="<?php echo $row['nomor_telepon']; ?>" required>
        <br>
        <label for="paket_harga">Paket Harga:</label>
        <select name="paket_harga">
            <option value="paket1" <?php echo ($row['paket_harga'] == 'paket1') ? 'selected' : ''; ?>>Paket 1 - 50k</option>
            <option value="paket2" <?php echo ($row['paket_harga'] == 'paket2') ? 'selected' : ''; ?>>Paket 2 - 70k</option>
            <option value="paket3" <?php echo ($row['paket_harga'] == 'paket3') ? 'selected' : ''; ?>>Paket 3 - 100k</option>
        </select>
        <br>
        <input type="submit" value="Simpan">
    </form>
</body>

</html>
