<?php
include 'data/catalog.php';
include 'my-functions.php';
include 'templates/header.php';

// Traitement des actions POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = (int)$_POST['product_id'];

    if (isset($_POST['action']) && $_POST['action'] === 'remove') {
        removeFromCart($product_id);
        $message = "Produit supprimé du panier.";
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        $quantity = (int)$_POST['quantity'];
        updateCart($product_id, $quantity);
        $message = "Quantité mise à jour.";
    } elseif (isset($_POST['action']) && $_POST['action'] === 'clear') {
        clearCart();
        $message = "Panier vidé.";
    }
}

// Calculer le total
$total = calculateCartTotal($products);
$itemCount = getCartItemCount();
?>

<div class="cart-container">
    <h2>Votre Panier</h2>

    <?php if (isset($message)): ?>
        <div class="alert"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <?php if (isCartEmpty()): ?>
        <div class="empty-cart">
            <h3>Votre panier est vide</h3>
            <p>Ajoutez des produits depuis notre boutique</p>
            <a href="boutique.php" class="btn btn-primary">Continuer les achats</a>
        </div>
    <?php else: ?>
        <p><strong><?php echo $itemCount; ?> article(s)</strong> dans votre panier</p>

        <?php foreach ($_SESSION['cart'] as $id => $qty):
            if (!isset($products[$id])) continue;
            $product = $products[$id];
            $unitPrice = $product['prix'];
            $discountedPrice = $unitPrice;

            if (!empty($product['discount']) && $product['discount'] > 0) {
                $discountedPrice = $unitPrice * (1 - $product['discount'] / 100);
            }

            $lineTotal = $discountedPrice * $qty;
        ?>
            <div class="cart-item">
                <img src="<?php echo htmlspecialchars($product['imageURL']); ?>"
                    alt="<?php echo htmlspecialchars($product['nom']); ?>">

                <div class="item-details">
                    <div class="item-name"><?php echo htmlspecialchars($product['nom']); ?></div>

                    <?php if (!empty($product['discount']) && $product['discount'] > 0): ?>
                        <div class="item-discount">
                            Remise de <?php echo $product['discount']; ?>% appliquée
                        </div>
                        <div class="item-price">
                            <span style="text-decoration: line-through; color: #999;">
                                <?php echo formatPrice($unitPrice); ?>
                            </span>
                            <?php echo formatPrice($discountedPrice); ?>
                        </div>
                    <?php else: ?>
                        <div class="item-price"><?php echo formatPrice($unitPrice); ?></div>
                    <?php endif; ?>

                    <div><strong>Sous-total: <?php echo formatPrice($lineTotal); ?></strong></div>
                </div>

                <div>
                    <form method="post" style="display: inline;">
                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                        <div class="quantity-controls">
                            <label for="qty_<?php echo $id; ?>">Quantité:</label>
                            <input type="number" id="qty_<?php echo $id; ?>" name="quantity" value="<?php echo $qty; ?>" min="1" max="99" class="quantity-input">
                        </div>
                        <button name="action" value="update" class="btn btn-primary">
                            Mettre à jour
                        </button>
                    </form>

                    <form method="post" style="display: inline;"
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                        <button name="action" value="remove" class="btn btn-danger">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="cart-summary">
            <div class="total-price">
                Total: <?php echo formatPrice($total); ?>
            </div>
            <p>TVA incluse (20%)</p>
            <p>Hors TVA: <?php echo formatPrice($total / 1.2); ?></p>

            <form method="post" style="display: inline;"
                onsubmit="return confirm('Êtes-vous sûr de vouloir vider le panier ?');">
                <button name="action" value="clear" class="btn btn-secondary">
                    Vider le panier
                </button>
            </form>
        </div>

        <div class="navigation-links">
            <a href="boutique.php" class="btn btn-secondary">← Continuer les achats</a>
            <a href="checkout.php" class="btn btn-success">Procéder au paiement →</a>
        </div>
    <?php endif; ?>
</div>

<script>
// Auto-submit du formulaire quand la quantité change
document.addEventListener('DOMContentLoaded', function() {
    const quantityInputs = document.querySelectorAll('.quantity-input');
    
    quantityInputs.forEach(input => {
        input.addEventListener('change', function() {
            // Optionnel: auto-submit après changement
            // this.closest('form').submit();
        });
        
        // Validation côté client
        input.addEventListener('input', function() {
            const value = parseInt(this.value);
            if (value < 1) {
                this.value = 1;
            } else if (value > 99) {
                this.value = 99;
            }
        });
    });
});

// Animation simple pour les suppressions
function animateRemoval(element) {
    element.style.transition = 'opacity 0.3s ease-out';
    element.style.opacity = '0';
    setTimeout(() => {
        element.style.display = 'none';
    }, 300);
}
</script>

<?php include 'templates/footer.php'; ?>