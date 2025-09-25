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
            header("Location: index.php");
            exit();
        } else {
            $error = "Password Is Wrong!";
        }
    } else {
        $error = "No Username Found!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login To Website</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'including/header.php'; ?>

    <section class="login-section">
        <div class="container">
            <div class="login-box">
                <h2 class="login-title">Login To Website</h2>
                <?php if (isset($error)) { ?>
                    <p class="error-message"><?php echo $error; ?></p>
                <?php } ?>
                <form method="POST" class="login-form">
                    <div class="form-group">
                        <label for="username">UserName :</label>
                        <input type="text" id="username" name="username" class="login-input"
                            placeholder="Please Enter Your UserName" required>
                    </div>
                    <div class="form-group">
                        <label for="password">PassWord :</label>
                        <input type="password" id="password" name="password" class="login-input"
                            placeholder="Please Enter Your PassWord" required>
                    </div>
                    <button type="submit" class="login-submit">Login</button>
                </form>
                <p class="signup-link">No Account? <a href="signup.php">Sign Up Here </a></p>
            </div>
        </div>
    </section>

    <?php include 'including/footer.php'; ?>
</body>

</html>