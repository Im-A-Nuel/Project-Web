<?php

include 'koneksi.php';

session_start();

if(!(isset($_SESSION['username'])) && !(isset($_SESSION['firstname']))){
    header("Location: login.php");
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

    
<center>
    
    <h1>Histori Pemesanan</h1>
    
        <br>
        <br>
        <br>
    <a href="mainPage.php">Kembali ke halaman utama </a>
    
    
    <div id="detailhistory">
    
    <table>
        <tr>
            <th>STATUS: SUDAH BAYAR ||</th>
            <th>WAKTU PEMESANAN: 9.30 29 juni 2024</th>
        </tr>
    </table>
    
    <p>User Account: Imanuel</p>
    <p>Nama Lengkap: Imanuel putra faot</p>
    <p>No telp: 12312312312</p>
    <p>email: imanuel@gmail.com</p>
            
        
    <table>
    <tr>
        <td><b>(jenis/paket) Tiket</b></td>
        <td><b>jumlah Pesanan</b></td>
        <td><b>harga satuan</b></td>
    </tr>    
    <tr>
        <td>reguler</td>
        <td>2</td>
        <td>20.000</td>
    </tr>
    
    <tr>
        <td>VIP</td>
        <td>3</td>
        <td>30.000</td>
    </tr>
    <tr>
        <td>VVIP</td>
        <td>5</td>
        <td>20.000</td>
    </tr>
    <tr>
        <td>GOLD</td>
        <td>10</td>
        <td>50.000</td>
    </tr>
    
    </table>
    
    
    <p>waktu Pembayaran: 10.30 29 juni 2024</p>
    <p>metode Pembayaran: Gopay</p>
    <p>Total Pembayaran: Rp. 1.000.000</p>
            
    </div>
    
    
    
    
    <div id="detailhistory">
    
    <table>
        <tr>
            <th>STATUS: SUDAH BAYAR ||</th>
            <th>WAKTU PEMESANAN: 9.30 29 juni 2024</th>
        </tr>
    </table>
    
    <p>User Account: Imanuel</p>
    <p>Nama Lengkap: Imanuel putra faot</p>
    <p>No telp: 12312312312</p>
    <p>email: imanuel@gmail.com</p>
            
        
    <table>
    <tr>
        <td><b>(jenis/paket) Tiket</b></td>
        <td><b>jumlah Pesanan</b></td>
        <td><b>harga satuan</b></td>
    </tr>    
    <tr>
        <td>reguler</td>
        <td>2</td>
        <td>20.000</td>
    </tr>
    
    <tr>
        <td>VIP</td>
        <td>3</td>
        <td>30.000</td>
    </tr>
    <tr>
        <td>VVIP</td>
        <td>5</td>
        <td>20.000</td>
    </tr>
    <tr>
        <td>GOLD</td>
        <td>10</td>
        <td>50.000</td>
    </tr>
    
    </table>
    
    
    <p>waktu Pembayaran: 10.30 29 juni 2024</p>
    <p>metode Pembayaran: Gopay</p>
    <p>Total Pembayaran: Rp. 1.000.000</p>
            
    </div>
    
    
    
    
    
    
    <div id="detailhistory">
    
    <table>
        <tr>
            <th>STATUS: SUDAH BAYAR ||</th>
            <th>WAKTU PEMESANAN: 9.30 29 juni 2024</th>
        </tr>
    </table>
    
    <p>User Account: Imanuel</p>
    <p>Nama Lengkap: Imanuel putra faot</p>
    <p>No telp: 12312312312</p>
    <p>email: imanuel@gmail.com</p>
            
        
    <table>
    <tr>
        <td><b>(jenis/paket) Tiket</b></td>
        <td><b>jumlah Pesanan</b></td>
        <td><b>harga satuan</b></td>
    </tr>    
    <tr>
        <td>reguler</td>
        <td>2</td>
        <td>20.000</td>
    </tr>
    
    <tr>
        <td>VIP</td>
        <td>3</td>
        <td>30.000</td>
    </tr>
    <tr>
        <td>VVIP</td>
        <td>5</td>
        <td>20.000</td>
    </tr>
    <tr>
        <td>GOLD</td>
        <td>10</td>
        <td>50.000</td>
    </tr>
    
    </table>
    
    
    <p>waktu Pembayaran: 10.30 29 juni 2024</p>
    <p>metode Pembayaran: Gopay</p>
    <p>Total Pembayaran: Rp. 1.000.000</p>
            
    </div>
    
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
