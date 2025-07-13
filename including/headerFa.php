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
    <title>تیم بازیکان نمادین</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header Part -->
    <header class="main-header">
        <div class="top-row">
            <div class="container t-flex">
                <p>این سایت درباره بازیکنان نمادین در طول تاریخ است </p>

                <ul class="c-flex">
                    <li> <a href="MainPage.php" class="eng">انگلیسی</a> </li> 
                    <div>|</div>
                    <li> <a href="MainPageFa.php" class="fa">فارسی</a> </li>
                    <div>|</div>
                    <li class="enjoy"> از این تیم لذت ببرید </li>
                </ul> 
            </div>

            <div class="welcome-message">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "خوش آمدید " . htmlspecialchars($_SESSION['username']);
                } else {
                    echo "ابتدا وارد شوید";
                }
                ?>
            </div>
        </div>

        <hr>

        <div class="mid-row">
            <div class="container t-flex">
            <div class="t-flex">
                <img class="search-logo" src="images/Search.png" alt="">
                <input type="search" placeholder="جستوجو درباره بازیکنان نمادین" class="serach-box">
            </div>

            <div class="t-flex">
                <a href="MainPage.php"><img class="site-logo" src="images/sitelogo.png" alt=""></a>
            </div>

            <div>
                <div class="t-flex">
                    <div class="sign-in">
                        <?php if (isset($_SESSION['username'])) { ?>
                            <a href="logoutFa.php">خروج</a>
                        <?php } else { ?>
                            <a href="loginFa.php">ورود</a>
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
                        <a href="SecondPage.php">جستوجو در دسته بندی</a>                    
                    </li>

                    <li class="nav">
                        <a href="SecondPage.php">محصولات</a>
                    </li>

                    <li class="nav">
                        <a href="SecondPage.php">بلاگ</a>
                    </li>

                    <li class="nav">
                        <a href="SecondPage.php">ارتباط</a>
                    </li>
                </ul>

                <div class="t-flex nav">
                    <a href="">پشتیبانی : 989370307618</a>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Part -->