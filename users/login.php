```php
<?php
session_start();
require '../functions.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {

            // membuat session login
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            $_SESSION["role"] = $row["role"];

            // cek role
            if ($row["role"] == "admin") {
                header("Location: ../index.php");
            } else {
                header("Location: ../user/user.php");
            }

            exit;
        }

        if ($row["role"] == "admin") {
            header("Location: ../index.php");
        } else {
            header("Location: ../user/user.php");
        }
    }


    $error = true;
}
?>

<link rel="stylesheet" href="../style.css">

<div class="auth-container">
    <div class="auth-card">
        <h2>🔐 LOGIN</h2>

        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>

        <?php if(isset($error)) : ?>
            <p style="color:red;">Username / Password salah</p>
        <?php endif; ?>

        <p>Belum punya akun? <a href="register.php">Register</a></p>
    </div>
</div>
```
