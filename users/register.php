```php
<?php
require '../functions.php';

if (isset($_POST["register"])) {

    $username = strtolower(stripslashes($_POST["username"]));
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);

    // role otomatis user
    $role = "user";

    if ($password !== $password2) {
        echo "<script>alert('password tidak sama!');</script>";
        return;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password', '$role')");

    echo "<script>alert('berhasil daftar!');</script>";
}
?>

<link rel="stylesheet" href="../style.css">

<div class="auth-container">
    <div class="auth-card">
        <h2>📝 REGISTER</h2>

        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="password2" placeholder="Konfirmasi Password" required><br>
            <button type="submit" name="register">Register</button>
        </form>

        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</div>
```
