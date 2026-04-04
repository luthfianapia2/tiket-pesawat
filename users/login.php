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
            $_SESSION["login"] = true;

            header("Location: ../user/user.php");
            exit;
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
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit" name="login">Login</button>
        </form>

        <?php if(isset($error)) : ?>
            <p style="color:red;">Username / Password salah</p>
        <?php endif; ?>

        <p>Belum punya akun? <a href="register.php">Register</a></p>
    </div>
</div>

<?php if(isset($error)) : ?>
<p style="color:red;">username / password salah</p>
<?php endif; ?>