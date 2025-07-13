<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // جلوگیری از SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // کوئری برای بررسی کاربر
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // بررسی رمز عبور
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: MainPageFa.php");
            exit();
        } else {
            $error = "رمز غلط است";
        }
    } else {
        $error = "نام کاربری پیدا نشد";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به سایت</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'including/headerFa.php'; ?>

    <section class="login-section">
        <div class="container">
            <div class="login-box">
                <h2 class="login-title">ورود به سایت</h2>
                <?php if (isset($error)) { ?>
                    <p class="error-message"><?php echo $error; ?></p>
                <?php } ?>
                <form method="POST" class="login-form">
                    <div class="form-group">
                        <label for="username">نام کاربری :</label>
                        <input type="text" id="username" name="username" class="login-input" placeholder="لطفا نام کاربری خود را وارد کنید" required>
                    </div>
                    <div class="form-group">
                        <label for="password">رمز :</label>
                        <input type="password" id="password" name="password" class="login-input" placeholder="لطفا رمز خود را وارد کنید" required>
                    </div>
                    <button type="submit" class="login-submit">ورود</button>
                </form>
                <p class="signup-link">اکانت ندارید؟ <a href="signupFa.php">اینجا ثبت نام کنید </a></p>
            </div>
        </div>
    </section>

    <?php include 'including/footerFa.php'; ?>
</body>
</html>