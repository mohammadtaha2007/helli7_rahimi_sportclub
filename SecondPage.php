    <!-- database connect and players Id  -->
    <?php

        include 'db_connect.php';


        $player_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        
        $sql = "SELECT * FROM players WHERE id = $player_id";
        $result = $conn->query($sql);

        $player = null;
        if ($result->num_rows > 0) {
            $player = $result->fetch_assoc();
        } else {
            
            header("Location: MainPage.php");
            exit();
        }
    ?>
    <!-- end database connect and players Id  -->
    
    <!-- including header -->
    <?php
        include 'including/header.php'; 
    ?>
    <!-- end including header -->

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav class="breadcrumb">
                <a href="MainPage.php">Home</a> >
                <a href="#">Players</a> >
                <span><?php echo $player['name']; ?></span>
            </nav>
        </div>
    </section>
    <!-- End Breadcrumb -->

    <!-- Product Main Section -->
    <section class="product-main-section">
        <div class="container t-flex">
            <!-- Player Info -->
            <div class="product-info">
                <h1 class="product-title"><?php echo $player['name']; ?></h1>
                <p class="product-desc"><?php echo $player['description']; ?></p>
                <div class="product-actions">
                    <a href="MainPage.php" class="add-to-cart-btn">Back to Home</a>
                </div>
            </div>
            <!-- Player Images -->
            <div class="product-images">
                <div class="main-image">
                    <img src="<?php echo $player['image']; ?>" alt="<?php echo $player['name']; ?>" id="mainImage">
                </div>
                <div class="thumbnail-images">
                    <img src="<?php echo $player['image']; ?>" alt="<?php echo $player['name']; ?>" class="thumbnail active" onclick="changeImage('<?php echo $player['image']; ?>')">
                    <img src="<?php echo $player['image2']; ?>" alt="<?php echo $player['name']; ?> 2" class="thumbnail" onclick="changeImage('<?php echo $player['image2']; ?>')">
                    <img src="<?php echo $player['image3']; ?>" alt="<?php echo $player['name']; ?> 3" class="thumbnail" onclick="changeImage('<?php echo $player['image3']; ?>')">
                    <img src="<?php echo $player['image4']; ?>" alt="<?php echo $player['name']; ?> 4" class="thumbnail" onclick="changeImage('<?php echo $player['image4']; ?>')">
                    <img src="<?php echo $player['image5']; ?>" alt="<?php echo $player['name']; ?> 5" class="thumbnail" onclick="changeImage('<?php echo $player['image5']; ?>')">
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Main Section -->

    <!-- Player Details Section -->
    <section class="product-details-section">
        <div class="container">
            <div class="tabs">
                <button class="tab active">Description</button>
            </div>
            <div class="tab-content">
                <p><?php echo $player['description']; ?></p>
                <ul>
                    <li><strong>Nickname:</strong> <?php echo $player['noun']; ?></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Player Details Section -->

    <!-- Related Players Section -->
    <section class="related-products-section">
        <div class="container">
            <div class="related-products-header">
                <h2 class="related-products-title">Related Players</h2>
                <a href="MainPage.php" class="view-all-btn">View All <span class="arrow">→</span></a>
            </div>
            <div class="related-products-grid">
                <?php
                // گرفتن 4 بازیکن دیگر به عنوان بازیکنان مرتبط (به جز بازیکن فعلی)
                $sql = "SELECT * FROM players WHERE id != $player_id LIMIT 4";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="related-product-card">
                            <div class="related-product-image">
                                <img src="' . $row['image'] . '" alt="' . $row['name'] . '">
                                <div class="related-product-actions">
                                    <button class="action-btn"><span>❤️</span></button>
                                    <button class="action-btn"><img src="images/share.png" alt=""></button>
                                </div>
                                <a href="SecondPage.php?id=' . $row['id'] . '">
                                    <button class="add-to-cart">VIEW DETAILS</button>
                                </a>
                            </div>
                            <div class="related-product-info">
                                <h3 class="related-product-name">' . $row['name'] . '</h3>
                                <span class="related-product-price">' . $row['noun'] . '</span>
                            </div>
                        </div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- End Related Players Section -->

    <!-- including footer -->
    <?php
        include 'including/footer.php'; 
    ?>
    <!-- end including footer -->