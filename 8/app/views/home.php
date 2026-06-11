<!-- Hero Section -->
<section class="hero-section">
    <div class="container">       
        <h1 class="hero-title">Шторы под ваш интерьер <br> от 3 дней под ключ в Омске</h1>

        <div class="features-white-card">
            <div class="features-grid">
                <div class="feature-item">
                    <span class="f-icon">🚗</span>
                    <p class="f-text">Выезд дизайнера с <br> образцами тканей</p>
                </div>
                <div class="feature-item">
                    <span class="f-icon">📜</span>
                    <p class="f-text">Турецкие ткани. <br> 90% тканей в наличии</p>
                </div>
                <div class="feature-item">
                    <span class="f-icon">🧵</span>
                    <p class="f-text">Швеи со стажем <br> более 15 лет</p>
                </div>
                <div class="feature-item">
                    <span class="f-icon">🎁</span>
                    <p class="f-text">До конца месяца акция! <br> Бесплатная развеска штор</p>
                </div>
            </div>

            <button class="cta-button">Пригласить дизайнера</button>
        </div>

    </div>
</section>

<!-- Каталог товаров (динамический из БД) -->
<section id="catalog" class="catalog-section debug-grid">
    <div class="container">
        <h2 class="section-title" data-bg="Каталог товаров">Каталог товаров</h2>
        
        <!-- Формы поиска, сортировки и фильтрации -->
        <form method="GET" action="index.php" class="filters">
            <input type="hidden" name="action" value="home">
            <input type="text" name="search" placeholder="Поиск товара..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
            <select name="sort">
                <option value="">Сортировка</option>
                <option value="price_asc" <?= ($_GET['sort'] ?? '') == 'price_asc' ? 'selected' : '' ?>>Цена ↑</option>
                <option value="price_desc" <?= ($_GET['sort'] ?? '') == 'price_desc' ? 'selected' : '' ?>>Цена ↓</option>
                <option value="name_asc" <?= ($_GET['sort'] ?? '') == 'name_asc' ? 'selected' : '' ?>>Название А-Я</option>
            </select>
            <select name="category">
                <option value="">Все категории</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= htmlspecialchars($cat) ?>" <?= ($_GET['category'] ?? '') == $cat ? 'selected' : '' ?>><?= htmlspecialchars($cat) ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Применить</button>
        </form>
        
        <div class="catalog-grid">
            <?php if (empty($products)): ?>
                <p>Товары не найдены</p>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <div class="catalog-item">
                        <div class="item-img-box">
                            <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                        </div>
                        <h3><?= htmlspecialchars($product['name']) ?></h3>
                        <p><?= htmlspecialchars(mb_substr($product['description'], 0, 80)) ?>...</p>
                        <p class="price"><?= number_format($product['price'], 0, '.', ' ') ?> ₽</p>
                        <a href="index.php?action=add&id=<?= $product['id'] ?>" class="btn-cart">В корзину</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <!-- Пагинация -->
        <?php if ($totalPages > 1): ?>
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?action=home&page=<?= $i ?>&sort=<?= urlencode($sort) ?>&category=<?= urlencode($category) ?>&search=<?= urlencode($search) ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

    <section id="steps" class="steps-section">
    <div class="container">
       <h2 class="section-title" data-bg="Как мы работаем?">Как мы работаем?</h2>
        
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-content">
                    <div class="step-header">
                        <h3>Звонок или <br> заявка на сайте</h3>
                        <span class="step-icon">📞</span>
                    </div>
                    <p>Вы оставляете заявку на сайте или звоните по телефону 8(904) 826-85-14, мы отвечаем на вопросы и договариваемся о встрече</p>
                </div>
                <span class="step-number">1</span>
            </div>

            <div class="step-card">
                <div class="step-content">
                    <div class="step-header">
                        <h3>Встреча, замер <br> и выбор ткани</h3>
                        <span class="step-icon">📏</span>
                    </div>
                    <p>Мы приезжаем в назначенное время, замеряем оконный блок, выбираем ткань и обсуждаем детали проекта</p>
                </div>
                <span class="step-number">2</span>
            </div>

            <div class="step-card">
                <div class="step-content">
                    <div class="step-header">
                        <h3>Заключение <br> договора и оплата</h3>
                        <span class="step-icon">👛</span>
                    </div>
                    <p>Заключаем договор, вы оплачиваете 50% стоимости заказа</p>
                </div>
                <span class="step-number">3</span>
            </div>

            <div class="step-card">
                <div class="step-content">
                    <div class="step-header">
                        <h3>Пошив штор и <br> доставка</h3>
                        <span class="step-icon">📦</span>
                    </div>
                    <p>Мы приступаем к пошиву штор. Средний срок изготовления 5 дней</p>
                </div>
                <span class="step-number">4</span>
            </div>

            <div class="step-card">
                <div class="step-content">
                    <div class="step-header">
                        <h3>Хорошее настроение <br> и уют в доме</h3>
                        <span class="step-icon">😊</span>
                    </div>
                    <p>Мы доставляем шторы, помогаем развешать и правильно оформить. Вы наслаждаетесь результатом</p>
                </div>
                <span class="step-number">5</span>
            </div>

            <div class="step-card cta-card">
                <h3>К чему долго ждать?</h3>
                <p>Жмите на кнопку и заказывайте бесплатный выезд дизайнера прямо сейчас!</p>
                <button class="cta-button-small">Пригласить дизайнера</button>
            </div>
        </div>
    </div>
