<?php
$cartItems = $GLOBALS['cartItems'] ?? [];
$total = $GLOBALS['total'] ?? 0;
?>

<section class="catalog-section">
    <div class="container">
        <h2 class="section-title">Оформление заказа</h2>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="alert error">
                ❌ Ошибка! Пожалуйста, заполните все поля.
            </div>
        <?php endif; ?>
        
        <?php if (empty($cartItems)): ?>
            <div class="alert error">
                Корзина пуста. <a href="index.php?action=home">Вернуться в каталог</a>
            </div>
        <?php else: ?>
            <!-- Краткая информация о заказе -->
            <div style="background: #f9f3f2; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
                <h3>Ваш заказ:</h3>
                <?php foreach ($cartItems as $item): ?>
                    <p><?= $item['product']['name'] ?> × <?= $item['quantity'] ?> = <?= number_format($item['sum'], 0, '.', ' ') ?> ₽</p>
                <?php endforeach; ?>
                <hr>
                <p><strong>Итого: <?= number_format($total, 0, '.', ' ') ?> ₽</strong></p>
            </div>
            
            <!-- Форма оформления -->
            <form method="POST" action="index.php?action=place_order" style="max-width: 500px; margin: 0 auto;">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Ваше имя:</label>
                    <input type="text" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Телефон:</label>
                    <input type="tel" name="phone" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Адрес доставки:</label>
                    <textarea name="address" rows="3" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
                </div>
                
                <button type="submit" style="width: 100%; background: #4caf50; color: white; padding: 15px; border: none; border-radius: 4px; font-size: 18px; cursor: pointer;">
                    Подтвердить заказ на <?= number_format($total, 0, '.', ' ') ?> ₽
                </button>
            </form>
        <?php endif; ?>
    </div>
</section>

<style>
    .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; }
    .alert.error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
</style>