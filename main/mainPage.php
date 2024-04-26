<?php

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
    <link rel="stylesheet" href="..\src\style\style-main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <header>

        <div id="hyperlink">
            <a href="#">Beranda</a>
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
                        <form id="form" action="#">
                            <td id="bt1"><input type="text" placeholder="Cari konser seru disini"></td>
                            <td id="bt2"><button type="submit">search</button></td>
                        </form>
                        <td id="bt3"><button>Register</button></td>
                        <td id="bt4" ><button><a href="logout.php">Logout</a></button></td>
                    </tr>
                </tbody>
            </table>
        </div>


    </header>

    <main>

        <h2>Daftar Tiket-Konser</h2>

        <table id="list">
            <tbody>
                <tr>
                    <td>
                        <h3 id="gen">Pop-Rock</h3>
                    </td>
                <tr>
                    <td colspan="4">
                        <hr id="line1">
                    </td>
                </tr>
                </tr>
                <tr id="row1">
                    <td>
                        <a href="">
                            <div class="container">
                                <img id="gambar" src="../src/img/DewaPic.jpg" alt="">
                                <h3>Konser Dewa19</h3>
                                <p>19 Agustus 2023</p>
                                <p>Bandung</p>
                                <hr id="line2">
                                <h4>Rp.1.000.000</h4>
                            </div>
                        </a>
                    </td>

                    <td>
                        <a href="">
                            <div class="container">
                                <img id="gambar" src="../src/img/KonserNoah.jpeg" alt="">
                                <h3>Konser Noah</h3>
                                <p>17 Mei 2024</p>
                                <p>Jakarta</p>
                                <hr id="line2">
                                <h4>Rp.2.000.000</h4>
                            </div>
                        </a>

                    </td>

                    <td>
                        <a href="">
                            <div class="container">
                                <img id="gambar" src="../src/img/KonserAV7X.jpeg" alt="">
                                <h3>Konser Avenged Sevenfold</h3>
                                <p>25 Mei 2024</p>
                                <p>Indonesia Madya Stadium, Jakarta</p>
                                <hr id="line2">
                                <h4>Rp 1.600.000 - Rp 2.600.000</h4>
                            </div>
                        </a>

                    </td>

                    <td>
                        <a href="">
                            <div class="container">
                                <img id="gambar" src="../src/img/KonserTulus.jpeg" alt="">
                                <h3>Konser Tulus</h3>
                                <p>15 Juni 2024</p>
                                <p>Yogyakarta</p>
                                <hr id="line2">
                                <h4>Rp.1.000.000</h4>
                            </div>
                        </a>
                    </td>

                </tr>

                <tr>
                <tr>
                    <td>
                        <h3 id="gen">Festival Musik</h3>
                    </td>
                <tr>
                    <td colspan="4">
                        <hr id="line1">
                    </td>
                </tr>
                </tr>

                <td>
                    <a href="">
                        <div class="container">
                            <img id="gambar" src="../src/img/FesKonserXdin.jpg" alt="">
                            <h3>XDINARY HEROES: Break the Brake World Tour </h3>
                            <p>16 Desember 2024</p>
                            <p>The Kasablanka Hall, Jakarta</p>
                            <hr id="line2">
                            <h4>Rp 1.100.000 - Rp2.800.000
                            </h4>
                        </div>
                    </a>
                </td>

                <td>
                    <a href="">
                        <div class="container">
                            <img id="gambar" src="../src/img/FesKonserTVXQ.jpg" alt="">
                            <h3>Konser TVXQ! br Asia <br> Tour 2024</h3>
                            <p>20 April 2024</p>
                            <p>Hall 5 ICE BSD</p>
                            <hr id="line2">
                            <h4>Rp 900.000 - Rp 2.950.000</h4>
                        </div>
                    </a>

                </td>

                <td>
                    <a href="">
                        <div class="container">
                            <img id="gambar" src="../src/img/FesKonserTikum.jpg" alt="">
                            <h3>Konser Titik Kumpul <br> Fest 2024</h3>
                            <p>27 - 28 April 2024</p>
                            <p>Stadion Madya GBK, Jakarta</p>
                            <hr id="line2">
                            <h4>Rp 149.000 - Rp 169.000</h4>
                        </div>
                    </a>

                </td>

                <td>
                    <a href="">
                        <div class="container">
                            <img id="gambar" src="../src/img/FesLala.jpg" alt="">
                            <h3>LaLaLa <br> Fest 2024</h3>
                            <p>23-25 Agustus 2024</p>
                            <p>Jakarta International Expo (JIEXPO)</p>
                            <hr id="line2">
                            <h4>Rp 1.300.000 - Rp 2.400.000</h4>
                        </div>
                    </a>
                </td>

                </tr>

                <tr>
                <tr>
                    <td>
                        <h3 id="gen">Jazz</h3>
                    </td>
                <tr>
                    <td colspan="2">
                        <hr id="line1">
                    </td>
                </tr>
                </tr>
                <td>
                    <a href="">
                        <div class="container">
                            <img id="gambar" src="../src/img/KonserPrambananJazz.jpg" alt="">
                            <h3>Prambanan Jazz 2024</h3>
                            <p>5,6,7 Juli 2024</p>
                            <p>Yogyakarta</p>
                            <hr id="line2">
                            <h4>Rp 250.000 - Rp 1.000.000</h4>
                        </div>
                    </a>
                </td>

                <td>
                    <a href="">
                        <div class="container">
                            <img id="gambar" src="../src/img/KonserJavaJazz.jpg" alt="">
                            <h3>Java Jazz Festival (JJF) 2024</h3>
                            <p>24-26 Mei 2024</p>
                            <p>JIEXpo Kemayoran, Jakarta</p>
                            <hr id="line2">
                            <h4>Rp 500.000 - Rp 1.500.000</h4>
                        </div>
                    </a>

                </td>

                </tr>
            </tbody>
        </table>

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
