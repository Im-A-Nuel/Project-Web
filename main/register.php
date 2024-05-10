<?php


include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $sql = "INSERT INTO user (firstname, lastname, username, password, email, telepon)
            VALUES ('$firstname', '$lastname', '$username', '$password', '$email', '$telepon')";

    if ($connection->query($sql) === TRUE) {
        echo "Pendaftaran berhasil !";
        header("Location: login.php");
    } else {
        echo "Pendaftaran gagal !";
    }

    $connection->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="..\src\style\style-login.css">
</head>
<body>
    <div class="">
      <h1>Register</h1>
      <?php if(isset($pesan)) { echo "<p class='error'>$pesan</p>";} ?>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="register-form" method="post">
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" required />

        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname" required />

        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />

        <label for="telepon">Telepon</label>
        <input type="text" id="telepon" name="telepon" required />

        <button type="submit">Simpan</button>

        <button type="button" onclick="window.location.href='login.php'">Batal</button>
      </form>

      <a href="login.php">Sudah punya akun ?</a>
    </div>
</body>
</html>
