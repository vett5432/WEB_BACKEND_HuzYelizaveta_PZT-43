<?php
$action = $_GET['action'] ?? 'home';
ob_start();
switch ($action) {
    case 'home': include __DIR__ . '/home.php'; break;
    case 'cart': include __DIR__ . '/cart.php'; break;
    case 'checkout': include __DIR__ . '/checkout.php'; break;
    default: include __DIR__ . '/home.php';
}
$content = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Шторбери - Салон штор в Омске</title>
    <link rel="stylesheet" href="public/sait.css?v=123">
    <style>
        html {
            scroll-behavior: smooth;
        }
        /* Дополнительные стили для корзины и каталога */
        .cart-count { background: #ff6b6b; border-radius: 50%; padding: 2px 6px; font-size: 12px; margin-left: 5px; }
        .pagination { margin: 30px 0; text-align: center; }
        .pagination a { display: inline-block; padding: 8px 12px; margin: 0 4px; background: #b0958e; color: white; text-decoration: none; border-radius: 4px; }
        .pagination a.active { background: #5a3e36; }
        .filters { display: flex; gap: 15px; margin-bottom: 30px; flex-wrap: wrap; justify-content: center; }
        .filters select, .filters input { padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .cart-table { width: 100%; border-collapse: collapse; margin: 20px 0; background: white; }
        .cart-table th, .cart-table td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        .btn-checkout { background: #4caf50; color: white; padding: 12px 24px; text-decoration: none; display: inline-block; border-radius: 4px; border: none; cursor: pointer; }
        .remove-link { color: red; text-decoration: none; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; }
        .alert.success { background: #d4edda; color: #155724; }
        .alert.error { background: #f8d7da; color: #721c24; }
        .checkout-form { max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; }
        .checkout-form input, .checkout-form textarea { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; }
        .catalog-item { text-align: center; }
        .item-img-box { height: 200px; display: flex; align-items: center; justify-content: center; background: #f5f5f5; border-radius: 8px; margin-bottom: 15px; }
        .item-img-box img { max-width: 100%; max-height: 100%; object-fit: cover; }
        .catalog-item h3 { margin: 10px 0; font-size: 16px; }
        .catalog-item p { color: #666; margin: 5px 0; }
        .catalog-item .price { font-weight: bold; font-size: 18px; color: #b0958e; }
        .catalog-item .btn-cart { background: #b0958e; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; margin-top: 10px; }
        .cart-link { text-decoration: none; color: inherit; display: flex; align-items: center; gap: 5px; }
    /* Фикс для карточек товаров */
.catalog-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.catalog-item {
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    display: flex;
    flex-direction: column;
    height: 100%;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.catalog-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.item-img-box {
    aspect-ratio: 1 / 1;
    width: 100%;
    border-radius: 8px;
    overflow: hidden;
    background: #f5f5f5;
}

.item-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.catalog-item h3 {
    font-size: 16px;
    font-weight: 600;
    margin: 12px 0 5px;
    min-height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.catalog-item .description {
    font-size: 13px;
    color: #666;
    margin: 5px 0;
    min-height: 40px;
}

.catalog-item .price {
    font-size: 18px;
    font-weight: bold;
    color: #b0958e;
    margin: 10px 0;
}

.btn-cart {
    background: #b0958e;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    display: inline-block;
    margin-top: auto;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn-cart:hover {
    background: #a0847d;
    transform: translateY(-2px);
}

@media (max-width: 1240px) {
    .catalog-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 800px) {
    .catalog-grid {
        grid-template-columns: 1fr;
    }
    
    .catalog-item {
        max-width: 320px;
        margin: 0 auto;
        width: 100%;
    }
}
    </style>
</head>
<body>
<!-- Отладка корзины -->
<div style="display:none;">
    <?php 
    echo "Корзина: "; 
    print_r($_SESSION['cart'] ?? []); 
    ?>
</div>
<header class="main-header debug-grid">
    <input type="checkbox" id="burger-toggle" class="burger-toggle">
    <label for="burger-toggle" class="burger-overlay"></label>
    
    <div class="burger-menu-panel">
        <label for="burger-toggle" class="burger-close">&times;</label>
        <nav class="burger-nav">
            <ul>
                <li><a href="#catalog">Каталог товаров</a></li>
                <li><a href="#steps">Как мы работаем</a></li>
                <li><a href="#team">Наша команда</a></li>
                <li><a href="#examples">Примеры наших работ</a></li>
                <li><a href="#portfolio">Портфолио</a></li>
                <li><a href="#reviews">Отзывы</a></li>
                <li><a href="#contacts">Контакты</a></li>
                <li><a href="#">Статьи</a></li>
            </ul>
        </nav>
        <div class="burger-socials">
            <span class="burger-icon">WA</span>
            <span class="burger-icon">TG</span>
        </div>
        <div class="burger-contacts">
            <p>Ул. 10 лет Октября 182 к.3,<br>ТЦ "Кит-Интерьер"<br>Пн-Вс 10:00-20:00</p>
            <p>Ул.70 лет Октября 25/16в,<br>ост.Таксопарк<br>Вт-Вс 10:30-16:00; Пн выходной</p>
        </div>
    </div>

    <div class="container header-top">
        <div class="logo-block">
            <img src="public/media/logo.png" alt="Шторбери" class="logo-img">
            <div class="logo-text">
                <strong>Шторбери</strong>
                <span>Турецкие шторы в Омске</span>
            </div>
        </div>
        <div class="contact-info">
            <div class="info-item">
                <p>Ул. 10 лет Октября 182 к.3, ТЦ "Кит-Интерьер"</p>
                <small>Пн-Вс 10:00-20:00</small>
            </div>
            <div class="info-item">
                <p>Ул. 70 лет Октября 25/16в, ост. Таскопарк</p>
                <small>Вт-Вс 10:00-16:30</small>
            </div>
        </div>
        <div class="header-actions">
            <div class="socials">
                <span class="icon">WA</span>
                <span class="icon">TG</span>
            </div>
            <div class="phone">
                <a href="tel:+79048268514" style="color: inherit; text-decoration: none;">+7 (904) 826-85-14</a>
            </div>
            <div class="cart">
                <a href="index.php?action=cart" class="cart-link">
                    🛒 <span class="cart-count"><?= app\models\Cart::getCount() ?></span>
                </a>
            </div>
        </div>

        <label for="burger-toggle" class="burger-btn">
            <span></span>
            <span></span>
            <span></span>
        </label>
    </div>
    
    <nav class="main-nav">
        <div class="container">
            <ul>
                <li><a href="#catalog">Каталог товаров</a></li>
                <li><a href="#steps">Как мы работаем</a></li>
                <li><a href="#team">Наша команда</a></li>
                <li><a href="#examples">Примеры наших работ</a></li>
                <li><a href="#portfolio">Портфолио</a></li>
                <li><a href="#reviews">Отзывы</a></li>
                <li><a href="#contacts">Контакты</a></li>
                <li><a href="#">Статьи</a></li>
            </ul>
        </div>
    </nav>
</header>

<main>
    <?= $content ?>
</main>

<footer class="footer">
    <div class="container footer-inner">
        <div class="footer-logo">
            <img src="media/logo.png" alt="Шторвери">
            <p>Шторбери<br><span>Турецкие шторы в Омске</span></p>
        </div>

        <nav class="footer-nav">
            <ul>
                <li><a href="#team">Наша команда</a></li>
                <li><a href="#examples">Примеры наших работ</a></li>
                <li><a href="#portfolio">Портфолио</a></li>
                <li><a href="#catalog">Каталог товаров</a></li>
                <li><a href="#steps">Как мы работаем</a></li>
                <li><a href="#reviews">Отзывы</a></li>
                <li><a href="#contacts">Контакты</a></li>
                <li><a href="#">Статьи</a></li>
            </ul>
        </nav>

        <nav class="footer-nav">
            <ul>
                <li><a href="#">Доставка и оплата</a></li>
                <li><a href="#">Политика безопасности</a></li>
                <li><a href="#">Обмен и возврат товара</a></li>
            </ul>
        </nav>

        <div class="footer-contacts">
            <p>Ул. 10 лет Октября 182 к.3,<br>ТЦ "Кит-Интерьер"<br>Пн-Вс 10:00-20:00</p>
            <p>Ул.70 лет Октября 25/16в,<br>ост.Таксопарк<br>Вт-Вс 10:30-16:00<br>Пн выходной</p>
            <p class="phone">
                <a href="tel:+79048268514" style="color: inherit; text-decoration: none;">+7 (904) 826-85-14</a>
            </p>
        </div>

        <div class="footer-socials">
            <a href="https://instagram.com" target="_blank" class="social-icon">ig</a>
            <a href="https://ok.ru" target="_blank" class="social-icon">ok</a>
            <a href="https://vk.com" target="_blank" class="social-icon">vk</a>
            <a href="https://youtube.com" target="_blank" class="social-icon">yt</a>
        </div>
    </div>
</footer>

<script>
    /* Скрипт автоматического закрытия бургер-меню после клика по ссылке */
    document.querySelectorAll('.burger-nav a').forEach(link => {
        link.addEventListener('click', () => {
            document.getElementById('burger-toggle').checked = false;
        });
    });
</script>
</body>
</html>