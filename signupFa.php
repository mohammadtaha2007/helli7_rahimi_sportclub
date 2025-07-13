<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // جلوگیری از SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // رمزنگاری رمز عبور

    // بررسی وجود نام کاربری
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $error = "این نام کاربری قبلا برداشته شده است";
    } else {
        // افزودن کاربر به دیتابیس
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['username'] = $username;
            header("Location: MainPage.php");
            exit();
        } else {
            $error = "شکست در ثبت نام: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام در سایت</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'including/headerFa.php'; ?>

    <section class="login-section">
        <div class="container">
            <div class="login-box">
                <h2 class="login-title">ثبت نام</h2>
                <?php if (isset($error)) { ?>
                    <p class="error-message"><?php echo $error; ?></p>
                <?php } ?>
                <form method="POST" class="login-form">
                    <div class="form-group">
                        <label for="username">نام کاربری :</label>
                        <input type="text" id="username" name="username" class="login-input" placeholder="لطفا نام کاربری را وارد کنید" required>
                    </div>
                    <div class="form-group">
                        <label for="password">رمز :</label>
                        <input type="password" id="password" name="password" class="login-input" placeholder="لطفا رمز خود را وارد کنید" required>
                    </div>
                    <button type="submit" class="login-submit">ثبت نام</button>
                </form>
                <p class="signup-link">حساب دارید؟ <a href="loginFa.php">اینجا وارد شوید </a></p>
            </div>
        </div>
    </section>

    <?php include 'including/footerFa.php'; ?>
</body>
</html>