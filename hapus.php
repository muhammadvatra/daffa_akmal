<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_pembeli = $_GET['id'];

    // Hapus data dari tabel orderjoki terlebih dahulu
    $sql_order = "DELETE FROM orderjoki WHERE id_pembeli='$id_pembeli'";
    $result_order = $koneksi->query($sql_order);

    // Jika penghapusan dari orderjoki berhasil, hapus data dari koleksi_pembeli
    if ($result_order) {
        $sql_pembeli = "DELETE FROM koleksi_pembeli WHERE id_pembeli='$id_pembeli'";
        $result_pembeli = $koneksi->query($sql_pembeli);

        if ($result_pembeli) {
            header("Location: index.php");
        } else {
            echo "Gagal menghapus data koleksi_pembeli: " . $koneksi->error;
        }
    } else {
        echo "Gagal menghapus data orderjoki: " . $koneksi->error;
    }
} else {
    echo "ID Pembeli tidak diberikan";
    exit;
}
?>
