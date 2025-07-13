    <!-- data base connect -->
    <?php
        include 'db_connect.php'; 
    ?>
    <!-- end data base connect -->

    <!-- including header -->
    <?php
        include 'including/headerFa.php'; 
    ?>
    <!-- end including header -->

    <!-- Chatbot Section -->
    <!-- <section class="chatbot-section">
        <div class="container">
            <div class="chatbot-box">
                <h2 class="chatbot-title">Talk to Iconic Agent</h2>
                <p class="chatbot-desc">Ask about iconic football players like Ronaldinho or Nazario!</p>
                <div class="chatbot-messages" id="chatbot-messages"></div>
                <form method="POST" class="chatbot-form" id="chatbot-form">
                    <input type="text" name="chat_input" class="chatbot-input" placeholder="Type your question..." required>
                    <button type="submit" class="chatbot-submit">Send</button>
                </form>
            </div>
        </div>
    </section> -->
    <!-- End Chatbot Section -->

    <!-- Main Section -->
    <section class="main-slider">
        <section class="container t-flex">
            <div>
                <h1 class="slider-text">تمام بازیکنان</h1>

                <p class="slider-p">این بازیکنان بهترین بازیکنان نسل خود بودند و در طول دوران حرفه ای خود 
                    جام هایی بسیار با ارزش وافتخارات فردی ارزشمندی را بدست آورده اند
                </p>

                <button class="slider-info">اطلاعات بیشتر</button>
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
            <h2 class="brand-title">( تیم های نمادین )</h2>
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
                        <span class="promo-label">!!بازیکنان نمادین</span>
                        <h2 class="promo-title">چه کسی بازیکن نمادین است؟؟</h2>
                        <p class="promo-desc">بازیکنی که در نسل خود بهترین عملکرد را داشت ، نمادین است</p>
                        <a href="#" class="promo-btn-l">آنها را ببینیم <span class="arrow">→</span></a>
                    </div>
                    <div class="promo-image">
                        <img src="images/icon.png" alt="Icon" class="promo-img">
                    </div>
                </div>
                <!-- Right CARt-->
                <div class="promo-card promo-card-right">
                    <div class="promo-text">
                        <span class="promo-label">!!جام هایی که بازیکنان نمادین برده اند</span>
                        <h2 class="promo-title">!!جوایز بازیکنان نمادین</h2>
                        <p class="promo-desc">بازیکنان نمادین جام های بسیاری برده اند</p>
                        <a href="#" class="promo-btn-r">جستوجو در جوایز <span class="arrow">→</span></a>
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
                <h2 class="players-title">بهترین بازیکنان نمادین</h2>
                <span class="players-tab">در تمام تاریخ</span>
                <ul class="players-filters">
                    <li><a href="#" class="filter active">همه</a></li>
                    <li><a href="#" class="filter">مردان</a></li>
                    <li><a href="#" class="filter">زنان</a></li>
                    <li><a href="#" class="filter">سرمربی ها</a></li>
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
                <button class="load-more-btn">نمایش بیشتر</button>
            </div>
        </div>
    </section>
    <!-- End Players Section -->

    <!-- history Section -->
    <section class="history-section">
        <div class="container t-flex">
            <div class="history-text">
                <h2 class="history-title">نمایش گذشته بازیکنان نمادین</h2>
                <p class="history-desc">جزئیات جوایز و مشکلاتی که بازیکنان نمادین با آنها مواجه بودند</p>
                <a href="#" class="history-btn">ببینیمشون</a>
            </div>
        </div>
    </section>
    <!-- End history Section -->

    <!-- All Icons Section -->
    <section class="all-icons">
        <div class="container">
            <div class="all-icons-header">
                <h2 class="all-icons-title">تمام بازیکان نمادین</h2>
                <div class="sort-by">
                    <span>:مرتب بر اساس</span>
                    <a href="#" class="sort-option">تمام بازیکنان</a>
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
                    <h2 class="photo-title">درباره بازیکنان نمادین</h2>
                    <p>دیدن همه چیز درباره بازیکنان نمادین</p>
                    <a href="#" class="photo-btn">بیشتر ببینیم<span class="arrow">→</span></a>
                </div>
            </div>
            <!-- Questions -->
            <div class="questions">
                <h2 class="questions-title">سوالات درباره آنها</h2>
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>بازیکن نمادین چیست؟</h3>
                            <span class="accordion-toggle">+</span>
                        </div>
                        <div class="accordion-content">
                            <p>بازیکنی که بازنشسته شده است  و در طول کریر خود به جوایزی که تاریخی اند دسترسی پیدا کرده است</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>این سایت درباره چیه؟</h3>
                            <span class="accordion-toggle">+</span>
                        </div>
                        <div class="accordion-content">
                            <p>این سایت درباره بازیکنان نمادین و گذشته آنها و زندگینامه آنهاست</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>آیا میتوان عکس ها و اطلاعات سایت را دانلود کرد؟</h3>
                            <span class="accordion-toggle">+</span>
                        </div>
                        <div class="accordion-content">
                            <p>البته ، ولی حتما منبع دانلودتون رو ذکر کنین</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Additional Info Cards -->
        <div class="container t-flex info-cards">
            <div class="info-card">
                <h4>ویژگی های سایت</h4>
                <p>سایت ما مجانیه و دسترسی آسان دارین</p>
            </div>
            <div class="info-card">
                <h4>دانلود رایگان</h4>
                <p>شما میتونین عکس های سایت و اطلاعات رو به صورت رایگان داشته باشین</p>
            </div>
            <div class="info-card">
                <h4>سایت منعطف</h4>
                <p>شما میتونین روی هر پلتفرمی مثل لپتاپ و حتی تلویزیون هم دسترسی داشته باشین</p>
            </div>
        </div>
    </section>
    <!-- End Photo and Questions Section -->

    <!-- Latest Updates Section -->
    <section class="latest-updates-section">
        <div class="container">
            <div class="latest-updates-header">
                <h2 class="latest-updates-title">آخرین اخبار</h2>
                <a href="#" class="see-all-btn">دیدن تمام موارد<span class="arrow">→</span></a>
            </div>
            <div class="updates-grid">
                <!-- Article 1 -->
                <div class="update-card">
                    <div class="update-image">
                        <img src="images/bale.png" alt="Gareth Bale" class="update-img">
                        <span class="update-date">4</span>
                        <span class="update-month">آپریل</span>
                    </div>
                    <div class="update-info">
                        <h3 class="update-title">گرت بیل به عنوان بازیکن نمادین اضافه شد</h3>
                        <p class="update-author">گرت بیل</p>
                    </div>
                </div>
                <!-- Article 2 -->
                <div class="update-card">
                    <div class="update-image">
                        <img src="images/buffon.png" alt="GG Buffon" class="update-img">
                        <span class="update-date">4</span>
                        <span class="update-month">آپریل</span>
                    </div>
                    <div class="update-info">
                        <h3 class="update-title">جانلوئیجی بوفون به عنوان بازیکن نمادین دیگری اضافه شد</h3>
                        <p class="update-author">جی جی بوفون</p>
                    </div>
                </div>
                <!-- Article 3 -->
                <div class="update-card">
                    <div class="update-image">
                        <img src="images/lilian.png" alt="Lilian Thuram" class="update-img">
                        <span class="update-date">4</span>
                        <span class="update-month">آپریل</span>
                    </div>
                    <div class="update-info">
                        <h3 class="update-title">دفاع راست نمادین جدید : لیلیان تورام</h3>
                        <p class="update-author">لیلیان تورام</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Latest Updates Section -->
    
    <!-- including footer -->
    <?php
        include 'including/footerFa.php'; 
    ?>
    <!-- end including footer -->

    <!-- Script For ChatBox -->
    <!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('chatbot-form');
        const input = form.querySelector('.chatbot-input');
        const messages = document.getElementById('chatbot-messages');

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const userInput = input.value.trim();

            if (userInput) {
                // نمایش پیام کاربر
                addMessage('You: ' + userInput, 'user-message');
                input.value = '';

                // درخواست به سرور FastAPI
                fetch('http://localhost:8001/agent/invoke', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ input: userInput })
                })
                .then(response => response.json())
                .then(data => {
                    const botResponse = data.output || 'Sorry, I couldn’t get a response.';
                    addMessage('Iconic Agent: ' + botResponse, 'bot-message');
                })
                .catch(error => {
                    addMessage('Iconic Agent: Sorry, an error occurred!', 'bot-message');
                    console.error('Error:', error);
                });
            }
        });

        function addMessage(text, className) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'chat-message ' + className;
            messageDiv.textContent = text;
            messages.appendChild(messageDiv);
            messages.scrollTop = messages.scrollHeight;
        }
    });
    </script> -->