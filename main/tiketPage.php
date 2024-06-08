<?php

include 'koneksi.php';

session_start();

if(!(isset($_SESSION['username'])) && !(isset($_SESSION['firstname']))){
    header("Location: login.php");
}
if(isset($_SESSION["idUser"])){
    $idUser = $_SESSION["idUser"];
  }

  if(isset($_POST["idOrder"])){
    $id = $_POST["idOrder"];
  }



?>
 

<?php
    $sql = "SELECT p.id, p.nama_lengkap, p.no_telp, p.email, p.pembayaran, p.total_harga, p.waktu_pembayaran, p.waktu_pembelian, p.status_pembayaran, p.jumlah, t.deskripsi, t.harga, k.nama, k.tanggal, k.gambar 
    FROM pemesanan p INNER JOIN tiketkategori t ON p.idTiketKategori = t.idTiketKategori 
    INNER JOIN konser k ON t.idKonser = k.idKonser WHERE p.id=".$id;
    
$result = $connection->query($sql);
?>



    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIKET KONSER</title>
    <link rel="icon" href="../src/img/logo-removebg-preview.png">
    <link rel="stylesheet" href="../src/style/style-tiket.css">
</head>
<body>
    
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        for($i = 1; $i <= $row["jumlah"];$i++){
    ?>
    <div class="nota">

    <table>
        <tr>
            <td><img id="logo2" src="../src/img/logo_ticket_new.png" alt=""></td>
            <td><img id="logo1" src="../src/img/E-Ticket.png" alt=""></td>
        </tr>
    </table>
    
        <h2>TIKET <p><?php echo $row['nama']; ?></p></h2>

        <img src="<?php echo $row['gambar']; ?>" alt="ini gambar">
        <p><span class="keterangan">Nama Konser: </span> <?php echo $row['nama']; ?></p>
        <p><span class="keterangan">Tanggal Konser:</span> <?php echo $row['tanggal']; ?></p>
        
        <br>
        <p><span class="keterangan">JENIS TIKET</span></p> 

        <h1><?php echo $row['deskripsi'];?></h1>

        <p><span class="keterangan">Terima Kasih Sudah Membeli Tiket.</span></p>
    </div>
    <?php }}}?>
</body>
</html>
