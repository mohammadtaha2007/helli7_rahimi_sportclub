<!-- session start condition -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- end session start condition -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iconic Team Template</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header Part -->
    <header class="main-header">
        <div class="top-row">
            <div class="container t-flex">
                <p>This Site Is About All Time Football Iconic Team </p>

                <ul class="c-flex">
                    <li> <a href="index.php" class="eng">ENG</a> </li>
                    <div>|</div>
                    <li> <a href="MainPageFa.php" class="fa">FA</a> </li>
                    <div>|</div>
                    <li class="enjoy"> Enjoy This Team </li>
                </ul>
            </div>

            <a href="login.php" class="welcome-message">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "Welcome " . htmlspecialchars($_SESSION['username']);
                } else {
                    echo "Login First Please";
                }
                ?>
            </a>
        </div>

        <hr>

        <div class="mid-row">
            <div class="container t-flex">
                <div class="t-flex">
                    <img class="search-logo" src="images/Search.png" alt="">
                    <input type="search" placeholder="Search About Your Iconic Player..." class="serach-box">
                </div>

                <div class="t-flex">
                    <a href="index.php"><img class="site-logo" src="images/sitelogo.png" alt=""></a>
                </div>

                <div>
                    <div class="t-flex">
                        <div class="sign-in">
                            <?php if (isset($_SESSION['username'])) { ?>
                                <a href="logout.php">Logout</a>
                            <?php } else { ?>
                                <a href="login.php">Login</a>
                            <?php } ?>
                        </div>
                        <div>|</div>
                        <img src="images/shoppingbasket.png" class="shop-basket" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-row">
            <div class="container t-flex">
                <ul class="t-flex nav-bar">
                    <li class="nav">
                        <a href="SecondPage.php">Browse Categories</a>
                    </li>

                    <li class="nav">
                        <a href="SecondPage.php">Products</a>
                    </li>

                    <li class="nav">
                        <a href="SecondPage.php">Blog</a>
                    </li>

                    <li class="nav">
                        <a href="SecondPage.php">Contact</a>
                    </li>
                </ul>

                <div class="t-flex nav">
                    <a href="">Customer Cure : +989370307618</a>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Part -->