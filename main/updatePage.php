<?php
include "koneksi.php";

session_start();


if(isset($_POST['idOrder'])){
  $idOrder = $_POST['idOrder']; // Get the user ID from the URL or session
}else{
  header("Location: mainPage.php");
}

// Fetch user data from the database
$sql = "SELECT id, nama_lengkap, no_telp, email, nik, tanggal_lahir, jenis_kelamin FROM pemesanan WHERE id='$idOrder'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $nama = $row['nama_lengkap'];
    $no_telp = $row['no_telp'];
    $email = $row['email'];
    $nik = $row['nik'];
    $tanggal_lahir = $row['tanggal_lahir'];
    $jenis_kelamin = $row['jenis_kelamin'];
} else {
    echo "No user data found.";
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pemesanan</title>
    <link rel="icon" href="../src/img/logo-removebg-preview.png">
    <link rel="stylesheet" href="../src/style/style-updatePage.css">
    <script src="update.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>


<header>
      <div id="hyperlink">
        <a href="mainPage.php">Beranda</a>
        <a href="detailPage.php?">Tentang Tiket</a>
        <a href="pemesananPage.php">Pemesanan</a>
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
<center>

<div id="backk">
<a id="back" href="historiPage.php">
    <i class="fas fa-undo"></i> <span>Kembali</span>
  </a>
  </div>

<div id="form">
<form action="update.php" method="post">
    <div id="detailPesan">
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td><h5>Detail Pemesanan Tiket</h5></td>
                        </tr>
                        <tr>
                            <!-- <td><p><?php //echo $nama;?></p></td> -->
                        </tr>
                    </table>
                </td>
                <td>
                    <h5>Isi Data Diri</h5>
                    <p class="namaTiket"> isi data diri anda dengan lengkap</p>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <label for="datanama">Nama Lengkap</label>
                                    <br>
                                    <input type="hidden" name="idOrder" value="<?php echo $id; ?>">
                                    <label for="datanama">masukkan nama sesuai data diri anda</label>
                                    <br>
                                    <input
                                        type="text"
                                        name="namaPesan"
                                        id="datanama"
                                        placeholder="masukkan nama anda"
                                        value="<?php echo htmlspecialchars($nama); ?>"
                                        required/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="notelpdata">No Telp</label>
                                    <br>
                                    <label for="notelpdata">Nomor Telepon yang dapat dihubungi</label>
                                    <br />
                                    <input
                                        type="number"
                                        name="nomerPesan"
                                        id="notelpdata"
                                        placeholder="masukkan nomor anda"
                                        value="<?php echo htmlspecialchars($no_telp); ?>"
                                        required
                                    />
                                    <br />
                                    <label for="WAID">
                                        <input type="checkbox" name="" id="WAID" />
                                        kirimkan ke whatsapp
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="dataemailform">E-Mail</label>
                                    <br>
                                    <label for="dataemailform">E-Mail konfirmasi</label>
                                    <br />
                                    <input
                                        type="text"
                                        name="e-mailPesan"
                                        id="dataemailform"
                                        placeholder="masukkan E-Mail anda"
                                        value="<?php echo htmlspecialchars($email); ?>"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="dataNIK">NIK</label>
                                    <br />
                                    <label for="dataNIK">masukkan NIK sesuai KTP anda</label>
                                    <br />
                                    <input
                                        type="number"
                                        name="nikPesan"
                                        id="dataNIK"
                                        placeholder="masukkan NIK anda"
                                        value="<?php echo htmlspecialchars($nik); ?>"
                                        required
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="datatanggal">Tanggal Lahir</label>
                                    <br />
                                    <input type="date" name="tanggalLahirPesan" id="datatanggal" value="<?php echo htmlspecialchars($tanggal_lahir); ?>" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="kelamindata">Jenis Kelamin</label>
                                    <br />
                                    <select name="kelamindata" id="kelamindata" required>
                                        <option value="">pilih</option>
                                        <option value="Laki-Laki" <?php echo ($jenis_kelamin == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php echo ($jenis_kelamin == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>Pastikan Data Diri Yang Anda Isi Sudah Sesuai</p>
                    <div id=inputdata>
                        <input type="submit" value="Simpan" id="tombolsimpan">
                        <input type="reset" value="Batal" id="tombolbatal">
                    </div>
                </td>
            </tr>
        </table>
    </div>
</form>
</div>
</center>
</main>



<footer>
      <div id="rincianfooter">
        <center>
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
        </center>

        <table>
          <tr>
            <td>
              <a href=""><i class="fab fa-instagram"></i></a>
            </td>
            <td>
              <a href=""><i class="fab fa-facebook"></i></a>
            </td>
            <td>
              <a href=""><i class="fab fa-youtube"></i></a>
            </td>
            <td>
              <a href=""><i class="fab fa-twitter"></i></a>
            </td>
            <td>
              <a href=""><i class="fab fa-tiktok"></i></a>
            </td>
          </tr>
        </table>
      </div>

      <div id="nav">
        <nav>
          <a href="">Tentang Kami</a>• <a href="">Blog</a>•
          <a href="">Karir</a>• <a href="">Kebijakan Privasi</a>•
          <a href="">Kebijakan Cookie</a>• <a href="">Panduan</a>•
          <a href="">Hubungi Kami</a>
        </nav>
      </div>

      <p>&copy; Copyright 2024</p>
    </footer>


</body>
</html>