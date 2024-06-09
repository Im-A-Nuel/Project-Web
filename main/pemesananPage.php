<?php

include "koneksi.php";

session_start();

if(!(isset($_SESSION['username'])) && !(isset($_SESSION['firstname']))){
    header("Location: login.php");
}

if(isset($_SESSION["idUser"])){
  $idUser = $_SESSION["idUser"];
}

if(isset($_GET["idKonser"])){
  $id = $_GET["idKonser"];
}else{
  header("Location: mainPage.php");
}


$sql1 = "SELECT idKonser, nama, gambar from konser WHERE idKonser = ".$id."";
$hasil = $connection->query($sql1);
while($new = $hasil->fetch_assoc()){
  $idKonser = $new['idKonser'];
  $nama = $new["nama"];
  $gambar = $new["gambar"];
}



  $sql = "SELECT t.idTiket, t.idKonser, tk.deskripsi, tk.harga, tk.stok
  FROM tiket t 
  INNER JOIN tiketkategori tk ON t.idTiketKategori = tk.idTiketKategori WHERE t.idKonser =".$id."";
  $result = $connection->query($sql);

  $paket_tiket = [];
  if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  $paket_tiket[] = $row;
  }
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemesanan</title>
    <link rel="stylesheet" href="..\src\style\style-pemesanan.css" />
    <script src="pemesanan.js"></script>
    <script src="paket.js"></script>
    <script src="login.js"></script>
    <link rel="icon" href="../src/img/logo-removebg-preview.png" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
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

    <div id="back">
      <nav>
        <br>
        <a href="mainPage.php">Beranda ></a>
        <a href="detailPage.php?idKonser=<?php echo $idKonser?>">Detail ></a>
        <a href="pemesananPage.php">Pemesanan</a>
      </nav>
    </div>



    
    <main>

    <center>
        <div id="gambar">
          <table>
            <tr>
              <td><img src="<?php echo $gambar ?>" alt="gambardewa" /></td>
              <!-- <td><img src="../src/img/DEWA-19pakai.png" alt="dewa" /></td> -->
            </tr>
          </table>
        </div>
      </center>



      <center>
      <div id="form">
<form action="prosesPemesanan.php" method="post" onsubmit="return validateForm()">
    <div id="detailPesan">
    <input type="hidden" name="idK" value="<?php echo $id; ?>">
              <table>
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td><h5>Detail Pemesanan Tiket</h5></td>
                      </tr>
                      <tr>
                        <td><p><?php echo $nama;?></p></td>
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
                              <label for="datanama" style="font-weight:bold;">Nama Lengkap</label>
                              <br>
                              <label for="datanama">masukkan nama sesuai data diri anda</label>
                              <br>
                              <input
                                type="text"
                                name="namaPesan"
                                id="datanama"
                                placeholder="masukkan nama anda"
                                required/>
                            </td>

                          
                            
                          
                          
                        </tr>
                        <tr>
                          
                          

                            <td>
                              <label for="notelpdata" style="font-weight:bold;">No Telp</label>
                              <br>
                              <label for="notelpdata">Nomor Telepon yang dapat dihubungi</label>
                              
                              <br />
                              <input
                                type="number"
                                name="nomerPesan"
                                id="notelpdata"
                                placeholder="masukkan nomor anda"
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
                              <label for="dataemailform" style="font-weight:bold;">E-Mail</label>
                              <br>
                              <label for="dataemailform">E-Mail konfirmasi</label>
                              <br />
                              <input
                                type="text"
                                name="e-mailPesan"
                                id="dataemailform"
                                placeholder="masukkan E-Mail anda"
                                required
                              />
                            </td>

                          
                          
                          
                        
                          
                        </tr>
                        <tr>
                          
                            <td>
                              <label for="dataNIK" style="font-weight:bold">NIK</label>
                              <br />
                              <label for="dataNIK">masukkan NIK sesuai KTP anda</label>
                              <br />
                              <input
                                type="number"
                                name="nikPesan"
                                id="dataNIK"
                                placeholder="masukkan NIK anda"
                                required
                              />
                            </td>
                         

                        </tr>
                        
                        <tr>
                          
                            <td>
                              <label for="datatanggal" style="font-weight:bold;">Tanggal Lahir</label>
                              <br />
                              <input type="date" name="tanggalLahirPesan" id="datatanggal" />
                            </td>
                         
                          
                        </tr>

                        <tr>
                        
                            <td>
                              <label for="kelamindata" style="font-weight:bold;">Jenis Kelamin</label>
                              <br />
                              <select name="kelamindata" id="kelamindata" required>
                                  <option value="">pilih</option>
                                  <option value="Laki-Laki">Laki-Laki</option>
                                  <option value="Perempuan">Perempuan</option>
                              </select>
                          
                          
                        </tr>
                      </tbody>
                    
                    </table>
                    <p>
                      Pastikan Data Diri Yang Anda Isi Sudah Sesuai
                    </p>

                  </td>
                </tr>
              </table>
            </div>



<div id="detailPesan1">
    <table>
        <tr>
            <td><h1>PILIH TIKET KONSER ANDA</h1></td>
            <td>
                <table>
                    <tr>
                        <td><h5>PAKET</h5></td>
                    </tr>

                    <?php foreach ($paket_tiket as $paket) : ?>
                        <tr>
                            <td><?php echo $paket['deskripsi']; ?> <input type="checkbox" name="paket[]" value="<?php echo $paket['idTiket']; ?>" class="paket" data-harga="<?php echo $paket['harga']; ?>" /></td>
                            <td>Rp.<?php echo number_format($paket['harga'], 0, ',', '.'); ?></td>
                            <td>Tersedia <?php echo $paket['stok']; ?></td>
                            <td>
                                <input type="number" step="1" min="0" max="<?php echo $paket['stok']; ?>" name="qty_<?php echo $paket['idTiket']; ?>" class="qty_paket" value="0" />
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </td>
        </tr>
    </table>
</div>
<div id="detailPesan2">
    <table>
        <tr>
            <td><b>Pembayaran</b></td>
            <td>
                <table>
                    <tr class="pesanan">
                        <td><input type="radio" name="bayar" value="E-Money" />E-Money</td>
                    </tr>
                    <tr class="pesanan">
                        <td><input type="radio" name="bayar" value="Debit" />Debit</td>
                    </tr>
                    <tr class="pesanan">
                        <td><input type="radio" name="bayar" value="Indomaret" />Indomaret</td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                <b>Harga Total</b>
                            </p>
                            <p id="totalHarga">Rp 0</p>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Simpan" id="tombolsimpan"/>
                <input type="reset" value="reset" onclick="resetForm()"/>
            </td>
        </tr>
    </table>
</div>
          </form>
          </div>
          </center>
    </main>

    <script>
function calculateTotal() {
    let total = 0;


    // tiket paket
    const paketCheckboxes = document.querySelectorAll('.paket');
    paketCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            const id = checkbox.value;
            const harga = parseInt(checkbox.dataset.harga);
            const qtyPaket = parseInt(document.querySelector(`input[name="qty_${id}"]`).value) || 0;
            total += harga * qtyPaket;
        }
    });

    document.getElementById('totalHarga').innerText = 'Rp ' + total.toLocaleString('id-ID');
}

// function resetForm() {
//     document.getElementById('totalHarga').innerText = 'Rp 0';
// }

document.querySelectorAll('input[type="checkbox"], input[type="number"]').forEach(input => {
    input.addEventListener('change', calculateTotal);
});


</script>

    
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
