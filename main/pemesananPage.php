<?php
  require 'koneksi.php';
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemesanan</title>
    <link rel="stylesheet" href="..\src\style\style-pemesanan.css" />

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
        <a href="detailPage.html">Detail</a>
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
                    <form id="form" action="#">
                        <td id="bt1"><input type="text" placeholder="Cari konser seru disini"></td>
                        <td id="bt2"><button type="submit">search</button></td>
                    </form>
                    <td id="bt3"><button>Register</button></td>
                    <td id="bt4"><button>Login</button></td>
                </tr>
            </tbody>
        </table>
    </div>


    </header>

    <main>
      <div id="back">
        <nav>
          <br>
          <a href="mainPage.html">Beranda ></a>
          <a href="detailPage.html">Detail ></a>
          <a href="pemesananPage.html">Pemesanan</a>
        </nav>
      </div>
      

      <center>
        <div id="gambar">
          <table>
            <tr>
              <td><img src="../src/img/dewa19baru1.png" alt="gambardewa" /></td>
              <td><img src="../src/img/DEWA-19pakai.png" alt="dewa" /></td>
            </tr>
          </table>
        </div>
      </center>

      <center>
        <div id="form">
          <form action="#popup1" method="get">
            <div id="detailPesan">
              <table>
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td><h5>Detail Pemesanan Tiket</h5></td>
                      </tr>
                      <tr>
                        <td><p>Tiket Dewa 19</p></td>
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
                              <select name="" id="kelamindata" required>
                                <option value="">pilih</option>
                                <option value="">Laki-Laki</option>
                                <option value="">perempuan</option>
                              </select>
                            </td>
                          
                          
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
                  <td>
                    <img
                      src="/src/img/tempatDuduk.jpeg"
                      alt=""
                    />
                  </td>

                  <td>
                    <h3>Pilih Tempat Duduk</h3>
                    <h2>Posisi beserta Harga</h2>


                    <table>
                      <tr>
                        <th>A</th>
                        <th>B</th>
                        <th>Cat1</th>
                        <th>Cat2</th>
                      </tr>

                      <tr>
                        <td>(Rp.50.000)</td>
                        <td>(Rp.40.000)</td>
                        <td>(Rp.30.000)</td>
                        <td>(Rp.20.000)</td>
                      </tr>

                      <tr>
                        <td><input type="radio" name="sama" id="" />A1</td>
                        <td><input type="radio" name="sama" id="" />B1</td>
                        <td><input type="radio" name="sama" id="" />Cat1A</td>
                        <td><input type="radio" name="sama" id="" />Cat2</td>
                      </tr>

                      <tr>
                        <td><input type="radio" name="sama" id="" />A2</td>
                        <td><input type="radio" name="sama" id="" />B2</td>
                        <td><input type="radio" name="sama" id="" />Cat1B</td>
                      </tr>
                    </table>
                  </td>
                </tr>




                <tr>
                  <td><h1>PILIH TIKET KONSER ANDA</h1></td>

                  <td>
                    <table>
                      <tr>
                        <td><h5>REGULER</h5></td>
                      </tr>
                      <tr>
                        <td>
                          1 Ticket/Rp.200.000<input type="checkbox" name="1" />
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="number" step="1" min="0" max="100" />
                        </td>
                      </tr>

                      <tr>
                        <td><h5>PAKET</h5></td>
                      </tr>
                      <tr>
                        <td>Bronze <input type="checkbox" name="2" /></td>
                        <td>Gold <input type="checkbox" name="3" /></td>
                        <td>VIP <input type="checkbox" name="4" /></td>
                        <td>VVIP <input type="checkbox" name="5" /></td>
                      </tr>

                      <tr>
                        <td>Rp.500.000/3</td>
                        <td>Rp.1000.000/5</td>
                        <td>Rp.1500.000/7</td>
                        <td>Rp.2.000.000/12</td>
                      </tr>

                      <tr>
                        <td>Tersedia 18</td>
                        <td>Tersedia 18</td>
                        <td>Tersedia 18</td>
                        <td>Tersedia 18</td>
                      </tr>

                      <tr>
                        <td>
                          <input type="number" step="1" min="0" max="100" />
                        </td>
                        <td>
                          <input type="number" step="1" min="0" max="100" />
                        </td>
                        <td>
                          <input type="number" step="1" min="0" max="100" />
                        </td>
                        <td>
                          <input type="number" step="1" min="0" max="100" />
                        </td>
                      </tr>
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
                          <td><input type="radio" name="bayar" id="" />E-Money</td>
                        </tr>
                        <tr class="pesanan">
                          <td><input type="radio" name="bayar" id="" />Debit</td>
                        </tr>
                        <tr class="pesanan">
                          <td><input type="radio" name="bayar" id="" />Indomaret</td>
                        </tr>
                        <tr>
                          <td>
                            <p>
                              <b>Harga Total</b>
                            </p>
                            <p>Rp 5.200.000</p>
                          </td>
                        </tr>
                      </table>
                      <input type="submit" value="kirim"/>
                      <input type="reset" value="reset" />


                    </td>
                  </tr>          
              </table>              
            </div>
            <!-- <button onclick="document.getElementById('notification').style.display = 'block';"></button> -->
          </form>
        </div>
        <div id="popup1" class="overlay">
          <div class="popup">
            <h2>BERHASIL!</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
              Pembelian Tiket Konser Telah Berhasil Dilakukan!
            </div>
          </div>
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
