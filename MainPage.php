    <?php
        include 'db_connect.php'; 
    ?>
    
    <?php
        include 'including/header.php'; 
    ?>

    <!-- Main Section -->
    <section class="main-slider">
        <section class="container t-flex">
            <div>
                <h1 class="slider-text">All Iconic Players</h1>

                <p class="slider-p">these football players are the best at old time
                    and they become famous because their hard working
                    and the trophy they won.
                </p>

                <button class="slider-info">More Info</button>
            </div>

            <div>
                <img src="images/nazario.png" alt="Ronaldo Nazario" class="slider-img">
                <img src="images/ronaldinho.png" alt="Ronaldinho" class="slider-img">
            </div>
        </section>
    </section>
    <!-- End Main Section -->

    <!-- Iconic Teams -->
    <section class="brand-section">
        <div class="container">
            <h2 class="brand-title">( Iconic Teams )</h2>
            <div class="brand-logos">
                <img src="images/rma.png" alt="Real Madrid Logo" class="brand-logo">
                <img src="images/fcb.png" alt="Barcelona Logo" class="brand-logo">
                <img src="images/mu.png" alt="Manchester United Logo" class="brand-logo">
                <img src="images/che.png" alt="Chelsea Logo" class="brand-logo">
                <img src="images/bm.png" alt="Bayern Munchen Logo" class="brand-logo">
                <img src="images/mil.png" alt="Milan Logo" class="brand-logo">
            </div>
        </div>
    </section>
    <!-- End Iconic Teams -->

    <!-- Promo Section -->
    <section class="promo-section">
        <div class="container">
            <div class="promo-cards">
                <!-- Left Cart-->
                <div class="promo-card promo-card-left">
                    <div class="promo-text">
                        <span class="promo-label">ICON PLAYERS!!</span>
                        <h2 class="promo-title">WHO IS ICON PLAYER??</h2>
                        <p class="promo-desc">The Player Who Is The Best On His Generation Is ICON.</p>
                        <a href="#" class="promo-btn-l">See Them <span class="arrow">→</span></a>
                    </div>
                    <div class="promo-image">
                        <img src="images/icon.png" alt="Icon" class="promo-img">
                    </div>
                </div>
                <!-- Right CARt-->
                <div class="promo-card promo-card-right">
                    <div class="promo-text">
                        <span class="promo-label">TROPHY OF ICON PLAYERS!!</span>
                        <h2 class="promo-title">THE REWARD OF ICON PLAYERS!!</h2>
                        <p class="promo-desc">Iconic Players Won A Lots OF Rewards.</p>
                        <a href="#" class="promo-btn-r">Explore About Rewards <span class="arrow">→</span></a>
                    </div>
                    <div class="promo-image">
                        <img src="images/icon.png" alt="Icon" class="promo-img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Promo section -->

    <!-- Players Section -->
    <section class="players-section">
        <div class="container">
            <div class="players-header">
                <h2 class="players-title">Top Icons</h2>
                <span class="players-tab">in All Time</span>
                <ul class="players-filters">
                    <li><a href="#" class="filter active">ALL</a></li>
                    <li><a href="#" class="filter">MALE</a></li>
                    <li><a href="#" class="filter">FEMALE</a></li>
                    <li><a href="#" class="filter">MANAGERS</a></li>
                </ul>
            </div>
            <div class="players-grid">
                <?php
                $sql = "SELECT * FROM players LIMIT 4";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="player-card">
                            <div class="player-image">
                                <img src="' . $row['image'] . '" alt="' . $row['name'] . '" class="player-img">
                                <div class="player-actions">
                                    <button class="action-btn"><a href="">❤️</a></button>
                                    <button class="action-btn"><a href=""><img src="images/share.png" alt=""></a></button>
                                    <button class="action-btn"><a href=""><img src="images/full.png" alt=""></a></button>
                                </div>
                                <a href="SecondPage.php?id=' . $row['id'] . '">
                                    <button class="add-to-cart">SHOW MORE DETAILS ABOUT HIM</button>
                                </a>
                            </div>
                            <div class="player-info">
                                <span class="player-noun">' . $row['noun'] . '</span>
                                <h3 class="player-name">' . $row['name'] . '</h3>
                                <span class="player-detail">' . $row['description'] . '</span>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p>No players found.</p>';
                }
                ?>
            </div>
            <div class="load-more">
                <button class="load-more-btn">SHOW MORE</button>
            </div>
        </div>
    </section>
    <!-- End Players Section -->

    <!-- history Section -->
    <section class="history-section">
        <div class="container t-flex">
            <div class="history-text">
                <h2 class="history-title">Show History Of Icon Players</h2>
                <p class="history-desc">Details of rewards or troubles that icon players face with them</p>
                <a href="#" class="history-btn">See Now</a>
            </div>
        </div>
    </section>
    <!-- End history Section -->

    <!-- All Icons Section -->
    <section class="all-icons">
        <div class="container">
            <div class="all-icons-header">
                <h2 class="all-icons-title">All Icons</h2>
                <div class="sort-by">
                    <span>Sort by:</span>
                    <a href="#" class="sort-option">All Icons</a>
                </div>
            </div>
            <div class="all-icons-grid">
                <?php
                $sql = "SELECT * FROM players";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="card">
                            <div class="card-image">
                                <img src="' . $row['image'] . '" alt="' . $row['name'] . '" class="card-img">
                                <a href="SecondPage.php?id=' . $row['id'] . '">
                                    <button class="add-to-cart">See More Details</button>
                                </a>
                            </div>
                            <div class="card-info">
                                <span class="card-category">' . $row['noun'] . '</span>
                                <h3 class="card-name">' . $row['name'] . '</h3>
                                <span class="card-desc">' . $row['description'] . '</span>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p>No players found.</p>';
                }
                ?>
            </div>
            <!-- Pagination -->
            <div class="pagination">
                <a href="#" class="page-number active">1</a>
                <a href="#" class="page-number">2</a>
                <a href="#" class="page-number">3</a>
                <span>...</span>
                <a href="#" class="page-number">10</a>
            </div>
        </div>
    </section>
    <!-- End All Icons Section -->

    <!-- Photo and Questions Section -->
    <section class="photo-questions-section">
        <div class="container t-flex">
            <!-- Photo -->
            <div class="photo">
                <div class="photo-image">
                </div>
                <div class="photo-text">
                    <h2 class="photo-title">About Iconic</h2>
                    <p>See Every Things About Icons</p>
                    <a href="#" class="photo-btn">See More<span class="arrow">→</span></a>
                </div>
            </div>
            <!-- Questions -->
            <div class="questions">
                <h2 class="questions-title">Iconic Questions</h2>
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Who Is Icon Player?</h3>
                            <span class="accordion-toggle">+</span>
                        </div>
                        <div class="accordion-content">
                            <p>The Player Who retired from football and in his time he reach important rewards is Icon Player.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>What is This site About?</h3>
                            <span class="accordion-toggle">+</span>
                        </div>
                        <div class="accordion-content">
                            <p>This site is about icon players in history and their biography.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Can I Download The Photos And Use Data?</h3>
                            <span class="accordion-toggle">+</span>
                        </div>
                        <div class="accordion-content">
                            <p>Yes Of Course, But Attention to say the Download source.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Additional Info Cards -->
        <div class="container t-flex info-cards">
            <div class="info-card">
                <h4>Site Features</h4>
                <p>Our Site is free and you can use it easily.</p>
            </div>
            <div class="info-card">
                <h4>Free Downloading</h4>
                <p>You can Download Photos and data for free.</p>
            </div>
            <div class="info-card">
                <h4>Site Responsive</h4>
                <p>You can use our site in every phones or Pc or TV!!!</p>
            </div>
        </div>
    </section>
    <!-- End Photo and Questions Section -->

    <!-- Latest Updates Section -->
    <section class="latest-updates-section">
        <div class="container">
            <div class="latest-updates-header">
                <h2 class="latest-updates-title">Latest Updates</h2>
                <a href="#" class="see-all-btn">See All Articles<span class="arrow">→</span></a>
            </div>
            <div class="updates-grid">
                <!-- Article 1 -->
                <div class="update-card">
                    <div class="update-image">
                        <img src="images/bale.png" alt="Gareth Bale" class="update-img">
                        <span class="update-date">4</span>
                        <span class="update-month">Apr</span>
                    </div>
                    <div class="update-info">
                        <h3 class="update-title">Add Gareth Bale New Icon on Our Website!!</h3>
                        <p class="update-author">Gareth Bale</p>
                    </div>
                </div>
                <!-- Article 2 -->
                <div class="update-card">
                    <div class="update-image">
                        <img src="images/buffon.png" alt="GG Buffon" class="update-img">
                        <span class="update-date">4</span>
                        <span class="update-month">Apr</span>
                    </div>
                    <div class="update-info">
                        <h3 class="update-title">Adding Another New Icon GG Buffon On Website!!!</h3>
                        <p class="update-author">GG Buffon</p>
                    </div>
                </div>
                <!-- Article 3 -->
                <div class="update-card">
                    <div class="update-image">
                        <img src="images/lilian.png" alt="Lilian Thuram" class="update-img">
                        <span class="update-date">4</span>
                        <span class="update-month">Apr</span>
                    </div>
                    <div class="update-info">
                        <h3 class="update-title">Addin New Rb : Lilian Thuram On Our site!!</h3>
                        <p class="update-author">Lilian Thuram</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Latest Updates Section -->
    
    <?php
        include 'including/footer.php'; 
    ?>
