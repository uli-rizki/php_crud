<?php 
session_start();
include 'config.php';

if (isset($_SESSION['username'])) {
    header("Location : index.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
    $hasil = $koneksi->query($sql);

    if ($hasil->num_rows > 0) {
        $row = $hasil->fetch_object();
        $_SESSION['username'] = $row->username;
        header("Location: index.php");
    } else {
        echo "username dan password salah";
    }
}
?>

<html>
    <head>
        <title>LOGIN</title>
    </head>
    <body>
        <fieldset>
        <legend>Login:</legend>
        <form method="POST" action="login.php">
            <label>Username</label>
            <input type="text" name="username" required>
            <br />
            <label>Password</label>
            <input type="text" name="password" required>
            <br />
            <input type="submit" name="submit" value="Login">
        </form>
        </fieldset>
    </body>
</html>