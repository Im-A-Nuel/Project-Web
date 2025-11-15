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
    <link rel="stylesheet" href="..\src\style\style-main.css">
    <script src="login.js"></script>
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
                        if (!(isset($_SESSION['username'])) && !(isset($_SESSION['firstname']))) {
                            echo '<td id="bt3"><a href="register.php"><button>Register</button></a></td>';
                            echo '<td id="bt4"><a href="login.php"><button>Login</button></a></td>';
                        } else {
                            echo '<td id="bt5"><a href="logout.php"><button>Logout</button></a></td>';
                            echo '<td id="name">' . $_SESSION['firstname'] . '</td>';
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>


    </header>

    <main>

        <h2>Daftar Tiket-Konser</h2>

        <?php

        $sql = "SELECT g.nama as genre, k.idKonser ,k.nama, DATE_FORMAT(k.tanggal, '%d %M %Y') as tanggal, k.tempat, k.gambar, k.hargaReguler as harga 
FROM konser k 
INNER JOIN band b ON k.idBand = b.idBand 
INNER JOIN genre g ON b.idGenre = g.idGenre";

        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            $current_genre = "";
            echo "<table>";
            $concert_counter = 0;
            while ($row = $result->fetch_assoc()) {

                if ($current_genre != $row['genre']) {
                    if ($current_genre != "") {

                        while ($concert_counter % 4 != 0) {
                            echo "<td></td>";
                            $concert_counter++;
                        }
                        echo "</tr>";
                    }

                    echo "<tr>";
                    echo "<td> <h3 id='gen'>" . $row['genre'] . "</h3></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td colspan='4'><hr id='line1'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    $current_genre = $row['genre'];
                    $concert_counter = 0;
                }

                echo "<td>";
                echo "<a href='detailPage.php?idKonser=" . $row['idKonser'] . "'>";
                echo "<div class='container'>";
                echo "<img id='gambar' src='" . $row['gambar'] . "' alt=''>";
                echo "<h3>" . $row['nama'] . "</h3>";
                echo "<p>" . $row['tanggal'] . "</p>";
                echo "<p>" . $row['tempat'] . "</p>";
                echo "<hr id='line2'>";
                echo "<h4>Rp. " . number_format($row['harga'], 0, ',', '.') . "</h4>";
                echo "</div>";
                echo "</a>";
                echo "</td>";
                $concert_counter++;

                if ($concert_counter % 4 == 0) {
                    echo "</tr><tr>";
                }
            }

            while ($concert_counter % 4 != 0) {
                echo "<td></td>";
                $concert_counter++;
            }
            echo "</tr>";
            echo "</table>";
        } else {
            echo "0 hasil";
        }

        $connection->close();

        ?>


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