<?php

include 'koneksi.php';

session_start();

// if(!(isset($_SESSION['username'])) && !(isset($_SESSION['firstname']))){
//     header("Location: login.php");
// }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket-Konser</title>
    <link rel="icon" href="../src/img/logo-removebg-preview.png">
    <link rel="stylesheet" href="..\src\style\style-detail.css">
    <!-- <link rel="stylesheet" href="..\src\style\style-main.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <header>

        <div id="hyperlink">
            <a href="mainPage.php">Beranda</a>
            <a href="#">Tentang Tiket</a>
            <a href="#">Biaya</a>
            <a href="#">Blog</a>
            <a href="#">Hubungi Kami</a>
        </div>

        <div id="navbar">
            <table id="tab">
                <tbody>
                    <tr>
                        <td><img id="logo2" src="../src/img/logo_ticket_new.png" alt=""></td>
                        <td><img id="logo1" src="../src/img/E-Ticket.png" alt=""></td>
                        <form id="form" action="search.php" method="get">
                            <td id="bt1"><input type="text" name="search" placeholder="Cari konser seru disini"></td>
                            <td id="bt2"><button type="submit">search</button></td>
                        </form>
                        <?php 
                        if(!(isset($_SESSION['username'])) && !(isset($_SESSION['firstname']))){
                            echo '<td id="bt3"><a href="register.php"><button>Register</button></a></td>';
                            echo '<td id="bt4"><a href="login.php"><button>Login</button></a></td>';
                        }else{
                            echo '<td id="bt5"><a href="logout.php"><button>Logout</button></a></td>';
                            echo '<td id="name1">'.$_SESSION['firstname'].'</td>';
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
        

    </header>

    <main>

    <br />

<div id="back">
  <nav>
    <a href="mainPage.php">Beranda</a> >
    <a href="detailPage.php">Detail</a>
  </nav>
  <br />
  <br />

  <a href="mainPage.php">
    <i class="fas fa-undo"></i> <span>Kembali</span>
  </a>
</div>

<?php 

if(isset($_GET["idKonser"])){
    $id = $_GET["idKonser"];
}else{
    header("Location: mainPage.php");
}


$sql_konser = "SELECT k.idKonser ,k.nama, b.namaBand , DATE_FORMAT(k.tanggal, '%d %M %Y') as tanggal, k.tempat, k.gambar, k.deskripsi, k.seatPlan
FROM konser k 
INNER JOIN tiket t ON k.idKonser = t.idKonser 
INNER JOIN band b ON k.idBand = b.idBand
WHERE k.idKonser =".$id."";
$hasil_konser = $connection->query($sql_konser);
$konser = $hasil_konser->fetch_assoc();

$sql_paket = "SELECT deskripsi, stok FROM tiketkategori WHERE idKonser =".$id."";
$hasil_paket = $connection->query($sql_paket);
$paket_tiket = [];
while($baris = $hasil_paket->fetch_assoc()) {
    $paket_tiket[] = $baris;
}

?>


<div id="detail">
  <h1>DETAIL</h1>

  <table>
    <tbody>
      <tr>
        <td colspan="2"><img src="<?php echo $konser['gambar']; ?>" alt="" /></td>
        <td></td>
        <td>
          <table>
            <tr>
              <td>
                <span
                  ><a href="pemesananPage.html"
                    >PESAN TIKET DISINI</a
                  ></span
                >
              </td>
            </tr>

            <tr>
              <td>&nbsp;</td>   
            </tr>
            <?php foreach ($paket_tiket as $index => $paket) : ?>
            <?php if ($index % 2 == 0) : ?>
            <tr>
            <?php endif; ?>
              <td><?php echo $paket['deskripsi']; ?></td>
              <td>STOK: <?php echo $paket['stok']; ?></td>
            <?php if ($index % 2 == 0) : ?>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
          </table>
        </td>
      </tr>
    </tbody>
  </table>

  <div id="desk">
    <h5>DESKRIPSI</h5>
    <p><?php echo $konser['deskripsi']; ?></p>

    <h5>INFORMASI</h5>

  </div>

  <table>
    <tr>
      <td colspan="2">Nama Konser</td>
      <td></td>
      <td>: <?php echo $konser['nama']; ?></td>
    </tr>

    <tr>
      <td colspan="2">Nama Band</td>
      <td></td>
      <td>: <?php echo $konser['namaBand']; ?></td>
    </tr>
    <tr>
      <td colspan="2">Tanggal dan Jam Konser</td>
      <td></td>
      <td>: <?php echo $konser['tanggal']; ?></td>
    </tr>
    <tr>
      <td colspan="2">Lokasi / Venue secara lengkap</td>
      <td></td>
      <td>: <?php echo $konser['tempat']; ?></td>
    </tr>
    <tr>
      <td colspan="2">Seating Plan</td>
      <td></td>
      <td><img src="<?php echo $konser['seatPlan']; ?>" alt="ini gambar" /></td>
    </tr>
  </table>
</div>


<!-- <div id="detail">
  <h1>DETAIL</h1>

  <table>
    <tbody>
      <tr>
        <td colspan="2"><img src="../src/img/dewa2.jpeg" alt="" /></td>
        <td></td>
        <td>
          <table>
            <tr>
              <td>
                <span
                  ><a href="pemesananPage.php"
                    >PESAN TIKET DISINI</a
                  ></span
                >
              </td>
            </tr>

            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>PAKET VIP</td>
              <td>PAKET VVIP</td>
            </tr>
            <tr>
              <td>STOK: 10</td>
              <td>STOK: 15</td>
            </tr>
            <tr>
              <td>PAKET GOLD</td>
              <td>PAKET BRONZE</td>
            </tr>
            <tr>
              <td>STOK: 20</td>
              <td>STOK: 18</td>
            </tr>
          </table>
        </td>
      </tr>
    </tbody>
  </table>

  <div id="desk">
    <h5>DESKRIPSI</h5>
    <p>
      MCM Live Production mengumumkan Pesta Rakyat 30 Tahun Berkarya Dewa
      19 akan digelar di Stadion Siliwangi Kota Bandung pada 5 Maret 2023.
      Kota Bandung masuk dalam daftar Dewa 19 dengan alasan memiliki
      Baladewa dan Baladewi (panggilan penggemar Dewa 19) yang menjadi
      salah satu fanbase terbesar Dewa 19 di Indonesia.
    </p>

    <h5>INFORMASI</h5>
  </div>

  <table>
    <tr>
      <td colspan="2">Nama Konser</td>
      <td></td>
      <td>: Konser Maha Dewa 19 30th Indonesia</td>
    </tr>

    <tr>
      <td colspan="2">Nama Band</td>
      <td></td>
      <td>: Dewa 19</td>
    </tr>
    <tr>
      <td colspan="2">Tanggal dan Jam Konser</td>
      <td></td>
      <td>: 19 Agustus 2023</td>
    </tr>
    <tr>
      <td colspan="2">Lokasi / Venue secara lengkap</td>
      <td></td>
      <td>: Stadion Si Jalak Harupat, Bandung</td>
    </tr>
    <tr>
      <td colspan="2">Seating Plan</td>
      <td></td>
      <td><img src="../src/img/tempatDuduk.jpeg" alt="ini gambar" /></td>
    </tr>
  </table>
</div>   -->

    </main>

    <footer>

        <div id="rincianfooter">

            <div id="footerdata">
                <table>
                    <tr>
                        <td>
                            <ul>
                                <li>Tentang Aplikasi</li>
                                <li>Masuk</li>
                                <li>Biaya</li>
                                <li>Lihat Event</li>
                                <li>FAQ</li>
                                <li>Syarat dan Ketentuan</li>
                                <li>Laporan Kesalahan</li>
                                <li>Sistem</li>
                            </ul>
                        </td>

                        <td>
                            <ul>
                                <li>Lokasi Konser</li>
                                <li>Yogyakarta</li>
                                <li>Jakarta</li>
                                <li>Bandung</li>
                                <li>Solo</li>
                                <li>Medan</li>
                                <li>Bali</li>
                                <li>Magelang</li>
                            </ul>
                        </td>

                        <td>
                            <ul>
                                <li>Genre Konser</li>
                                <li>Rock</li>
                                <li>Dangdut</li>
                                <li>Seriosa</li>
                                <li>Gospel</li>
                                <li>Pop</li>
                                <li>Jazz</li>
                                <li>Blues</li>
                            </ul>
                        </td>


                    </tr>


                </table>

            </div>


            <table>
                <tr>
                    <td> <a href=""><i class="fab fa-instagram"></i></a> </td>
                    <td> <a href=""><i class="fab fa-facebook"></i></a></td>
                    <td> <a href=""><i class="fab fa-youtube"></i></a></td>
                    <td> <a href=""><i class="fab fa-twitter"></i></a></td>
                    <td> <a href=""><i class="fab fa-tiktok"></i></a></td>
                </tr>
            </table>


        </div>



        <div id="nav">
            <nav>
                <a href="">Tentang Kami</a>•
                <a href="">Blog</a>•
                <a href="">Karir</a>•
                <a href="">Kebijakan Privasi</a>•
                <a href="">Kebijakan Cookie</a>•
                <a href="">Panduan</a>•
                <a href="">Hubungi Kami</a>
            </nav>
        </div>

        <p>&copy; Copyright 2024 </p>

    </footer>
</body>

</html>