</section>

<section id="examples" class="work-examples">
    <div class="container">
        <h2 class="section-title" data-bg="Примеры наших работ">Примеры наших работ</h2>
        
        <div class="example-card">
            <div class="example-grid">
                
                <div class="example-info">
                    <div class="info-block">
                        <span class="label">Проблема</span>
                        <p>Во время ремонта убрали стену, чтобы кухню и зал сделать единым пространством. На кухне свой стиль — бирюзовый кухонный гарнитур, а гостиная в классическом стиле с обоями под штукатурку. Вид окон на набережную и в обед мешает солнце...</p>
                    </div>

                    <div class="info-block">
                        <span class="label">Решение</span>
                        <p>Мы подобрали бархат - он подходит по высоте, отлично затеняет от солнца. Цвет подобрали универсальный, чтобы и к кухонному гарнитуру подходил и к обоям - серо-бежевый цвет. Тюль подобрали однотонный...</p>
                    </div>

                    <div class="info-block">
                        <span class="label">Результат</span>
                        <p>Комната выглядит уютно и нарядно. Скрыли трубы, которые шли по стене. При закрытии окна портьерами в комнате становится достаточно темно, чтобы солнце не мешало.</p>
                    </div>

                    <div class="case-details">
                        <div class="detail-item">
                            <span>От замера до навески</span>
                            <span class="dots"></span>
                            <span>5 дней</span>
                        </div>
                        <div class="detail-item">
                            <span>Цена</span>
                            <span class="dots"></span>
                            <span>34 900 руб</span>
                        </div>
                    </div>

                    <div class="cta-wrapper">
                        <button class="cta-button">Оставить заявку</button>
                        <p class="cta-subtext">На выезд дизайнера*</p>
                    </div>
                </div>

                <div class="example-gallery">
                    <div class="gallery-top">
                        <img src="public/media/lr1.png" alt="Интерьер гостиной 1" class="gallery-img">
                        <img src="public/media/lr2.png" alt="Интерьер гостиной 2" class="gallery-img">
                        <img src="public/media/lr3.png" alt="Вид на кухню" class="gallery-img">
                        <img src="public/media/lr4.png" alt="Зона с елкой" class="gallery-img">
                    </div>
                    <div class="gallery-bottom">
                        <div class="video-placeholder">
                            <img src="public/media/lr5.png" alt="Общий вид" class="gallery-img">
                            <div class="play-button">▶</div>
                        </div>
                    </div>
                </div>

            </div>
            <span class="case-number">1</span>
        </div>
    </div>
