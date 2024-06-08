<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idOrder = $_POST['idOrder'];
    $nama = $_POST['namaPesan'];
    $no_telp = $_POST['nomerPesan'];
    $email = $_POST['e-mailPesan'];
    $nik = $_POST['nikPesan'];
    $tanggal_lahir = $_POST['tanggalLahirPesan'];
    $jenis_kelamin = $_POST['kelamindata'];

    $sql = "UPDATE pemesanan SET 
            nama_lengkap='$nama', 
            no_telp='$no_telp', 
            email='$email', 
            nik='$nik', 
            tanggal_lahir='$tanggal_lahir', 
            jenis_kelamin='$jenis_kelamin'
            WHERE id='$idOrder'";

    if ($connection->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: historiPage.php");
        exit;
    } else {
        echo "Error updating record: " . $connection->error;
    }
}
?>
