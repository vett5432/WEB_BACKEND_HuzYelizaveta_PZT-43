<?php
$cartItems = $GLOBALS['cartItems'] ?? [];
$total = $GLOBALS['total'] ?? 0;
?>

<section class="catalog-section">
    <div class="container">
        <h2 class="section-title">Корзина</h2>
        
        <?php if (isset($_SESSION['order_success']) && $_SESSION['order_success']): ?>
            <div class="alert success">
                ✅ Заказ успешно оформлен! Спасибо за покупку!
            </div>
            <?php unset($_SESSION['order_success']); ?>
        <?php endif; ?>
        
        <?php if (empty($cartItems)): ?>
            <div style="text-align: center; padding: 50px;">
                <h3>🛒 Корзина пуста</h3>
                <p><a href="index.php?action=home" style="color: #b0958e; font-size: 18px;">Вернуться в каталог</a></p>
            </div>
        <?php else: ?>
            <table style="width: 100%; border-collapse: collapse; background: white;">
                <thead>
                    <tr style="background: #f5f5f5; border-bottom: 2px solid #ddd;">
                        <th style="padding: 12px;">Товар</th>
                        <th style="padding: 12px;">Цена</th>
                        <th style="padding: 12px;">Количество</th>
                        <th style="padding: 12px;">Сумма</th>
                        <th style="padding: 12px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 12px;"><?= htmlspecialchars($item['product']['name']) ?></td>
                        <td style="padding: 12px;"><?= number_format($item['product']['price'], 0, '.', ' ') ?> ₽</td>
                        <td style="padding: 12px;">
                            <form action="index.php" method="GET" style="display: inline;">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="id" value="<?= $item['product']['id'] ?>">
                                <input type="number" name="qty" value="<?= $item['quantity'] ?>" min="1" style="width: 60px;">
                                <button type="submit" style="background: #b0958e; color: white; border: none; padding: 5px 10px; border-radius: 4px;">Обновить</button>
                            </form>
                        </td>
                        <td style="padding: 12px;"><?= number_format($item['sum'], 0, '.', ' ') ?> ₽</td>
                        <td style="padding: 12px;">
                            <a href="index.php?action=remove&id=<?= $item['product']['id'] ?>" style="color: red; text-decoration: none;" onclick="return confirm('Удалить товар?')">Удалить</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr style="background: #f5f5f5;">
                        <td colspan="3" style="padding: 15px; text-align: right;"><strong>Итого:</strong></td>
                        <td style="padding: 15px;"><strong><?= number_format($total, 0, '.', ' ') ?> ₽</strong></td>
                        <td style="padding: 15px;"></td>
                    </tr>
                </tfoot>
            </table>
            
            <div style="text-align: right; margin-top: 30px;">
                <a href="index.php?action=home" style="background: #b0958e; color: white; padding: 12px 24px; text-decoration: none; border-radius: 4px; margin-right: 10px;">Продолжить покупки</a>
                <a href="index.php?action=checkout" style="background: #4caf50; color: white; padding: 12px 24px; text-decoration: none; border-radius: 4px;">Оформить заказ →</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; }
    .alert.success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
</style>