</section>


<section id="portfolio" class="photoblog-section">
    <div class="container">
        <h2 class="section-title" data-bg="Видеоблог">Видеоблог</h2>
        
        <div class="photo-grid">
            <div class="photo-card">
                <div class="image-wrapper">
                    <img src="public/media/v1.png" alt="Обзор штор в кабинете">
                </div>
            </div>

            <div class="photo-card">
                <div class="image-wrapper">
                    <img src="public/media/v2.png" alt="Обзор кухни">
                </div>
            </div>

            <div class="photo-card">
                <div class="image-wrapper">
                    <img src="public/media/v3.png" alt="Обзор шкафа и штор">
                </div>
            </div>

            <div class="photo-card">
                <div class="image-wrapper">
                    <img src="public/media/v4.png" alt="Отзыв клиента">
                </div>
            </div>
        </div>

        <div class="centered-cta">
            <button class="cta-button-outline">Смотреть все video на YouTube</button>
        </div>
    </div>
</section>


<section class="request-section">
    <div class="container">
        <h2 class="section-title" data-bg="Заявка на выезд дизайнера">Заявка на выезд дизайнера</h2>
        <p class="request-subtitle">Стоимость услуги 500 рублей, но при заказе штор бесплатный</p>
        
        <form class="request-form">
            <div class="form-grid">
                <input type="text" class="form-input" placeholder="Введите имя" required>
                <input type="tel" class="form-input" placeholder="Ваш номер телефона" required>
                <button type="submit" class="form-button">Пригласить дизайнера</button>
            </div>
            
            <div class="form-footer">
                <label class="checkbox-container">
                    <input type="checkbox" checked required>
                    <span class="checkmark"></span>
                    Нажимая на кнопку, вы соглашаетесь с условиями обработки персональных данных
                </label>
                <p class="callback-note">Перезвоним в течение 5 минут</p>
            </div>
        </form>
    </div>
</section>


<section id="team" class="team-section">
    <div class="container">
        <h2 class="section-title" data-bg="Наш коллектив">Наш коллектив</h2>
        
        <div class="team-grid">
            <div class="team-card">
                <div class="photo-wrapper empty">
                    <img src="media/marina.jpg" alt="Марина">
                </div>
                <h3 class="member-name">Марина</h3>
                <p class="member-role">Директор, дизайнер, швея</p>
            </div>
            <div class="team-card">
                <div class="photo-wrapper">
                    <img src="media/anjelica.jpg" alt="Анжелика">
                </div>
                <h3 class="member-name">Анжелика</h3>
                <p class="member-role">Продавец-консультант, дизайнер</p>
            </div>
            <div class="team-card">
                <div class="photo-wrapper">
                    <img src="media/olga.jpg" alt="Ольга">
                </div>
                <h3 class="member-name">Ольга</h3>
                <p class="member-role">Инженер технолог, швея</p>
            </div>
            <div class="team-card">
                <div class="photo-wrapper">
                    <img src="media/igor.jpg" alt="Игорь">
                </div>
                <h3 class="member-name">Игорь</h3>
                <p class="member-role">Замерщик, монтаж карнизов</p>
            </div>
        </div>
    </div>
</section>

<section id="reviews" class="reviews-section">
    <div class="container">
        <h2 class="section-title" data-bg="Отзывы">Отзывы</h2>
        
        <div class="slider-container">
            <button class="slider-arrow prev"></button>
            
            <div class="reviews-flex">
                <div class="phone-mockup">
                    <img src="public/media/iph1.png" alt="Отзыв 1">
                </div>
                <div class="phone-mockup">
                    <img src="public/media/iph2.png" alt="Отзыв 2">
                </div>
                <div class="phone-mockup">
                    <img src="public/media/iph3.png" alt="Отзыв 3">
                </div>
            </div>
            
            <button class="slider-arrow next"></button>
        </div>
        
        <div class="slider-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
