<?php


include "koneksi.php";

session_start();

if(!(isset($_SESSION['username'])) && !(isset($_SESSION['firstname']))){
    header("Location: login.php");
}

if(isset($_SESSION["idUser"])){
  $idUser = $_SESSION["idUser"];
}

if(isset($_POST["idK"])){
  $id = $_POST["idK"];
}else{
  // header("Location: mainPage.php");
}

$sql1 = "SELECT idKonser, nama, gambar from konser WHERE idKonser = ".$id."";
$hasil = $connection->query($sql1);
while($new = $hasil->fetch_assoc()){
  $idKonser = $new['idKonser'];
  $nama = $new["nama"];
  $gambar = $new["gambar"];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data dari form
  $nama_lengkap = $_POST['namaPesan'];
  $no_telp = $_POST['nomerPesan'];
  $email = $_POST['e-mailPesan'];
  $nik = $_POST['nikPesan'];
  $tanggal_lahir = $_POST['tanggalLahirPesan'];
  $jenis_kelamin = isset($_POST['kelamindata']) ? $_POST['kelamindata'] : null;
  $pembayaran = $_POST['bayar'];
  $total_harga = 0; // Inisialisasi harga total

  // Periksa dan hitung total harga tiket reguler
  if (isset($_POST['reguler']) && $_POST['qty_reguler'] > 0) {
      $qty_reguler = (int)$_POST['qty_reguler'];
      $harga_reguler = 200000;
      $total_harga += $qty_reguler * $harga_reguler;

      // Update stok reguler
      $stmt = $connection->prepare("UPDATE tiketkategori SET stok = stok - ? WHERE idTiketKategori = 'reguler'");
      $stmt->bind_param("i", $qty_reguler);
      if (!$stmt->execute()) {
          echo "Error updating reguler ticket stock: " . $stmt->error;
      }
      $stmt->close();
  }

  // Periksa dan hitung total harga paket tiket
  if (isset($_POST['paket'])) {
      foreach ($_POST['paket'] as $paket_id) {
          $qty_paket = (int)$_POST['qty_' . $paket_id];
          $x = $nama;
          $parts = explode(" ", $x);
          $last_part = end($parts);
          $tiket = $last_part.$paket_id;
          if ($qty_paket > 0) {
              $stmt = $connection->prepare("SELECT harga, stok FROM tiketkategori WHERE idTiketKategori = ?");
              $stmt->bind_param("s", $tiket);
              $stmt->execute();
              $stmt->bind_result($harga_paket, $stok_paket);
              $stmt->fetch();
              $stmt->close();

              $total_harga += $qty_paket * $harga_paket;

              // Update stok paket
              $stmt = $connection->prepare("UPDATE tiketkategori SET stok = stok - ? WHERE idTiketKategori = ?");
              $stmt->bind_param("is", $qty_paket, $tiket);
              if (!$stmt->execute()) {
                  echo "Error updating paket ticket stock: " . $stmt->error;
              }
              $stmt->close();
          }
      }
  }

  // // Insert data pemesanan ke database
  // $stmt = $connection->prepare("INSERT INTO pemesanan (idUserOrder,nama_lengkap, no_telp, email, nik, tanggal_lahir, jenis_kelamin, pembayaran, jumlah, total_harga) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  // $stmt->bind_param("isssssssii",$idUser, $nama_lengkap, $no_telp, $email, $nik, $tanggal_lahir, $jenis_kelamin, $pembayaran, $jumlah, $total_harga);
  // if (!$stmt->execute()) {
  //     echo "Error inserting pemesanan: " . $stmt->error;
  // }
  // $stmt->close();

  $idUserOrder = $idUser; // Ambil idUser dari sesi pengguna yang sedang login

  if ($idUserOrder == null){
    echo "<center> <h1> Silahkan login dahulu </h1> </center>";
  }

  // Insert data pembelian to pembelian table
  if (isset($_POST['reguler']) && $_POST['qty_reguler'] > 0) {
      $qty_reguler = (int)$_POST['qty_reguler'];
      for ($i = 0; $i < $qty_reguler; $i++) {
          $stmt = $connection->prepare("INSERT INTO pembelian (idTiketKategori, idUserOrder) VALUES (?, ?)");
          $stmt->bind_param("si", $tiket, $idUserOrder);
          if (!$stmt->execute()) {
              echo "gagal pembelian reguler: " . $stmt->error;
          }
          $stmt->close();
      }
  }

  if (isset($_POST['paket'])) {
      foreach ($_POST['paket'] as $paket_id) {
          $qty_paket = (int)$_POST['qty_' . $paket_id];
          if ($qty_paket > 0) {
              // Insert data pemesanan ke database
              $stmt = $connection->prepare("INSERT INTO pemesanan (idUserOrder,nama_lengkap, no_telp, email, nik, tanggal_lahir, jenis_kelamin, pembayaran, idTiketKategori, jumlah, total_harga) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? ,?, ?)");
              $stmt->bind_param("issssssssii",$idUser, $nama_lengkap, $no_telp, $email, $nik, $tanggal_lahir, $jenis_kelamin, $pembayaran, $tiket, $qty_paket, $total_harga);
              if (!$stmt->execute()) {
                  echo "Error inserting pemesanan: " . $stmt->error;
              }
              $stmt->close();
              }
      }
  }
//   echo "<center> <h1> Pemesanan berhasil! </h1> </center>";
  header("Location:historiPage.php");
}

// $connection->close();
?>