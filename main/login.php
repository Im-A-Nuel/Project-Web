<?php
require "koneksi.php";
session_start();

$pesan = "";

if(!(isset($_SESSION['username'])) && !(isset($_SESSION['firstname']))){
    
}else{
    header("Location: mainPage.php");
}

if(isset($_POST["username"]) && isset($_POST["password"])){

    $username = $_POST["username"];
    $pass = $_POST["password"];
    $query = "SELECT * FROM user WHERE username = '$username' and password = '$pass'";
    $result = $connection->query($query);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION["idUser"] = $row["idUser"];
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["firstname"] = $row["firstname"];
    
        header("Location: mainPage.php");
    }else{
        $pesan =  "Username & password salah";
    }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Page</title>
    <link rel="stylesheet" href="..\src\style\style-login.css">
</head>
<body>
    <div class="container">
      <h1>Login</h1>
      <?php if(isset($pesan)) { echo "<p class='error'>$pesan</p>";} ?>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="login-form" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />

        <button type="submit">Login</button>
      </form>

      <a href="register.php">Belum punya akun ?</a>
    </div>
  </body>
</html>