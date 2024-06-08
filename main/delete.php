<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idOrder = $_POST['id'];

    $sql = "DELETE FROM pemesanan WHERE id='$idOrder'";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }
}
?>
