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
                            echo '<td id="name">'.$_SESSION['firstname'].'</td>';
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
        

    </header>

    <main>

        <h2>Hasil Pencarian....</h2>

<?php

if(isset($_GET["search"])){
    $query = $_GET["search"];

    $sql = $connection->prepare("SELECT k.idKonser, k.nama, DATE_FORMAT(k.tanggal, '%d %M %Y') as tanggal, k.tempat, k.gambar, CONCAT('Rp. ', FORMAT(t.harga, 0)) as harga 
    FROM konser k 
    INNER JOIN tiket t ON k.idKonser = t.idKonser 
    INNER JOIN band b ON k.idBand = b.idBand 
    INNER JOIN genre g ON b.idGenre = g.idGenre
    WHERE k.nama LIKE ? OR k.tempat LIKE ? OR k.tanggal LIKE ?");

    $likeQuery = "%" . $query . "%";
    $sql->bind_param("sss", $likeQuery, $likeQuery, $likeQuery);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        echo "<table>";
        $counter = 0;
        while($row = $result->fetch_assoc()) {
            if ($counter % 4 == 0) {
                if ($counter != 0) {
                    echo "</tr>";
                }
                echo "<tr>";
            }
            echo "<td>";
            echo "<a href='detailPage.php?idKonser=" . $row['idKonser'] . "'>";
            echo "<div class='container'>";
            echo "<img id='gambar' src='" . $row['gambar'] . "' alt=''>";
            echo "<h3>" . $row['nama'] . "</h3>";
            echo "<p>" . $row['tanggal'] . "</p>";
            echo "<p>" . $row['tempat'] . "</p>";
            echo "<hr id='line2'>";
            echo "<h4>" . $row['harga'] . "</h4>";
            echo "</div>";
            echo "</a>";
            echo "</td>";
            $counter++;
    
            if ($counter % 4 == 0) {
                echo "</tr>";
            }
        }
        if ($counter % 4 != 0) {
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 hasil";
    }
}else if(!isset($_GET["search"])){
    $query = "";
    header("Location: mainPage.php");
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
                            echo '<td id="name">'.$_SESSION['firstname'].'</td>';
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
        

    </header>

    <main>

        <h2>Hasil Pencarian....</h2>

<?php

if(isset($_GET["search"])){
    $query = $_GET["search"];

    $sql = $connection->prepare("SELECT k.idKonser, k.nama, DATE_FORMAT(k.tanggal, '%d %M %Y') as tanggal, k.tempat, k.gambar, CONCAT('Rp. ', FORMAT(k.hargaReguler, 0)) as harga 
    FROM konser k 
    INNER JOIN band b ON k.idBand = b.idBand 
    INNER JOIN genre g ON b.idGenre = g.idGenre
    WHERE k.nama LIKE ? OR k.tempat LIKE ? OR k.tanggal LIKE ?");

    $likeQuery = "%" . $query . "%";
    $sql->bind_param("sss", $likeQuery, $likeQuery, $likeQuery);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        echo "<table>";
        $counter = 0;
        while($row = $result->fetch_assoc()) {
            if ($counter % 4 == 0) {
                if ($counter != 0) {
                    echo "</tr>";
                }
                echo "<tr>";
            }
            echo "<td>";
            echo "<a href='detailPage.php?idKonser=" . $row['idKonser'] . "'>";
            echo "<div class='container'>";
            echo "<img id='gambar' src='" . $row['gambar'] . "' alt=''>";
            echo "<h3>" . $row['nama'] . "</h3>";
            echo "<p>" . $row['tanggal'] . "</p>";
            echo "<p>" . $row['tempat'] . "</p>";
            echo "<hr id='line2'>";
            echo "<h4>" . $row['harga'] . "</h4>";
            echo "</div>";
            echo "</a>";
            echo "</td>";
            $counter++;
    
            if ($counter % 4 == 0) {
                echo "</tr>";
            }
        }
        if ($counter % 4 != 0) {
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 hasil";
    }
}else if(!isset($_GET["search"])){
    $query = "";
    header("Location: mainPage.php");
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
