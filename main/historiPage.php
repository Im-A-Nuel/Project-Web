<?php

include 'koneksi.php';

session_start();

if(!(isset($_SESSION['username'])) && !(isset($_SESSION['firstname']))){
    header("Location: login.php");
}
if(isset($_SESSION["idUser"])){
    $idUser = $_SESSION["idUser"];
  }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket-Konser</title>
    <link rel="icon" href="../src/img/logo-removebg-preview.png">
    <link rel="stylesheet" href="..\src\style\style-histori.css">
    <script src="delete.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <header>

        <div id="hyperlink">
            <a href="mainPage.php">Beranda</a>
            <a href="#">Tentang Tiket</a>
            <a href="historiPage.php">Histori Pemesanan</a>
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
                            echo '<td id="name">'.$_SESSION['firstname'].'</td>';
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
        

    </header>

    <main>

        <h2>Histori Pemesanan</h2>
    
        <center>


<a id="back" href="mainPage.php">
    <i class="fas fa-undo"></i> <span>Kembali</span>
  </a>

<?php
    $sql = "SELECT p.id, p.nama_lengkap, p.no_telp, p.email, p.pembayaran, p.total_harga, p.waktu_pembayaran, p.waktu_pembelian, p.status_pembayaran, p.jumlah, t.deskripsi, t.harga, k.nama 
    FROM pemesanan p INNER JOIN tiketkategori t ON p.idTiketKategori = t.idTiketKategori 
    INNER JOIN konser k ON t.idKonser = k.idKonser WHERE p.idUserOrder = '$idUser' ORDER BY p.waktu_pembelian DESC";
    
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $waktu_pembelian = new DateTime($row['waktu_pembelian']);
        // $waktu_pembayaran = new DateTime($row['waktu_pembayaran']);
        $waktu_pembayaran = $row['waktu_pembayaran'];
        ?>
    
    <div id="detailhistory">
    
            <table>
                <tr>
                    <th>STATUS: <?php echo $row['status_pembayaran']; ?> ||</th>
                    <th>WAKTU PEMESANAN: <?php echo $waktu_pembelian->format('H:i d M Y'); ?></th>
                </tr>
            </table>

            <tr>
                <td><p>Nama Lengkap : <?php echo $row['nama_lengkap']; ?></p></td>
                <td><p>No telp : <?php echo $row['no_telp']; ?></p></td>
                <td><p>email : <?php echo $row['email']; ?></p></td>
                <td><p>Nama Konser : <?php echo $row['nama']; ?></p></td>
            </tr>
            
            
           
            <table border="1">
                <tr>
                    <td><b>(jenis/paket) Tiket</b></td>
                    <td><b>jumlah Pesanan</b></td>
                    <td><b>harga satuan</b></td>
                </tr>    
                <tr>
                    <td><?php echo $row['deskripsi']; ?></td>
                    <td><?php echo $row['jumlah']; ?></td>
                    <td>Rp. <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                </tr>
            </table>
            
            <?php
                if($waktu_pembayaran != null){
                    ?>
                    <!-- <p>waktu Pembayaran: <?php //echo $waktu_pembayaran->format('H:i d M Y');?></p> -->
                    <p>waktu Pembayaran: <?php echo $waktu_pembayaran?></p>
            <?php   
                }else{ ?>
                    <p>waktu Pembayaran: - </p>
            <?php
                }
            ?>
        
            <p>Metode Pembayaran: <?php echo $row['pembayaran']; ?></p>
            <p>Total Pembayaran: Rp. <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></p>

            <div class="buttons">
                <button class="delete-button" onclick="confirmDelete(<?php echo $row['id']; ?>)">Batal</button>

                <?php

                if($row['status_pembayaran'] == "Sudah Bayar"){?>
                    <form action="cetak.php" method="post">
                        <input type="hidden" name="idOrder" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="bayar-button">Cetak</button>
                    </form>
                
                <?php    
                }else{
                ?>
                    <form action="updatePage.php" method="post">
                        <input type="hidden" name="idOrder" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="edit-button">Edit</button>
                    </form>

                    <form action="bayar.php" method="post">
                        <input type="hidden" name="idOrder" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="bayar-button">Bayar</button>
                    </form>
                <?php
                }

                ?>

            </div>
                    
        </div>

        </body>
        </html>
        <?php
    }
} else {
    echo "<h2> No records found. </h2>";
}

?>
    
    
    </center>

        

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
