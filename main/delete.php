<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idOrder = $_POST['id'];

    // Ambil jumlah tiket yang dipesan yang akan dibatalkan
    $sql = "SELECT jumlah, idTiketKategori FROM pemesanan WHERE id = '$idOrder'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $jumlah_tiket = $row['jumlah'];
        $idTiketKategori = $row['idTiketKategori'];

        // Mulai transaksi
        $connection->begin_transaction();

        // Hapus pemesanan dari database
        $delete_sql = "DELETE FROM pemesanan WHERE id = '$idOrder'";
        $delete_result = $connection->query($delete_sql);

        if ($delete_result === TRUE) {
            // Tambahkan jumlah tiket yang dibatalkan ke stok tiketkategori
            $update_sql = "UPDATE tiketkategori SET stok = stok + $jumlah_tiket WHERE idTiketKategori = '$idTiketKategori'";
            $update_result = $connection->query($update_sql);

            if ($update_result === TRUE) {
                // Commit transaksi jika semua operasi berhasil
                $connection->commit();
                echo "success";
            } else {
                // Rollback transaksi jika terjadi kesalahan
                $connection->rollback();
                echo "error: " . $connection->error;
            }
        } else {
            echo "error: " . $connection->error;
        }
    } else {
        echo "error: Pemesanan not found";
    }
}

?>
