<?php
include 'koneksi.php';

$sql = "SELECT p.*, o.paket_harga FROM koleksi_pembeli p LEFT JOIN orderjoki o ON p.id_pembeli = o.id_pembeli";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Joki Game</title>
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

        a {
            color: #3498db;
            text-decoration: none;
            margin-bottom: 10px;
            display: inline-block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #3498db;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #333;
        }

        tr:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <h2>Data Pembeli dan Pesanan</h2>
    <a href="tambah.php">Tambah Pembeli</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nick Game</th>
            <th>Nomor Telepon</th>
            <th>Paket Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id_pembeli'] . "</td>
                        <td>" . $row['nama'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['nickgame'] . "</td>
                        <td>" . $row['nomor_telepon'] . "</td>
                        <td>" . $row['paket_harga'] . "</td>
                        <td>
                            <a href='edit.php?id=" . $row['id_pembeli'] . "'>Edit</a>
                            <a href='hapus.php?id=" . $row['id_pembeli'] . "'>Hapus</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>

</html>
