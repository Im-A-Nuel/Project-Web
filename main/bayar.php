<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $sql = "UPDATE pemesanan SET status_pembayaran='Sudah Bayar', waktu_pembayaran=NOW() WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        echo "Payment processed successfully";
    } else {
        echo "Error processing payment: " . $connection->error;
    }
}
?>