</section>


<section class="social-section">
    <div class="social-card">
        <h2 class="section-title" data-bg="Мы в социальных сетях">Мы в социальных сетях</h2>
        <p class="instagram-label">Наш Инстаграмм</p>

        <div class="instagram-grid">
            <div class="insta-item"><img src="public/media/w1.jpg" alt="Интерьер 1"></div>
            <div class="insta-item"><img src="public/media/w2.jpg" alt="Интерьер 2"></div>
            <div class="insta-item"><img src="public/media/w3.jpg" alt="Интерьер 3"></div>
            <div class="insta-item"><img src="public/media/w4.jpg" alt="Интерьер 4"></div>
        </div>

        <div class="social-links">
            <a href="https://youtube.com" target="_blank" class="social-item">
                <div class="icon-circle img">
                    <img src="public/media/yout.png" alt="YouTube">
                </div>
                <p>Посмотрите более <b>400</b> видеообзоров наших штор</p>
            </a>
            
            <a href="https://vk.com" target="_blank" class="social-item">
                <div class="icon-circle img">
                    <img src="public/media/VK.png" alt="ВКонтакте">
                </div>
                <p>Посетите нашу группу в <b>Вконтакте</b></p>
            </a>

            <a href="https://ok.ru" target="_blank" class="social-item">
                <div class="icon-circle img">
                    <img src="public/media/odn.png" alt="Одноклассники">
                </div>
                <p>Посетите нашу группу в <b>Одноклассниках</b></p>
            </a>
        </div>
    </div>
</section>
<!-- Блок новостей -->
<section class="news-section" style="padding: 60px 0; background: #f9f3f2;">
    <div class="container">
        <h2 class="section-title" data-bg="Новости">Новости и акции</h2>
        
        <div class="news-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
            <?php if (empty($news)): ?>
                <p style="text-align: center; grid-column: span 3;">Новостей пока нет</p>
            <?php else: ?>
                <?php foreach ($news as $item): ?>
                    <div class="news-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                        <div class="news-content" style="padding: 20px;">
                            <div class="news-date" style="color: #b0958e; font-size: 12px; margin-bottom: 10px;">
                                <?= date('d.m.Y', strtotime($item['created_at'])) ?>
                            </div>
                            <h3 style="font-size: 18px; margin: 0 0 10px 0;"><?= htmlspecialchars($item['title']) ?></h3>
                            <p style="color: #666; line-height: 1.5;"><?= htmlspecialchars(mb_substr($item['content'], 0, 100)) ?>...</p>
                            <a href="#" style="color: #b0958e; text-decoration: none; font-weight: bold;">Читать далее →</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    .news-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    @media (max-width: 800px) {
        .news-grid {
            grid-template-columns: 1fr !important;
        }
    }
</style>
<section id="contacts" class="contacts-section">
    <div class="container">
        <h2 class="section-title" data-bg="Где мы находимся?">Где мы находимся?</h2>
        
        <div class="map-container">
            <div class="map-placeholder"></div>
        </div>

        <div class="locations-grid">
            <div class="location-item">
                <p class="address">г. Омск, 10 лет Октября, 182 к.3 ТЦ "Кит-Интерьер"<br>1 этаж, левое крыло</p>
                <p class="work-hours">Понедельник – воскресенье с 10:00 до 20:00</p>
                <div class="location-photo">
                    <img src="public/media/hz1.jpg" alt="Салон в Кит-Интерьер">
                </div>
            </div>

            <div class="location-item">
                <p class="address">г. Омск, 70 лет Октября 25/16в, "Торговый Город"<br>Ряд: 43, Место: 83</p>
                <p class="work-hours">Вторник – воскресенье: с 10:00 до 16:30 без обеда,<br>понедельник: выходной</p>
                <div class="location-photo">
                    <img src="public/media/hz2.png" alt="Салон в Торговом Городе">
                </div>
            </div>
        </div>
    </div>
</section>